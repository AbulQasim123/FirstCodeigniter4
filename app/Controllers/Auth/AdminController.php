<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {   
        if (session()->get('role') != 'admin') {
            echo 'Access Denied';
            exit;
        }
    }
    public function index()
    {
        return view('multi-auth/admin/dashboard');
    }
}
