<?php

namespace App\Controllers;

class Upload extends BaseController
{
    public function teacher()
    {
        $teacherModel = new \App\Models\TeacherModel();

        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('profile_picture');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $id = session()->get('teacherId');
                $newName = $file->getRandomName(); // Generates a random name to avoid filename conflicts
            
                // Move the uploaded file to the writable directory
                $file->move(ROOTPATH . 'writable/uploads', $newName);
            
                $data = [
                    'profile_picture' => 'uploads/' . $newName, // Save the file path in the database
                ];
                $teacherModel->update($id, $data);
                return redirect()->to(base_url('teacher_home'));
            }
        }

        return view('teacher/upload_profilepicture');
    }
}
