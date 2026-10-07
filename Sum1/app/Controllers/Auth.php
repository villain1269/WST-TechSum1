<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->has('user_id')) {
            return redirect()->to(site_url('tasks'));
        }

        return view('auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('auth/login', ['validation' => $this->validator]);
        }

        $username = trim((string) $this->request->getPost('username'));
        $user = (new UserModel())->findByUsername($username);

        if ($user === null || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return view('auth/login', [
                'error' => 'Invalid username or password.',
            ]);
        }

        session()->regenerate(true);
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'logged_in' => true,
        ]);

        return redirect()->to(site_url('tasks'))->with('success', 'Welcome back, ' . $user['username'] . '.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'))->with('success', 'You have been logged out.');
    }
}
