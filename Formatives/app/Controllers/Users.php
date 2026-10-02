<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        return view('users', [
            'users' => $model->findAll()
        ]);
    }

    public function create()
    {
        return view('user_form');
    }

    public function store()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('user_form', [
                'validation' => $this->validator
            ]);
        }

        $model = new UserModel();

        $model->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('users'));
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('user_form', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        $rules = [
            'username' => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required'
        ];

        $file = $this->request->getFile('avatar');

        if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] =
                'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (!$this->validate($rules)) {
            return view('user_form', [
                'validation' => $this->validator,
                'user' => [
                    'id' => $id,
                    'username' => $this->request->getPost('username'),
                    'full_name' => $this->request->getPost('full_name'),
                    'avatar' => $user['avatar'] ?? null
                ]
            ]);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars';

            $image = service('image');

            $image->withFile($file->getTempName())
                ->resize(300, 300, true, 'height')
                ->save($uploadPath . DIRECTORY_SEPARATOR . $newName);

            $data['avatar'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to(base_url('users'));
    }
}