<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\PeticionesModel;
use App\Models\ParamModel;

class Peticiones extends BaseController
{
    protected $peticiones;
    protected $param;
    public function __construct()
    {
        $this->param = new ParamModel();
        $this->peticiones = new PeticionesModel();
    }
    public function index()
    {
        $param = $this->param->obtenerTipoValidacion();
        $data = ['estados' => $param];
        echo view('/principal/sidebar');
        echo view('/peticiones/peticionesAdmin/recibidosAdmin', $data);
        // echo view('/peticiones/peticiones', $data);
    }

    public function indexAlmacenista()
    {
        $param = $this->param->obtenerTipoValidacion();
        $data = ['estados' => $param];
        echo view('/principal/sidebar');
        echo view('/peticiones/peticionesAlmacenista/recibidosAlmacenista', $data);
        // echo view('/peticiones/peticiones', $data);
    }

    public function obtenerPeticiones()
    {
        $tp = $this->request->getPost('tp');
        $res = $this->peticiones->obtenerPeticiones($tp);
        return json_encode($res);
    }

    public function buscarPeticion($id)
    {
        $array = array();
        $data = $this->peticiones->buscarPeticion($id);
        array_push($array, $data);
        return json_encode($array);
    }

    public function enviadosAdmin()
    {
        $param = $this->param->obtenerTipoValidacion();
        $data = ['estados' => $param];
        echo view('principal/sidebar');
        echo view('peticiones/peticionesAdmin/enviadosAdmin', $data);
    }

    public function enviadosAlmacenista()
    {
        $param = $this->param->obtenerTipoValidacion();
        $data = ['tipoVal' => $param];
        echo view('principal/sidebar');
        echo view('peticiones/peticionesAlmacenista/enviadosAlmacenista', $data);
    }

    public function insertar()
    {
        date_default_timezone_set('America/Bogota');
        $idPeticion = $this->request->getPost('id');
        $asunto = $this->request->getPost('asunto');
        $emisor = $this->request->getPost('emisor');
        $fechaP = date('Y-m-d');
        $horaP = date("H:i:s");
        $txtDescripcion = $this->request->getPost('txtDescripcion');

        $usuarioCrea = session('id');

        $peticionSave = [
            'asunto' => $asunto,
            'emisor' => $emisor,
            'fecha_envio_pet' => $fechaP,
            'hora_envio_pet' => $horaP,
            'msg_emisor' => $txtDescripcion,
            'usuario_crea' => $usuarioCrea

        ];
        $this->peticiones->save($peticionSave);
        return json_encode($this->peticiones->getInsertID());
    }

    public function responder()
    {
        date_default_timezone_set('America/Bogota');
        $idPeticion = $this->request->getPost('id');
        $asunto = $this->request->getPost('asunto');
        $fechaP = date('Y-m-d');
        $horaP = date("H:i:s");

        $txtDescripcion = $this->request->getPost('txtDescripcion');
        $receptor = $this->request->getPost('receptor');
        $respuesta = $this->request->getPost('respuesta');
        $estado = $this->request->getPost('estado');
        $fechaRes = date('Y-m-d');
        $horaRes = date("H:i:s");

        $usuarioCrea = session('id');

        $peticionUpdate = [
            'asunto' => $asunto,
            'fecha_envio_pet' => $fechaP,
            'hora_envio_pet' => $horaP,
            'msg_emisor' => $txtDescripcion,
            'receptor' => $receptor,
            'tipo_validacion' => $estado,
            'fecha_res_pet' => $fechaRes,
            'hora_res_pet' => $horaRes,
            'msg_receptor' => $respuesta,
            'usuario_crea' => $usuarioCrea

        ];
        $this->peticiones->update($idPeticion, $peticionUpdate);
        return $idPeticion;
        return json_encode($this->peticiones->getInsertID());
    }
}
