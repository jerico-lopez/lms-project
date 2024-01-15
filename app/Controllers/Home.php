<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function teacher(): string
    {
        return view('teacher/teacher_home');
    }
    public function student(): string
    {
        return view('student/student_home');
    }
}
