<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmailModel;

class Email extends BaseController
{
    protected $email;
    public function __construct()
    {
        $this->email = new EmailModel();
        helper('sistema');
    }

    public function insertar()
    {
        $idUsu = $this->request->getVar('idUsuario');
        $email = $this->request->getPost('correo');
        $prioridad = $this->request->getPost('prioridad');
        $tipoUsu = $this->request->getPost('tipoUsu');
        $usuarioCrea = session('id');

        $data = [
            'id_usuario' => $idUsu,
            'email' => $email,
            'prioridad' => $prioridad,
            'tipo_usuario' => $tipoUsu,
            'usuario_crea' => $usuarioCrea
        ];
        if ($this->email->save($data)) {
            return json_encode(1);
        }
    }
}
