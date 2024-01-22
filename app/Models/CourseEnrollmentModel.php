<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseEnrollmentModel extends Model
{
    protected $table = 'course_enrollments';
    protected $primaryKey = 'enrollment_id';
    protected $allowedFields = [
        'course_id',
        'student_id',
        'created_at',
        'updated_at',
    ];
    protected $returnType = 'object';

    public function getEnrolledStudents($courseId)
    {
        return $this->select('students.*')
            ->join('students', 'students.student_id = course_enrollments.student_id')
            ->where('course_enrollments.course_id', $courseId)
            ->findAll();
    }
    public function getEnrolledCourses($studentId)
    {
        return $this->select('courses.*')
            ->join('courses', 'courses.course_id = course_enrollments.course_id')
            ->where('course_enrollments.student_id', $studentId)
            ->findAll();
    }
}