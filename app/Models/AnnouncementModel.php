<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'announcement_id';
    protected $allowedFields = [
        'course_id',
        'announcement',
        'created_at'
    ];
    protected $returnType = 'object';

    public function getAnnouncements($courseId)
    {
        return $this->select('announcements.*')
            ->join('courses', 'courses.course_id = announcements.course_id')
            ->where('announcements.course_id', $courseId)
            ->findAll();
    }
}
