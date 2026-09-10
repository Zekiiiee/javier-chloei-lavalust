<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle()
    {
        if (empty($_SESSION['authenticated'])) {

            header('Location: http://127.0.0.1:3000/login');
            exit;

        }
    }
}