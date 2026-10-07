<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $data['tasks'] = (new TaskModel())->getActiveTasks();
        $data['loggedIn'] = session()->has('user_id');
        return view('tasks/index', $data);
    }

    public function newTask()
    {
        return view('tasks/form', [
            'task' => null,
            'formAction' => site_url('tasks/create'),
            'heading' => 'New Task',
        ]);
    }

    public function create()
    {
        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status' => 'permit_empty|in_list[pending,done]',
        ];

        if (! $this->validate($rules)) {
            return view('tasks/form', [
                'task' => $this->request->getPost(),
                'formAction' => site_url('tasks/create'),
                'heading' => 'New Task',
                'validation' => $this->validator,
            ]);
        }

        (new TaskModel())->insert([
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'))->with('success', 'Task created successfully.');
    }

    public function edit(int $id)
    {
        $task = (new TaskModel())->where('is_archived', 0)->find($id);

        if ($task === null) {
            return redirect()->to(site_url('tasks'))->with('error', 'Task not found.');
        }

        return view('tasks/form', [
            'task' => $task,
            'formAction' => site_url('tasks/update/' . $id),
            'heading' => 'Edit Task',
        ]);
    }

    public function update(int $id)
    {
        $model = new TaskModel();
        $task = $model->where('is_archived', 0)->find($id);

        if ($task === null) {
            return redirect()->to(site_url('tasks'))->with('error', 'Task not found.');
        }

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status' => 'permit_empty|in_list[pending,done]',
        ];

        if (! $this->validate($rules)) {
            return view('tasks/form', [
                'task' => array_merge($task, $this->request->getPost()),
                'formAction' => site_url('tasks/update/' . $id),
                'heading' => 'Edit Task',
                'validation' => $this->validator,
            ]);
        }

        $model->update($id, [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to(site_url('tasks'))->with('success', 'Task updated successfully.');
    }

    public function delete(int $id)
    {
        $model = new TaskModel();
        $task = $model->where('is_archived', 0)->find($id);

        if ($task === null) {
            return redirect()->to(site_url('tasks'))->with('error', 'Task not found.');
        }

        $model->update($id, ['is_archived' => 1]);

        return redirect()->to(site_url('tasks'))->with('success', 'Task archived successfully.');
    }
}
