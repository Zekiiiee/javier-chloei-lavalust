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

        if ($user && isset($user['password'])) {

            $password_correct = false;

            // Check hashed password
            if (password_verify($password, $user['password'])) {
                $password_correct = true;
            }

            // Check plain password used for this lab
            if ($password === $user['password']) {
                $password_correct = true;
            }

            if ($password_correct) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['authenticated'] = true;

                header('Location: https://javier-chloei-lavalust.onrender.com/products');
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

        header('Location: https://javier-chloei-lavalust.onrender.com/');
        exit;
    }
}