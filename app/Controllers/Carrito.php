<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Controllers\Materiales;

class Carrito extends BaseController
{

    protected $carrito;
    protected $materiales;
  
    public function __construct()
    {
     
    }

    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/carrito/carrito');
    }

}
