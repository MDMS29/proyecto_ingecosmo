<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\ParamModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $param;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->param = new ParamModel();
        helper('sistema');
    }
    public function index()
    {

        $usuarios = $this->usuarios->obtenerUsuarios();
        $param = $this->param->obtenerTipoDoc();

        $data = ['usuarios' => $usuarios, 'tipoDoc' => $param];

        echo view('/principal/sidebar');
        echo view('/usuarios/usuarios', $data);
    }
}
