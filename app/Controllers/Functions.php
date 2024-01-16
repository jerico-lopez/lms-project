<?php

namespace App\Controllers;

class Functions extends BaseController
{
    public function newAnnouncement($courseId)
    {
        $data = array();
        helper(['form']);

        //runs when submit button is clicked
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            //return dd($post); //for debug

            //textfield validation
            $rules = [
                'announcement' => ['label' => 'announcement', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //save Announcement to db
                $post['course_id'] = $courseId;
                $AnnouncementModel = new \App\Models\AnnouncementModel();
                $AnnouncementModel->save($post);

                $session = session();
                $session->setFlashdata('success-add-announcement', 'Announcement added.');
            }
        }
        $data['course_id'] = $courseId;
        return view('teacher/teacher_viewclass', $data);
    }
}
