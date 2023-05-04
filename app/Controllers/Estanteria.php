<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Estanteria extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        echo view('/principal/sidebar');
        echo view('/estanteria/estanteria');
    }
}