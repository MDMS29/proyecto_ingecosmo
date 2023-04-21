<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Principal extends BaseController
{
    public function __construct()
    {
        helper('sistema');
    }

    public function home()
    {
        echo view('/principal/header');
        echo view('/principal/principal');
    }
}
