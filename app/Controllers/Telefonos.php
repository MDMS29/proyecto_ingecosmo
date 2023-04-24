<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TelefonosModel;

class Telefonos extends BaseController
{
    protected $telefonos;
    public function __construct()
    {
        $this->telefonos = new TelefonosModel();
        helper('sistema');
    }

    public function insertar()
    {
        $idUsu = $this->request->getPost('idUsu');
        $numero = $this->request->getPost('numero');
        $prioridad = $this->request->getPost('prioridad');
        $tipoUsu = $this->request->getPost('tipoUsu');
        $tipoTel = $this->request->getPost('tipoUsu');
        $usuarioCrea = session('id');

        $data = [
            'id_usuario' => $idUsu,
            'numero' => $numero,
            'tipo_telefono' => $tipoTel,
            'tipo_usuario' => $tipoUsu,
            'prioridad' => $prioridad,
            'usuario_crea' => $usuarioCrea
        ];

        $res = $this->telefonos->save($data);
        if ($res == 1) {
            return 1;
        }
    }
}
