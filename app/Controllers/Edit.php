<?php

namespace App\Controllers;

class Edit extends BaseController
{
    public function teacher()
    {
        helper(['form']);
        $teacherModel = new \App\Models\TeacherModel();
        $id = session()->get('teacherId');
        $data['teacher'] = $teacherModel->find($id);

        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'age', 'email']);

            //return dd($post);

            //textfield validation
            $rules = [
                'first_name' => ['label' => 'first name', 'rules' => 'required'],
                'last_name' => ['label' => 'last name', 'rules' => 'required'],
                'age' => ['label' => 'age', 'rules' => 'required|numeric'],
                'email' => ['label' => 'email', 'rules' => 'required|valid_email'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $teacherModel->update($id,$post);
                $session = session();
                $session->setflashdata('success-update-teacher', 'Teacher Successfuly Updated!');

                $teacher = $teacherModel->where('teacher_id', $id)->first();
                $this->setTeacherSession($teacher);
                return redirect()->to(base_url('teacher_home'));
            }
        }
        return view('teacher/edit_profile', $data);
    }

    public function setTeacherSession($teacher)
    {
        //set full name of current teacher
        $teacherFullname = '';

        if (empty($teacher->middle_name)) {
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
}
