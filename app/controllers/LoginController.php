<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
    }

    public function index()
    {
        header('Content-Type: application/json; charset=utf-8');
        $this->api->respond([
            'success' => false,
            'message' => 'This backend is API-only. Send a POST request with JSON credentials to /api/auth/login.',
            'data' => [
                'expected_method' => 'POST',
                'expected_body' => [
                    'username' => 'your_username',
                    'password' => 'your_password',
                ],
            ],
        ]);
    }

}
