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
        $data = ['tipoVal' => $param];
        echo view('/principal/sidebar');
        echo view('/peticiones/peticionesAlmacenista/enviadosAlmacenista', $data);
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

    public function recibidosAlmacenista()
    {
        $param = $this->param->obtenerTipoValidacion();
        $data = ['tipoVal' => $param];
        echo view('principal/sidebar');
        echo view('peticiones/peticionesAlmacenista/recibidosAlmacenista', $data);
    }

    public function insertar()
    {
        $idPeticion = $this->request->getPost('id');
        $asunto = $this->request->getPost('asunto');
        $emisor = $this->request->getPost('emisor');
        $fechaP = date('Y-m-d');
        $horaP = date('h:m:s');
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
}
