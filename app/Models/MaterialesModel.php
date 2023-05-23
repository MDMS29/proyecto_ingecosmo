<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialesModel extends Model{
    protected $table        = 'materiales';
    protected $primaryKey   = 'id_material';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id_vehiculo', 'id_proovedor', 'nombre', 'categoria_material', 'tipo_material','cantidad_vendida','cantidad_actual', 'precio_venta', 'precio_compra', 'fecha_ultimo_ingre', 'fecha_ultimo_salid', 'estante', 'fila', 'n_iconos', 'usuario_crea', 'fecha_crea'];
    
    protected $useTimestamps = true;

    
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

 

    public function obtenerInsumo($id)
    {
        $this->select('materiales.*, param_detalle.nombre as nombre_categoria');
        $this->join('param_detalle', 'param_detalle.id_param_det = materiales.categoria_material');
        $this->where('materiales.categoria_material', $id);
        $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    
    public function traerDetalles($id_material){
        $this->select('materiales.* ,estanteria.nombre as nombreEstante' );
        $this->join('estanteria', 'estanteria.id = materiales.estante');
        $this->where('id_material', $id_material);
        $datos = $this->first(); 
        return $datos;
    }

    public function traerEditar($id_material){
        $this->select('materiales.*');
        $this->where('id_material', $id_material);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    public function usarInsumo($id_material){
        $this->select('materiales.*');
        $this->where('id_material', $id_material);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
    

        
    public function traerMateriales($id_material){
        $this->select('materiales.*');
        $this->where('id_material', $id_material);
        $datos = $this->first();
        return $datos;
    }

    public function obtenerMaterialesCate($categoria){
        $this->select('id_material, nombre');
        $this->where('materiales.categoria_material', $categoria);
        $datos = $this->findAll();  
        return $datos;
    }

     public function obtenerMaterialesFila($fila){
         $this->select('fila, nombre, id_material');
         $this->where('materiales.fila', $fila);
         $datos = $this->findAll();  
         return $datos;
     }

    public function obtenerMateriales($id_material){
        $this->select('materiales.*');
        $this->where('id_material', $id_material);
    }
    public function buscarInsumo($id_material, $nombre)
    {
        if ($id_material != 0) {
            $this->select('materiales.*,materiales.nombre as nombre_insumo');
            $this->where('id_material', $id_material);
            $this->join('param_detalle', 'param_detalle.id_param_det = materiales.categoria_material');


        } else if ($nombre != '') {
            $this->select('materiales.*,param_detalle.nombre as nombre_categoria');
            $this->where('materiales.nombre', $nombre);
            $this->where('materiales.estado', 'A');
            $this->join('param_detalle', 'param_detalle.id_param_det = materiales.categoria_material');

        } else if ($id_material != 0 && $nombre != '') {

            $this->select('materiales.*');
            $this->where('id_material', $id_material);
            $this->where('nombre', $nombre);

        }
        $data = $this->first();
        return $data;
    }

    
    public function obtenerRepuestoBodega($id)
    {
        
        $this->select('*');
        $this->where('estante', $id);
        $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    // public function traerNombre($id_material){
    //     $this->select('param_detalle.*');
    //     $this->where('nombre', '28');
    //     $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
    //     return $datos;
    // }
}