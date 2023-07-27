<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee as EmployeeModel;
use App\Models\PostModel;

class Employee extends BaseController
{
    protected $employee;
    protected $post;
    public function __construct()
    {
        $this->employee = new EmployeeModel();
        $this->post = new PostModel();
    }

    public function addEmployee()
    {
        if ($this->request->getMethod() == 'post') {
            $addEmployee = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'mobile_no' => $this->request->getVar('mobile_no'),
                'designation' => $this->request->getVar('designation'),
                'address' => $this->request->getVar('address'),
            ];

            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[employees.email]',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'mobile_no' => 'required',
                'designation' => 'required',
                'address' => 'required|max_length[100]',
            ];
            $messages = [
                'name' => [
                    'required' => 'Name is requird?',
                    'min_length' => 'Name at least 3 chars long?',
                    'max_length' => 'Name is exceeded only 20 chars long'
                ],
                'email' => [
                    'required' => 'Email is required?',
                    'min_length' => 'Email at least 6 chars long?',
                    'max_length' => 'Email is exceeded only 50 chars long?',
                    'valid_email' => 'Please enter valid email address!',
                    'is_unique' => 'Email already exist!'
                ],
                'gender' => [
                    'required' => 'please choose Gender!',
                ],
                'date_of_birth' => [
                    'required' => 'Please select Date of Birth!',
                ],
                'mobile_no' => [
                    'required' => 'Mobile number is required?',
                    'max_length' => 'Mobile number extact 10 chars long'
                ],
                'designation' => [
                    'required' => 'please choose Designation!',
                ],
                'address' => [
                    'required' => 'Address is required?',
                    'max_length' => 'You have cross the limit!'
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('serverside/add-employee', [
                    'validation' => $this->validator,
                ]);
            } else {
                if ($this->employee->save($addEmployee) === true) {
                    session()->setFlashdata('success', 'Employee Added Successfully.');
                    return redirect()->to(base_url('dashboard'));
                } else {
                    session()->setFlashdata('error', 'Somethings went wrong!');
                }
            }
        }
        return view('serverside/add-employee');
    }

    public function editEmployee($id = null)
    {
        $edit_Employee = $this->employee->where('id', $id)->first();
        // print_r($edit_Employee); die;
        if ($this->request->getMethod() == 'post') {
            $addEmployee = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'mobile_no' => $this->request->getVar('mobile_no'),
                'designation' => $this->request->getVar('designation'),
                'address' => $this->request->getVar('address'),
            ];

            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'mobile_no' => 'required',
                'designation' => 'required',
                'address' => 'required|max_length[100]',
            ];
            $messages = [
                'name' => [
                    'required' => 'Name is requird?',
                    'min_length' => 'Name at least 3 chars long?',
                    'max_length' => 'Name is exceeded only 20 chars long'
                ],
                'email' => [
                    'required' => 'Email is required?',
                    'min_length' => 'Email at least 6 chars long?',
                    'max_length' => 'Email is exceeded only 50 chars long?',
                    'valid_email' => 'Please enter valid email address!',
                    'is_unique' => 'Email already exist!'
                ],
                'gender' => [
                    'required' => 'please choose Gender!',
                ],
                'date_of_birth' => [
                    'required' => 'Please select Date of Birth!',
                ],
                'mobile_no' => [
                    'required' => 'Mobile number is required?',
                    'max_length' => 'Mobile number extact 10 chars long'
                ],
                'designation' => [
                    'required' => 'please choose Designation!',
                ],
                'address' => [
                    'required' => 'Address is required?',
                    'max_length' => 'You have cross the limit!'
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('serverside/add-employee', [
                    'validation' => $this->validator,
                ]);
            } else {
                if ($this->employee->update($id, $addEmployee) === true) {
                    session()->setFlashdata('success', 'Employee Updated Successfully.');
                    return redirect()->to(base_url('dashboard'));
                } else {
                    session()->setFlashdata('error', 'Somethings went wrong!');
                }
            }
        }
        return view('serverside/edit-employee', [
            'employee' => $edit_Employee
        ]);
    }

    public function deleteEmployee($id = null)
    {
        $this->employee->delete($id);
        session()->setFlashdata('success', 'Employee Deleted Successfully.');
        return redirect()->to(base_url('dashboard'));
    }


    // Add new post request using Ajax
    public function addPost()
    {
        if ($this->request->isAJAX()) {
            // print_r($_POST);
            // print_r($_FILES);
            // die;
            $file = $this->request->getFile('file');
            $fileName = $file->getRandomName();
            $addPost = [
                'post_title' => $this->request->getVar('post_title'),
                'post_catrgory' => $this->request->getVar('post_category'),
                'post_body' => $this->request->getVar('post_body'),
                'post_image' => $fileName,
            ];      
            $rules = [
                'post_title' => 'required|min_length[3]|max_length[55]',
                'post_category' => 'required|min_length[3]|max_length[25]',
                'post_body' => 'required|max_length[150]',
                'file' => 'required|uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]',
            ];
            $messages = [
                'post_title' => [
                    'required' => 'Post title is requird?',
                    'min_length' => 'Post title at least 3 chars long?',
                    'max_length' => 'Post title exceeded only 55 chars long'
                ],
                'post_category' => [
                    'required' => 'Post category is required?',
                    'min_length' => 'Post category at least 3 chars long?',
                    'max_length' => 'Post category exceeded only 25 chars long?',
                ],
                'post_body' => [
                    'required' => 'Post body is required',
                    'max_length' => 'Post body exceeded only 150 chars long?',
                ],
                'post_image' => [
                    'required' => 'Image is required.',
                    'uploaded' => 'Error while uploading the image.',
                    'max_size' => 'The image size should not exceed 1 MB.',
                    'is_image' => 'Invalid file type. Only images are allowed.',
                    'mime_in' => 'Invalid file type. Only JPG, JPEG, and PNG images are allowed.',
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return $this->response->setJSON([
                    'error' => true,
                    'messages' => $this->validator->getErrors()
                ]);
            } else {
                $file->move('assets/images', $fileName);
                $this->post->save($addPost);
                return $this->response->setJSON([
                    'error' => false,
                    'messages' => 'Post Added Successfully.'
                ]);
            }
        } else {
            return view('clientside/add-post');
        }
    }
}
