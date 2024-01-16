<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $allowedFields = [
        'course_name',
        'instructor_id',
        'created_at',
        'updated_at',
        'class_code'
    ];
    protected $returnType = 'object';

    public function getCoursesByTeacher($teacherId)
    {
        return $this->where('instructor_id', $teacherId)->findAll();
    }
}