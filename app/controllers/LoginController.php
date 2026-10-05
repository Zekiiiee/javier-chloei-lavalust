<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
    }

    public function index()
    {
        $this->call->view('login');
    }

    public function login()
    {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->UsersModel->find_by('username', $username);

        if ($user && isset($user['password'])) {

            $password_correct = false;

            // Check hashed password
            if (password_verify($password, $user['password'])) {
                $password_correct = true;
            }

            // Check plain password
            if ($password === $user['password']) {
                $password_correct = true;
            }

            if ($password_correct) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['authenticated'] = true;

                // Successful login → Products
                header('Location: ' . base_url('products'));
                exit;
            }
        }

        // Login failed
        $this->call->view('login', [
            'error' => 'Invalid username or password.'
        ]);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        header('Location: ' . base_url('login'));
        exit;
    }
}
