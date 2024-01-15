<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function teacher()
    {
        $data = array();
        //Helpers are collections of useful procedural functions.
        helper(['form']);

        //runs when submit button is clicked
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'age', 'email', 'password']);
            $post['password'] = sha1($post['password']);

            //return dd($post); //for debug

            //textfield validation
            $rules = [
                'first_name' => ['label' => 'first name', 'rules' => 'required'],
                'last_name' => ['label' => 'last name', 'rules' => 'required'],
                'age' => ['label' => 'age', 'rules' => 'required|numeric'],
                'email' => ['label' => 'email', 'rules' => 'required|valid_email|is_unique[teachers.email]'],
                'password' => ['label' => 'password', 'rules' => 'required'],
                'confirm_password' => ['label' => 'confirm password', 'rules' => 'required_with[password]|matches[password]']
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //save user to db
                $userModel = new \App\Models\TeacherModel();
                $userModel->save($post);

                $session = session();
                $session->setFlashdata('success-add-teacher', 'Teacher successfully saved!');

                return redirect()->to(base_url('teacher_login'));
            }
        }
        return view('teacher/teacher_signup', $data);
    }

    public function student()
    {
        $data = array();
        //Helpers are collections of useful procedural functions.
        helper(['form']);

        //runs when submit button is clicked
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'course', 'year', 'section', 'email', 'password']);
            $post['password'] = sha1($post['password']);

            //return dd($post); //for debug

            //textfield validation
            $rules = [
                'first_name' => ['label' => 'first name', 'rules' => 'required'],
                'last_name' => ['label' => 'last name', 'rules' => 'required'],
                'course' => ['label' => 'course', 'rules' => 'required'],
                'year' => ['label' => 'year', 'rules' => 'required|numeric'],
                'section' => ['label' => 'section', 'rules' => 'required'],
                'email' => ['label' => 'email', 'rules' => 'required|valid_email|is_unique[students.email]'],
                'password' => ['label' => 'password', 'rules' => 'required'],
                'confirm_password' => ['label' => 'confirm password', 'rules' => 'required_with[password]|matches[password]']
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //save user to db
                $userModel = new \App\Models\StudentModel();
                $userModel->save($post);

                $session = session();
                $session->setFlashdata('success-add-student', 'Student successfully added!');

                return redirect()->to(base_url('student_login'));
            }
        }
        return view('student/student_signup', $data);
    }
}
