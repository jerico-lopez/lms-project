<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $allowedFields = [
        'first_name',
        'middle_name',
        'last_name',
        'course',
        'year',
        'section',
        'email',
        'password',
        'image'
    ];
    protected $returnType = 'object';
}
