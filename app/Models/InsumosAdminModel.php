<?php

namespace App\Models;

use CodeIgniter\Model;

class InsumosAdminModel extends Model{
    protected $table        = 'materiales';
    protected $primaryKey   = 'id_material';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id_vehiculo', 'id_proovedor', 'nombre', 'categoria_material', 'tipo_material','cantidad_vendida','cantidad_actual', 'precio_venta', 'precio_compra', 'fecha_ultimo_ingre', 'fecha_ultimo_salid', 'estante', 'fila', 'usuario_crea', 'fecha_crea'];
    
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
    
    public function ObtenerDetallesInsumos(){
        $this->select('materiales.*,estanteria.nombre as nombreEstante' );
        $this->join('estanteria', 'estanteria.id = materiales.estante');
        $this->where('id_material','A');
        $datos = $this->first(); 
        return $datos;
    }

    public function traerEditar($id_material){
        $this->select('materiales.*');
        $this->where('id_material', $id_material);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

}