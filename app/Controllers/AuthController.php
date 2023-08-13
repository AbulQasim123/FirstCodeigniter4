<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\Employee as EmployeeModel;
use App\Models\DatatableModel;

class AuthController extends BaseController
{
    protected $employee;
    protected $datatable;
    public function __construct()
    {
        $this->datatable = new DatatableModel();
        $this->employee = new EmployeeModel();
    }
    // User Registration
    public function userRegister()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'phone_no' => 'required|max_length[10]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[3]|max_length[16]',
                'password_confirm' => 'required|matches[password]',
            ];
            $messages = [
                'name' => [
                    'required' => 'Name is requird?',
                    'min_length' => 'Name at least 3 chars long?',
                    'max_length' => 'Name is exceeded only 20 chars long'
                ],

                'phone_no' => [
                    'required' => 'Phone number is required?',
                    'max_length' => 'Phone number extact 10 chars long'
                ],
                'email' => [
                    'required' => 'Email is required?',
                    'min_length' => 'Email at least 6 chars long?',
                    'max_length' => 'Email is exceeded only 50 chars long?',
                    'valid_email' => 'Please enter valid email address!',
                    'is_unique' => 'Email already exist!'
                ],
                'password' => [
                    'required' => 'Password is required?',
                    'min_length' => 'Email at least 3 chars long!',
                    'max_length' => 'Email at least 16 chars long!',
                ],
                'password_confirm' => [
                    'matches' => 'The password confirmation does not match the password.',
                ]
            ];

            if (!$this->validate($rules, $messages)) {

                return view('users/register', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();
                $newData = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone_no' => $this->request->getVar('phone_no'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to(base_url('login'));
            }
        }
        return view('users/register');
    }

    // User Login
    public function userLogin()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]',
            ];

            $messages = [
                'email' => [
                    'required' => 'Email is required?',
                    'min_length' => 'Email at least 6 chars long?',
                    'max_length' => 'Email is exceeded only 50 chars long?',
                    'valid_email' => 'Please enter valid email address!',
                ],
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('users/login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                // Stroing session values
                $this->setUserSession($user);
                // Redirecting to dashboard after login
                return redirect()->to(base_url('dashboard'));
            }
        }
        return view('users/login');
    }

    // Set User Session

    /**
     * @param $user
     * @return true
     */
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    // User Dashboard
    public function userDashboard()
    {   
        $perpage = 50;
        $datatables = $this->datatable->paginate($perpage);
        return view('dashboard/dashboard', ['datatables' => $datatables]);
    }
    // Controller function to load employee data and generate JSON response for DataTables
    public function loadEmployee()
    {
        $db = db_connect();
        $list_employee = $db->table('employees')->select('*')->get()->getResultArray();
        $data = [];
        foreach ($list_employee as $employee) {
            $editButton = '<a href="' . base_url('serverside/edit-employee/' . $employee['id']) . '" class="btn-floating btn-small waves-effect waves-light pink"><i class="material-icons">edit</i></a>';
            $deleteButton = '<a href="' . base_url('serverside/del-employee/' . $employee['id']) . '" class="btn-floating btn-small waves-effect waves-light red" onclick="return confirm(\'Are you sure want to delete?\')"><i class="tiny material-icons">delete</i></a>';
            $employee['actions'] = $editButton . ' ' . $deleteButton;
            $data[] = $employee;
        }
        return $this->response->setJSON(['data' => $data]);
    }

    // User Profile
    public function userProfile()
    {
        $data = [];
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('dashboard/profile', $data);
    }

    // User Logout
    public function userLogout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
