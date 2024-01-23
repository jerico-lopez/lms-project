<?php

namespace App\Controllers;

class Delete extends BaseController
{
    public function teacherDeleteAnnouncement($id)
    {
        $announcementModel = new \App\Models\AnnouncementModel();
        $data['announcement_id'] = $announcementModel->find($id);

        if ($this->request->getMethod() == 'post') {
            $announcementModel->delete($id);

            $session = session();
            $session->setflashdata('success-delete-announcement', 'Announcement Deleted Succcessfuly!');

            return redirect()->back();
        }
    }

    public function teacherDeleteClass($id)
    {
        $courseModel = new \App\Models\CourseModel();
        $ceModel = new \App\Models\CourseEnrollmentModel();
        $data['course_id'] = $courseModel->find($id);;

        if ($this->request->getMethod() == 'post') {
            $courseModel->delete($id);
            $ceModel->where('course_id', $id)->delete();

            $session = session();
            $session->setflashdata('success-delete-course', 'Course Deleted Succcessfuly!');

            return redirect()->to(base_url('teacher_home'));
        }
        return view('teacher/teacher_deleteclass', $data);
    }

    public function teacherRemoveStudentFromClass($id)
    {
        $ceModel = new \App\Models\CourseEnrollmentModel();
        $data['studentId'] = $id;
        //dd($data);

        if ($this->request->getMethod() == 'post') {
            $data['enrollment'] = $ceModel->getCourseEnrollment($id);
            $ceid = $data['enrollment']->enrollment_id;
            $ceModel->delete($ceid);
            $session = session();
            $session->setFlashdata('success-remove-student', 'Student Removed Successfully!');
            //session back is set based on the last class opened
            return redirect()->to(base_url('teacher_viewclass/'.session()->get('back')));
        }

        return view('teacher/confirm_remove', $data);
    }
}
