<?php

namespace App\Controllers;

use App\Models\UserModel;
//use App\Controllers\BaseController;

class UserController extends BaseController
{
    // User Registration
    public function userRegister()
    {
//        $data = [];
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'phone_no' => 'required|min_length[9]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[3]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {

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

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

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
        return view("users/dashboard");
    }

    // User Profile
    public function userProfile()
    {

        $data = [];
        $model = new UserModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('users/profile', $data);
    }

    // User Logout
    public function userLogout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
