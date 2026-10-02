<?php
namespace App\Controllers;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $data['user'] = (new UserModel())->first();
        return view('profile/index', $data);
    }
}