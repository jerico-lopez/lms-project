<?php

namespace App\Controllers;

class Course extends BaseController
{
    public function addCourse()
    {
        $data = array();
        //Helpers are collections of useful procedural functions.
        helper(['form']);

        //runs when submit button is clicked
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['course_name']);
            $post['instructor_id'] = session()->get('teacherId');
            $post['class_code'] = $this->generateClassCode();

            //return dd($post); //for debug

            //textfield validation
            $rules = [
                'course_name' => ['label' => 'course name', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //save course to db
                $courseModel = new \App\Models\CourseModel();
                $courseModel->save($post);

                $session = session();
                $session->setFlashdata('success-add-course', 'Course successfully added!');

                return redirect()->to(base_url('teacher_home'));
            }
        }
        return view('teacher/teacher_addcourse', $data);
    }

    private function generateClassCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $classCode = '';
        $length = 6;

        for ($i = 0; $i < $length; $i++) {
            $classCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $classCode;
    }
}
