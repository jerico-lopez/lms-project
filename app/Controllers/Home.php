<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function teacher()
    {
        $data = [];

        // Get the teacher ID from the session
        $teacherId = session()->get('teacherId');
        $courseModel = new \App\Models\CourseModel();

        // Get all courses for the current teacher and push to the $data
        $data['courses'] = $courseModel->getCoursesByTeacher($teacherId);

        // Load the view and return the courses
        return view('teacher/teacher_home', $data);
    }
    public function teacherViewClass($courseId)
    {
        // Load the CourseEnrollmentModel
        $enrollmentModel = new \App\Models\CourseEnrollmentModel();
        $announcementModel= new \App\Models\AnnouncementModel();

        // Get the enrolled students for the current course
        $data['enrolledStudents'] = $enrollmentModel->getEnrolledStudents($courseId);
        $data['announcements'] = $announcementModel->getAnnouncements($courseId);
        helper(['form']);

        //runs when submit button is clicked
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            //return dd($post); //for debug

            //textfield validation
            $rules = [
                'announcement' => ['label' => 'announcement', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //save Announcement to db
                $post['course_id'] = $courseId;
                $AnnouncementModel = new \App\Models\AnnouncementModel();
                $AnnouncementModel->save($post);

                $session = session();
                $session->setFlashdata('success-add-announcement', 'Announcement added.');
                $back = base_url("teacher_viewclass/$courseId");
                return redirect()->to($back);
            }
        }
        // Load the view and pass the enrolled students
        $data['course_id'] = $courseId;
        return view('teacher/teacher_viewclass', $data);
    }
    public function student(): string
    {
        $data = [];

        // Get the teacher ID from the session
        $studentId = session()->get('studentId');
        $ceModel = new \App\Models\CourseEnrollmentModel();

        // Get all courses for the current teacher and push to the $data
        $data['courses'] = $ceModel->getEnrolledCourses($studentId);

        // Load the view and return the courses
        return view('student/home', $data);
    }
}
