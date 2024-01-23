<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function teacherConfirmLogout()
    {
        return view('teacher/confirm_logout');
    }
    public function studentConfirmLogout()
    {
        return view('student/logout');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}