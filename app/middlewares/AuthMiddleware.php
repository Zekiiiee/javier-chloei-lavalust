<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle()
    {
        if (empty($_SESSION['authenticated'])) {

            header('Location: ' . base_url('login'));
            exit;

        }
    }
}
