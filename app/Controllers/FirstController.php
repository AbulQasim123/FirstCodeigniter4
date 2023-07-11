<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FirstController extends BaseController
{
    public function __construct()
    {
        $db = \Config\Database::connect();
    }
    public function index()
    {
        //
    }
}
