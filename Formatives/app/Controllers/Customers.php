<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();

        return view('customers', [
            'customers' => $model->findAll()
        ]);
    }

    public function create()
    {
        return view('customer_form');
    }

    public function store()
    {
        $rules = [
            'full_name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return view('customer_form', [
                'validation' => $this->validator
            ]);
        }

        $model = new CustomerModel();

        $model->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('customers'));
    }

    public function edit($id)
{
    $model = new CustomerModel();
    $customer = $model->find($id);

    if (!$customer) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found');
    }

    return view('customer_form', [
        'customer' => $customer
    ]);
}

public function update($id)
{
    $rules = [
        'full_name' => 'required',
        'email' => 'required|valid_email',
        'phone' => 'permit_empty'
    ];

    if (!$this->validate($rules)) {
        return view('customer_form', [
            'validation' => $this->validator,
            'customer' => [
                'id' => $id,
                'full_name' => $this->request->getPost('full_name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone')
            ]
        ]);
    }

    $model = new CustomerModel();

    $model->update($id, [
        'full_name' => $this->request->getPost('full_name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone')
    ]);

    return redirect()->to(base_url('customers'));
}
}