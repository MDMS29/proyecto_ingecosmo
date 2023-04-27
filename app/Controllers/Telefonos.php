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
        $tp = $this->request->getPost('tp');
        $idUsu = $this->request->getPost('idUsuario');
        $numero = $this->request->getPost('numero');
        $prioridad = $this->request->getPost('prioridad');
        $tipoUsu = $this->request->getPost('tipoUsu');
        $tipoTel = $this->request->getPost('tipoTel');
        $usuarioCrea = session('id');

        $data = [
            'id_usuario' => $idUsu,
            'numero' => $numero,
            'tipo_telefono' => $tipoTel,
            'tipo_usuario' => $tipoUsu,
            'prioridad' => $prioridad,
            'usuario_crea' => $usuarioCrea
        ];
        if ($tp == 2) {
            $res = $this->telefonos->buscarTelefono($numero, $idUsu, $tipoUsu);
            if (!empty($res)) {
                return json_encode(1);
            } else {
                if ($this->telefonos->save($data)) {
                    return json_encode(1);
                }
            }
        } else {
            if ($this->telefonos->save($data)) {
                return json_encode(1);
            }
        }
    }
    public function buscarTelefono($numero, $idUsuario, $tipoUsuario)
    {
        $array = array();
        $data = $this->telefonos->buscarTelefono($numero, 0, $tipoUsuario);
        array_push($array, $data);
        return json_encode($array);
    }
    public function obtenerTelefonosUser($idUsuario, $tipoUsuario)
    {
        $array = array();
        $data = $this->telefonos->obtenerTelefonoUser($idUsuario, $tipoUsuario);
        array_push($array, $data);
        return json_encode($array);
    }
    public function eliminarTelefono($idTelefono)
    {
        if ($this->telefonos->delete($idTelefono)) {
            return json_encode(1);
        }
    }
}
