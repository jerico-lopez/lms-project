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
        $data = [];

        // Load the CourseEnrollmentModel
        $enrollmentModel = new \App\Models\CourseEnrollmentModel();

        // Get the enrolled students for the current course
        $data['enrolledStudents'] = $enrollmentModel->getEnrolledStudents($courseId);

        // Load the view and pass the enrolled students
        return view('teacher/teacher_viewclass', $data);
    }
    public function student(): string
    {
        return view('student/student_home');
    }
}
