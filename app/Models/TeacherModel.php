<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'teacher_id';
    protected $allowedFields = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'email',
        'password'
    ];
    protected $returnType = 'object';
}
