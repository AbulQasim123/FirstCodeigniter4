<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class EditorController extends BaseController
{
    public function __construct(){
        if (session()->get('role') != 'editor') {
            echo 'Access Denied';
            exit;
        }
    }
    public function index()
    {
        return view('multi-auth/editor/dashboard');
    }
}
