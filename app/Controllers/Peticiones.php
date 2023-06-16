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
        $data = ['tipoDoc' => $param];

        echo view('/principal/sidebar');
        echo view('/peticiones/peticiones', $data);
    }

    public function obtenerPeticiones()
    {
        $res = $this->peticiones->obtenerPeticiones();
        return json_encode($res);
    }





    // public function insertar()
    // {
    //     $tp = $this->request->getPost('tp');
    //     $idProveedor = $this->request->getPost('id');
    //     $nit = $this->request->getPost('nit');
    //     $razonSocial= $this->request->getPost('RazonSocial');
    //     $direccion = $this->request->getPost('direccion');
    //     $telefono = $this->request->getPost('telefono');
    //     $email = $this->request->getPost('email');
    //     $tipoTercero = 8;
    //     $tipoDocumento = 2;
    //     $usuarioCrea = session('id');


    //     if ($tp == 2) {
    //         //Actualizar datos
    //         $proveedorUpdate = [
    //             'n_identificacion' => $nit,
    //             'razon_social' => $razonSocial,
    //             'direccion' => $direccion,
    //             'telefono' => $telefono,
    //             'email' => $email,
    //             'tipo_tercero' => $tipoTercero,
    //             'tipo_doc' => $tipoDocumento,
    //             'usuario_crea' => $usuarioCrea
    //         ];
    //         $this->proveedores->update($idProveedor, $proveedorUpdate);
    //         return $idProveedor;
    //     } else {
    //         //Insertar datos
    //         //Si la respuesta esta vacia - guardar
    //         $proveedorSave = [
    //             'n_identificacion' => $nit,
    //             'razon_social' => $razonSocial,
    //             'direccion' => $direccion,
    //             'telefono' => $telefono,
    //             'email' => $email,
    //             'tipo_tercero' => $tipoTercero,
    //             'tipo_doc' => $tipoDocumento,
    //             'usuario_crea' => $usuarioCrea

    //         ];
    //         $this->proveedores->save($proveedorSave);
    //         return json_encode($this->proveedores->getInsertID());
    //     }
    // }
}
