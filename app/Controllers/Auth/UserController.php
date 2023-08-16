<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AuthLoginModel;

class UserController extends BaseController
{
    public function multiAuthLogin()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email|min_length[6]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|multiValidateUser[email,password]',
            ];
            $messages = [
                'email' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid',
                    'min_length' => 'Email must be at least 6 characters',
                    'max_length' => 'Email must be at most 50 characters',
                ],
                'password' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters',
                    'max_length' => 'Password must be at most 255 characters',
                    'multiValidateUser' => 'Invalid email or password',
                ]
            ];

            if (!$this->validate($rules, $messages)) {
                return view('multi-auth/login', [
                    'validation' => $this->validator
                ]);
            } else {
                $model = new AuthLoginModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();

                // Storing session value
                $this->setUserSession($user);
                // Redirecting to Dashboard After Login
                if ($user['role'] == 'admin') {
                    return redirect()->to(base_url('admin'));
                } elseif ($user['role'] == 'editor') {
                    return redirect()->to(base_url('editor'));
                }
            }
        }
        return view('multi-auth/login');
    }

    public function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'mobile' => $user['mobile'],
            'isMultiLoggedIn' => true,
            'role' => $user['role'],
        ];
        session()->set($data);
        return true;
    }

    public function authLogout()
    {
        session()->destroy();
        return redirect()->to('http://localhost:2025/mutli-auth-login');
    }
}
