<?php

namespace App\Controllers;

class Login extends BaseController
{
    //ADMIN----------------------------------------------------------------------------------------------------
    public function admin()
    {
        $data = [];
        helper('form');

        //Login button clicked
        if ($this->request->getMethod() == 'post') {
            //get value from textbox
            $post = $this->request->getPost(['username', 'password']);

            //provide validation
            $rules = [
                'username' => ['label' => 'username', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ];

            if (!$this->validate($rules)) {
                $data['loginValidation'] = $this->validator;
            } else {
                //Get user from database using email and password
                $userModel = new \App\Models\AdminModel();
                $user = $userModel->where('username', $post['username'])->where('password', $post['password'])->first();

                if (!$user) {
                    $session = session();
                    $session->setFlashdata('invalid', 'Invalid username or password, please try again');
                } else {
                    // Redirect upon successful login
                    return redirect()->to('/');
                }
            }
        }

        return view('admin/admin_login', $data);
    }

    //Teacher-------------------------------------------------------------------------------------------------------
    public function teacher(){
        $data = [];
        helper('form');

        //Login button clicked
        if ($this->request->getMethod() == 'post') {
            //get value from textbox
            $post = $this->request->getPost(['email', 'password']);

            //provide validation
            $rules = [
                'email' => ['label' => 'email', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ];

            if (!$this->validate($rules)) {
                $data['loginValidation'] = $this->validator;
            } else {
                //Get user from database using email and password
                $teacherModel = new \App\Models\TeacherModel();
                $teacher = $teacherModel->where('email', $post['email'])->where('password', sha1($post['password']))->first();

                if (!$teacher) {
                    $session = session();
                    $session->setFlashdata('invalid', 'Invalid email or password, please try again');
                } else {
                    // Redirect upon successful login
                    $this->setTeacherSession($teacher);
                    return redirect()->to(base_url('teacher_home'));
                }
            }
        }
        return view('teacher/teacher_login');
    }

    public function setTeacherSession($teacher)
    {
        //set full name of current teacher
        $teacherFullname = '';

        if (empty($teacher->middlename)) {
            $teacherFullname = $teacher->first_name . ' ' . $teacher->last_name;
        } else {
            $teacherFullname = $teacher->first_name . ' ' . $teacher->middle_name . ' ' . $teacher->last_name;
        }

        //provide variables for every field of teacher and set session of teacher
        $data = [
            'teacherId' => $teacher->teacher_id,
            'teacherFirstname' => $teacher->first_name,
            'teacherMiddlename' => $teacher->middle_name,
            'teacherLastname' => $teacher->last_name,
            'teacherAge' => $teacher->age,
            'teacherEmail' => $teacher->email,
            'teacherPassword' => $teacher->password,
            'teacherFullName' => $teacherFullname,
            'isLoggedIn' => true
        ];
        session()->set($data);
    }

    //STUDENT-------------------------------------------------------------------------------------------------
    public function student(){
        $data = [];
        helper('form');

        //Login button clicked
        if ($this->request->getMethod() == 'post') {
            //get value from textbox
            $post = $this->request->getPost(['email', 'password']);

            //provide validation
            $rules = [
                'email' => ['label' => 'email', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ];

            if (!$this->validate($rules)) {
                $data['loginValidation'] = $this->validator;
            } else {
                //Get user from database using email and password
                $studentModel = new \App\Models\StudentModel();
                $student = $studentModel->where('email', $post['email'])->where('password', sha1($post['password']))->first();

                if (!$student) {
                    $session = session();
                    $session->setFlashdata('invalid', 'Invalid email or password, please try again');
                } else {
                    // Redirect upon successful login
                    $this->setStudentSession($student);
                    return redirect()->to(base_url('student_home'));
                }
            }
        }
        return view('student/student_login');
    }

    public function setStudentSession($student)
    {
        //set full name of current student
        $studentFullname = '';

        if (empty($student->middlename)) {
            $studentFullname = $student->first_name . ' ' . $student->last_name;
        } else {
            $studentFullname = $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name;
        }

        //provide variables for every field of student and set session of student
        $data = [
            'studentId' => $student->student_id,
            'studentFirstname' => $student->first_name,
            'studentMiddlename' => $student->middle_name,
            'studentLastname' => $student->last_name,
            'studentCourse' => $student->course,
            'studentYear' => $student->year,
            'studentSection' => $student->section,
            'studentEmail' => $student->email,
            'studentPassword' => $student->password,
            'studentFullName' => $studentFullname,
            'isLoggedIn' => true
        ];
        session()->set($data);
    }
}
