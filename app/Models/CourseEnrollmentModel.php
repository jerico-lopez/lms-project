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
}