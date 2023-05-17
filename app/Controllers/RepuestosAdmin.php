<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\RepuestosAdminModel;

class RepuestosAdmin extends BaseController
{
    // protected $proveedores;
    public function __construct()
    {
        // $this->proveedores = new RepuestosAdminModel();
    }
    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdmin');
    }

   

  
}
