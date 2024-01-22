<?php

namespace App\Controllers;

class Enroll extends BaseController
{
    public function enroll()
    {
        $data = array();

        if ($this->request->getMethod() == 'post') {
            $classCode = $this->request->getPost('class_code');
            // Class Code Validation
            if (!empty($classCode)) {
                $courseModel = new \App\Models\CourseModel();
                $course = $courseModel->where('class_code', $classCode)->first();

                if ($course) {
                    // Student is allowed to enroll in the course
                    $enrollmentModel = new \App\Models\CourseEnrollmentModel();

                    // Check if the student is already enrolled
                    $studentId = session()->get('studentId');
                    $existingEnrollment = $enrollmentModel->where('course_id', $course->course_id)
                        ->where('student_id', $studentId)
                        ->first();

                    if (!$existingEnrollment) {
                        // Enroll the student
                        $enrollmentData = [
                            'course_id' => $course->course_id,
                            'student_id' => $studentId,
                        ];
                        $enrollmentModel->insert($enrollmentData);

                        $session = session();
                        $session->setFlashdata('enroll-status', 'Enrollment successful!');
                        return redirect()->to(base_url('student/home'));
                    } else {
                        // Student is already enrolled
                        $data['error'] = 'You are already enrolled in this course.';
                    }
                } else {
                    // Invalid class code
                    $data['error'] = 'Invalid class code. Please check and try again.';
                }
            } else {
                // Class code is empty
                $data['error'] = 'Class code cannot be empty.';
            }
        }

        return view('student/enroll', $data);
    }
}
