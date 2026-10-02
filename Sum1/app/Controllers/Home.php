<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $data['tasks'] = (new TaskModel())->getTasksForToday();
        $data['today'] = date('F j, Y');
        return view('welcome_message', $data);
    }
}