<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee as EmployeeModel;
use App\Models\PostModel;
use PhpParser\Node\Expr\FuncCall;

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
            $file = $this->request->getFile('post_image');
            $fileName = $file->getRandomName();
            $rules = [
                'post_title' => 'required|min_length[3]|max_length[55]',
                'post_category' => 'required|min_length[3]|max_length[25]',
                'post_body' => 'required|max_length[150]',
                'file' => 'uploaded[post_image]|max_size[post_image,1024]|is_image[post_image]|mime_in[post_image,image/jpg,image/jpeg,image/png]',
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
            ];

            $addPost = [
                'post_title' => $this->request->getVar('post_title'),
                'post_category' => $this->request->getVar('post_category'),
                'post_body' => $this->request->getVar('post_body'),
                'post_image' => $fileName,
                'created_at' => date('Y-m-d H:i:s')
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

    public function fetchAllPost()
    {
        $posts = $this->post->findAll();
        $html = '';
        if ($posts) {
            foreach ($posts as $key => $post) {
                $html .= '<div class="col s12 m6 l4 xl4">
                <div class="card z-depth-2">
                    <div class="card-image">
                        <a href="">
                            <img id="post_image" src="/assets/images/' . $post['post_image'] . '">
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="row" style="margin-top: -35px;">
                            <div class="col s8">
                                <span style="font-weight: bold;">' . $post['post_title'] . '</span>
                            </div>
                            <div class="col s4 right-align">
                                <span class="new badge">' . $post['post_category'] . '</span>
                            </div>
                        </div>
                        <p>' . $post['post_body'] . '</p>
                    </div>
                    <div class="card-action" id="card-footer">
                        <div class="row">
                            <div class="col s6">
                                <span style="font-style: italic;">' . date('d F Y', strtotime($post['created_at'])) . '</span>
                            </div>
                            <div class="col s6 right-align">
                                <a href="#edit_post_modal" id="' . $post['id'] . '" class="btn-floating btn-small waves-effect waves-light pink modal-trigger edit_post_btn ">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#delete_post_modal" id="' . $post['id'] . '" class="btn-floating btn-small waves-effect waves-light red modal-trigger delete_post_btn">
                                    <i class="tiny material-icons">delete</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            return $this->response->setJSON([
                'error' => false,
                'message' => $html
            ]);
        } else {
            return $this->response->setJSON([
                'error' => false,
                'message' => '<div class="center-align red-text" style="font-weight: bold; font-size: 22px">No posts found.</div>'
            ]);
        }
    }


    // handle edit post ajax request
    public function editPost($id = null)
    {
        $edit_post = $this->post->find($id);
        return $this->response->setJSON([
            'error' => false,
            'message' => $edit_post
        ]);
    }

    // handle update post ajax request
    public function updatePost()
    {
        // $id = $this->request->getPost('edit_post_id');
        // $file = $this->request->getFile('edit_post_image');
        // $fileName = $file->getFilename();
        // if ($fileName != '') {
        //     $fileName = $file->getRandomName();
        //     // print_r($fileName); die;
        //     $file->move('assets/images', $fileName);
        //     if ($this->request->getPost('edit_old_image') != '') {
        //         unlink('assets/images/' . $this->request->getPost('edit_old_image'));
        //     }
        // } else {
        //     $fileName = $this->request->getPost('edit_old_image');
        // }

        $id = $this->request->getPost('edit_post_id');
        $file = $this->request->getFile('edit_post_image');
        $oldImage = $this->request->getPost('edit_old_image');

        if ($file && $file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('assets/images', $fileName);

            // Remove the old image file if it exists
            if ($oldImage && file_exists('assets/images/' . $oldImage)) {
                unlink('assets/images/' . $oldImage);
            }
        } else {
            // If no new file is uploaded, keep the old image filename
            $fileName = $oldImage;
        }

        $rules = [
            'edit_post_title' => 'required|min_length[3]|max_length[55]',
            'edit_post_category' => 'required|min_length[3]|max_length[25]',
            'edit_post_body' => 'required|max_length[150]',
            'file' => 'uploaded[post_image]|max_size[post_image,1024]|is_image[post_image]|mime_in[post_image,image/jpg,image/jpeg,image/png]',
        ];
        $messages = [
            'edit_post_title' => [
                'required' => 'Post title is requird?',
                'min_length' => 'Post title at least 3 chars long?',
                'max_length' => 'Post title exceeded only 55 chars long'
            ],
            'edit_post_category' => [
                'required' => 'Post category is required?',
                'min_length' => 'Post category at least 3 chars long?',
                'max_length' => 'Post category exceeded only 25 chars long?',
            ],
            'edit_post_body' => [
                'required' => 'Post body is required',
                'max_length' => 'Post body exceeded only 150 chars long?',
            ],
        ];
        $updatePost = [
            'post_title' => $this->request->getVar('edit_post_title'),
            'post_category' => $this->request->getVar('edit_post_category'),
            'post_body' => $this->request->getVar('edit_post_body'),
            'post_image' => $fileName,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => true,
                'messages' => $this->validator->getErrors()
            ]);
        } else {
            // $file->move('assets/images', $fileName);
            $this->post->update($id, $updatePost);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Post Updated Successfully.'
            ]);
        }
    }

    // handle delete post ajax request
    public function deletePost($id = null)
    {
        $delete_post = $this->post->find($id);
        if ($delete_post) {
            $this->post->delete($delete_post);
            unlink('assets/images/' . $delete_post['post_image']);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Post Deleted Successfully!'
            ]);
        }
    }
}
