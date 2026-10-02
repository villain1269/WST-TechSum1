<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $data['tasks'] = (new TaskModel())->orderBy('task_date', 'ASC')->findAll();
        return view('tasks/index', $data);
    }
}