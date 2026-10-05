<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('api');
        $this->call->database();
    }

    /**
     * POST /api/auth/register
     */
    public function register()
    {
        $this->api->require_method('POST');
        $this->api->rate_limit();

        $body = $this->api->body();

        $username = $body['username'] ?? '';
        $email    = $body['email'] ?? '';
        $password = $body['password'] ?? '';

        if (empty($username) || empty($email) || empty($password)) {
            $this->api->respond_error('Username, email, and password are required.', 422);
        }

        // Check if username or email already exists
        $existing = $this->UsersModel->find_by('username', $username);
        if ($existing) {
            $this->api->respond_error('Username already exists.', 409);
        }

        $existing_email = $this->UsersModel->find_by('email', $email);
        if ($existing_email) {
            $this->api->respond_error('Email already exists.', 409);
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $hashed_password,
            'role'     => 'user',
        ];

        $this->UsersModel->insert($data);

        $this->api->respond([
            'message' => 'User registered successfully.'
        ], 201);
    }

    /**
     * POST /api/auth/login
     */
    public function login()
    {
        $this->api->require_method('POST');
        $this->api->rate_limit();

        $body = $this->api->body();

        $username = $body['username'] ?? '';
        $password = $body['password'] ?? '';

        if (empty($username) || empty($password)) {
            $this->api->respond_error('Username and password are required.', 422);
        }

        $user = $this->UsersModel->find_by('username', $username);

        if (!$user) {
            $this->api->respond_error('Invalid credentials.', 401);
        }

        // Support both hashed and plain-text passwords
        $password_ok = false;
        if (password_verify($password, $user['password'])) {
            $password_ok = true;
        }
        if ($password === $user['password']) {
            $password_ok = true;
        }

        if (!$password_ok) {
            $this->api->respond_error('Invalid credentials.', 401);
        }

        // Issue JWT tokens
        $tokens = $this->api->issue_tokens([
            'id'     => $user['id'],
            'role'   => $user['role'] ?? 'user',
            'scopes' => ['read', 'write', 'delete'],
        ]);

        $this->api->respond([
            'message' => 'Login successful.',
            'user'    => [
                'id'       => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'role'     => $user['role'] ?? 'user',
            ],
            'tokens' => $tokens,
        ]);
    }

    /** GET /api/profile: return the currently authenticated user's public details. */
    public function profile()
    {
        $this->api->require_method('GET');
        $this->api->rate_limit();
        $claims = $this->api->require_jwt();

        if (($claims['type'] ?? 'access') === 'refresh') {
            $this->api->respond_error('An access token is required.', 401);
        }

        $user = $this->UsersModel->find((int) $claims['sub']);
        if (!$user) {
            $this->api->respond_error('User not found.', 404);
        }

        $this->api->respond([
            'message' => 'Profile retrieved successfully.',
            'user' => [
                'id' => (int) $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role'] ?? 'user',
            ],
        ]);
    }

    /** GET /api/list: return public fields for registered accounts. */
    public function list_users()
    {
        $this->api->require_method('GET');
        $this->api->rate_limit();
        $claims = $this->api->require_jwt();

        if (($claims['type'] ?? 'access') === 'refresh') {
            $this->api->respond_error('An access token is required.', 401);
        }

        $stmt = $this->call->database()->raw('SELECT id, username, role FROM users ORDER BY id ASC');
        $this->api->respond([
            'message' => 'Users retrieved successfully.',
            'users' => $stmt->fetchAll(PDO::FETCH_ASSOC),
        ]);
    }

    /** PUT /api/update/{id}: allow an authenticated user to update their own public details. */
    public function update_user($id)
    {
        $this->api->require_method('PUT');
        $this->api->rate_limit();
        $claims = $this->api->require_jwt();

        if (($claims['type'] ?? 'access') === 'refresh') {
            $this->api->respond_error('An access token is required.', 401);
        }
        if ((int) $claims['sub'] !== (int) $id) {
            $this->api->respond_error('You can only update your own account.', 403);
        }

        $user = $this->UsersModel->find((int) $id);
        if (!$user) $this->api->respond_error('User not found.', 404);

        $body = $this->api->body();
        $updates = [];
        if (array_key_exists('username', $body)) {
            if (!is_string($body['username']) || !preg_match('/^[A-Za-z0-9_.-]{3,100}$/', trim($body['username']))) {
                $this->api->respond_error('Username must be 3–100 characters and use letters, numbers, dots, dashes, or underscores.', 422);
            }
            $updates['username'] = trim($body['username']);
        }
        if (array_key_exists('email', $body)) {
            if (!is_string($body['email']) || !filter_var(trim($body['email']), FILTER_VALIDATE_EMAIL)) {
                $this->api->respond_error('Enter a valid email address.', 422);
            }
            $updates['email'] = trim($body['email']);
        }
        if (!$updates) $this->api->respond_error('Provide a username or email to update.', 422);

        foreach ($updates as $field => $value) {
            $existing = $this->UsersModel->find_by($field, $value);
            if ($existing && (int) $existing['id'] !== (int) $id) {
                $this->api->respond_error(ucfirst($field) . ' is already in use.', 409);
            }
        }

        $this->UsersModel->update((int) $id, $updates);
        $this->api->respond(['message' => 'User updated successfully.']);
    }

    /** DELETE /api/delete/{id}: allow administrators to remove user accounts. */
    public function delete_user($id)
    {
        $this->api->require_method('DELETE');
        $this->api->rate_limit();
        $claims = $this->api->require_jwt();

        if (($claims['type'] ?? 'access') === 'refresh') {
            $this->api->respond_error('An access token is required.', 401);
        }
        if (($claims['role'] ?? '') !== 'admin') {
            $this->api->respond_error('Administrator access is required to delete users.', 403);
        }

        $user = $this->UsersModel->find((int) $id);
        if (!$user) $this->api->respond_error('User not found.', 404);

        $db = $this->call->database();
        $db->raw('DELETE FROM refresh_tokens WHERE user_id = ?', [(int) $id]);
        $this->UsersModel->delete((int) $id);

        $this->api->respond(['message' => 'User deleted successfully.']);
    }

    /**
     * POST /api/auth/refresh
     */
    public function refresh()
    {
        $this->api->require_method('POST');

        $body = $this->api->body();
        $refresh_token = $body['refresh_token'] ?? '';

        if (empty($refresh_token)) {
            $this->api->respond_error('Refresh token is required.', 422);
        }

        // This method responds directly
        $this->api->refresh_access_token($refresh_token);
    }

    /**
     * POST /api/auth/logout
     */
    public function logout()
    {
        $this->api->require_method('POST');

        $body = $this->api->body();
        $refresh_token = $body['refresh_token'] ?? '';

        if (!empty($refresh_token)) {
            $this->api->revoke_refresh_token($refresh_token);
        }

        $this->api->respond([
            'message' => 'Logged out successfully.'
        ]);
    }
}
