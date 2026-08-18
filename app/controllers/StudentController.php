<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
		$_SESSION['student_access'] = true;
        $student = [
            'student_id' => 'MCC2024-00116',
            'name' => 'Chloei Faith R. Javier',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'f3',
            'email' => 'chloeijavier22@email.com'
        ];

        $this->call->view('student_home', $student);
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00116',
            'name' => 'Chloei Faith R. Javier',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'f3',
            'email' => 'chloeijavier22@email.com'
        ];

        $this->call->view('student_profile', $student);
    }
}