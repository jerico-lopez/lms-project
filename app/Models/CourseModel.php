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
}