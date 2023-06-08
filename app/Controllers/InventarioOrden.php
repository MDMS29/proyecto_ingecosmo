<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\InvOrdenesModel;

class InventarioOrden extends BaseController
{
    protected $invOrden;
    public function __construct()
    {
        $this->invOrden = new InvOrdenesModel();
        helper('sistema');
    }
    public function buscarInventario()
    {
        $id = $this->request->getPost('id');
        $res = $this->invOrden->buscarInventario($id);
        return json_encode($res);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $idInv = $this->request->getPost('idInv');
        $idOrden = $this->request->getPost('id_orden');
        $item = $this->request->getPost('item');
        $checked = $this->request->getPost('checked');
        $observacion = $this->request->getPost('observacion');
        $usuarioCrea = session('id');

        $dataInventario = [
            'item' => $item,
            'checked' => $checked,
            'observacion' => $observacion,
            'usuario_crea' => $usuarioCrea
        ];

        if ($tp == 2) {
            if ($this->invOrden->update($idInv, $dataInventario)) {
                return json_encode(1);
            } else {
                return json_encode(2);
            }
        } else {
            array_push($dataInventario, ['id_orden' => $idOrden]);
            var_dump($dataInventario);
            if ($this->invOrden->save($dataInventario)) {
                return json_encode(1);
            } else {
                return json_encode(2);
            }
        }
    }
}
