<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\TercerosModel;
use App\Models\ParamModel;

class Proveedores extends BaseController
{
    protected $proveedores;
    protected $param;
    public function __construct()
    {
        $this->param = new ParamModel();
        $this->proveedores = new TercerosModel();
    }
    public function index()
    {
        $tipoTel = $this->param->obtenerTipoTel(); 
        $param = $this->param->obtenerTipoDoc();
        
        $data = ['tipoDoc' => $param, 'tipoTele' => $tipoTel];
        echo view('/principal/sidebar');
        echo view('/proveedores/proveedores',$data);
    }

    public function obtenerProveedores()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->proveedores->obtenerProveedores($estado);
        return json_encode($res);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $idProveedor = $this->request->getPost('id');
        $nit = $this->request->getPost('nit');
        $razonSocial= $this->request->getPost('RazonSocial');
        $direccion = $this->request->getPost('direccion');
        $telefono = $this->request->getPost('telefono');
        $email = $this->request->getPost('email');
        $tipoTercero = 8;
        $tipoDocumento = 2;
        $usuarioCrea = session('id');


        if ($tp == 2) {
            //Actualizar datos
            $proveedorUpdate = [
                'n_identificacion' => $nit,
                'razon_social' => $razonSocial,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'tipo_tercero' => $tipoTercero,
                'tipo_doc' => $tipoDocumento,
                'usuario_crea' => $usuarioCrea
            ];
            $this->proveedores->update($idProveedor, $proveedorUpdate);
            return $idProveedor;
        } else {
            //Insertar datos
            //Si la respuesta esta vacia - guardar
            $proveedorSave = [
                'n_identificacion' => $nit,
                'razon_social' => $razonSocial,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'tipo_tercero' => $tipoTercero,
                'tipo_doc' => $tipoDocumento,
                'usuario_crea' => $usuarioCrea
                
            ];
            $this->proveedores->save($proveedorSave);
            return json_encode($this->proveedores->getInsertID());
        }
    }

    public function buscarProveedor($id, $nit, $razonSocial)
    {
        $array = array();
        if ($id != 0) {
            $data = $this->proveedores->buscarProveedor($id, 0, 0);
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nit != 0) {
            $data = $this->proveedores->buscarProveedor(0, $nit, 0);
            array_push($array, $data);
            return json_encode($array);
        } else if ($razonSocial != 0) {
            $data = $this->proveedores->buscarProveedor(0, 0, $razonSocial);
            array_push($array, $data);
            return json_encode($array);
        } else if ($id != 0 && $razonSocial != 0) {
            $data = $this->proveedores->buscarProveedor($id, 0, $razonSocial);
            array_push($array, $data);
            return json_encode($array);
        }  else if ($id != 0 && $nit != 0) {
            $data = $this->proveedores->buscarProveedor($id, $nit, 0);
            array_push($array, $data);
            return json_encode($array);
        }
    }


    public function eliminados()
    {
        $proveedores = $this->proveedores->select('*')->where('estado', 'I')->where('tipo_tercero', '8')->findAll();
        $data = ['proveedores' => $proveedores];
        echo view('/principal/sidebar');
        echo view('/proveedores/eliminados', $data);
    }

    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        if ($this->proveedores->update($id, ['estado' => $estado])) {
            if ($estado == 'A') {
                return '¡Se ha reestablecido el Proveedor!';
            } else {
                return '¡Se ha eliminado el Proveedor!';
            }
        }
    }
}
