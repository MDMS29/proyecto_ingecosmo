<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\CategoriaModel;
use App\Models\ParamModel;
use App\Models\MaterialesModel;

class Insumos extends BaseController
{
    protected $categorias;
    protected $materiales;
    public function __construct()
    {
        $this->categorias = new ParamModel();
        $this->materiales = new MaterialesModel();
    }
    public function index()
    {
        $categorias = $this->categorias->obtenerCategorias();
        $data = ['data' => $categorias];
        echo view('/principal/sidebar');
        echo view('/categorias/categoriaInsumo', $data);
    }

    public  function mostrarInsumo($id, $nombre, $icon, $idCate)
    {
        $materiales = $this->materiales->obtenerInsumo($id);
        $data = ['data' => $materiales, 'nombreCategoria' => $nombre, 'icono' => $icon, 'idCate' => $idCate];
        echo view('/principal/sidebar');
        echo view('/materiales/materiales', $data);
    }

    public function insertar()
    {
        $nombre =  $this->request->getPost('nombre');
        $cantidadActual = $this->request->getPost('cantidadActual');
        $precioCompra = $this->request->getPost('precioCompra');
        $precioVenta = $this->request->getPost('precioVenta');
        $tipoMaterial = $this->request->getPost('tipoMaterial');
        $idCategoria = $this->request->getPost('idCategoria');

        $data = [
            'nombre' => $nombre,
            'cantidad_actual' => $cantidadActual,
            'precio_compra' => $precioCompra,
            'precio_venta' => $precioVenta,
            'tipo_material' => $tipoMaterial,
            'categoria_material' => $idCategoria
        ];

        $this->materiales->save($data);

        // return redirect()->to(base_url('/materiales'));
    }

    public function actualizar()
    {
        $id =  $this->request->getPost('idMaterial');
        $nombre =  $this->request->getPost('nombre');
        $cantidadActual = $this->request->getPost('cantidadActual');
        $cantidadVendida = $this->request->getPost('cantidadVendida');
        $precioCompra = $this->request->getPost('precioCompra');
        $precioVenta = $this->request->getPost('precioVenta');
        $tipoMaterial = $this->request->getPost('tipoMaterial');

        $data = [
            'id_material' => $id,
            'nombre' => $nombre,
            'cantidad_actual' => $cantidadActual,
            'cantidad_vendida' => $cantidadVendida,
            'precio_compra' => $precioCompra,
            'precio_venta' => $precioVenta,
            'tipo_material' => $tipoMaterial,
        ];

        $this->materiales->update($id, $data);

        return json_encode($data);
        // return redirect()->to(base_url('/materiales'));
    }


    public function Usar()
    {
        $id =  $this->request->getPost('idMaterial');
        $nombre =  $this->request->getPost('nombreInsumo');
        $cantidadExistente = $this->request->getPost('cantidadExistente');
        $precioVenta = $this->request->getPost('PrecioDeVenta');
        $tipoMaterial = $this->request->getPost('tipoMaterial');

        $data = [
            'id_material' => $id,
            'nombre' => $nombre,
            'cantidad_existente' => $cantidadExistente,
            'precio_venta' => $precioVenta,
            'tipo_material' => $tipoMaterial,
        ];

        $this->materiales->update($id, $data);

        return json_encode($data);
        // return redirect()->to(base_url('/materiales'));
    }
}
