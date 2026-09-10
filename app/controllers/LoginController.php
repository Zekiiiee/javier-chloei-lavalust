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
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->UsersModel->find_by('username', $username);

        if ($user) {

            $password_correct = false;

            // For hashed passwords
            if (password_verify($password, $user['password'])) {
                $password_correct = true;
            }

            // For existing plain-text passwords
            if ($password === $user['password']) {
                $password_correct = true;
            }

            if ($password_correct) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['authenticated'] = true;

                header('Location: http://127.0.0.1:3000/products');
                exit;
            }
        }

        $this->call->view('login', [
            'error' => 'Invalid username or password.'
        ]);
    }

    public function logout()
    {
        $_SESSION = [];

        session_destroy();

        header('Location: http://127.0.0.1:3000/');
        exit;
    }
}