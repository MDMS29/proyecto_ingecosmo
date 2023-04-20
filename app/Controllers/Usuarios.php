<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        helper('sistema');
    }
    public function index()
    {

        $usuarios = $this->usuarios->obtenerUsuarios();

        $data = ['data' => $usuarios];

        echo view('/principal/sidebar');
        echo view('/usuarios/usuarios', $data);
    }
}
