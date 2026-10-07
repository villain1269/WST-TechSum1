<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $data['tasks'] = (new TaskModel())->getTasksForToday();
        $data['today'] = date('F j, Y');
        $data['loggedIn'] = session()->has('user_id');
        return view('welcome_message', $data);
    }
}
