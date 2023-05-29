<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Principal extends BaseController
{
    public function __construct()
    {
        helper('sistema');
    }

    public function index()
    {
        echo view('login');
    }

    public function home()
    {
        echo view('/principal/sidebar');
        echo view('/principal/home');
    }
}
