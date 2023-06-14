<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Controllers\Materiales;

class ordenEntrega extends BaseController
{

    protected $ordenEntrega;
    protected $materiales;
  
    public function __construct()
    {
     
    }

    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/ordenEntrega/ordenEntrega');
    }

}
