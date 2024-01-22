<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function teacherUploadPhoto()
    {
        $teacherModel = new \App\Models\TeacherModel();
        $file = $this->request->getFile('profile_picture');
        $id = session()->get('teacherId');

        if ($this->request->getMethod() == 'post') {
            if ($file->isValid() && !$file->hasMoved()) {
                $newImageName = $file->getRandomName();
                $file->move('uploads/teachers', $newImageName);
            }

            $data = [
                'image' => $newImageName
            ];
            $teacherModel->update($id, $data);
            session()->set('image', $newImageName);
            return redirect()->to(base_url('teacher_home'));
        }

        return view('teacher/upload_photo');
    }
}
