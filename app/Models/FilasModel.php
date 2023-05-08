<?php

namespace App\Models;

use CodeIgniter\Model;

class FilasModel extends Model{
    protected $table        = 'materiales';
    protected $primaryKey   = 'id_material';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id_vehiculo', 'id_proovedor', 'nombre', 'categoria_material', 'tipo_material','cantidad_vendida','cantidad_actual', 'precio_venta', 'precio_compra', 'fecha_ultimo_ingre', 'fecha_ultimo_salid', 'estante', 'fila', 'usuario_crea', 'fecha_crea', 'estado'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

     public function obtenerFilas($estante)
     {
         $this->select('materiales.*, materiales.estante as nombreFila, estanteria.nombre as estanteria');
         $this->join('estanteria','materiales.estante = estanteria.id');
         $this->where('estante', $estante);
         $this->groupBy('fila');
         $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
         return $datos;
     }

     public function traerFilas($fila){
        $this->select('materiales.*, materiales.fila as numeroFila');
        $this->where('fila', $fila);
        $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
     }

     public function traerMaterial($nombre){
        $this->select('materiales.*, materiales.nombre as nombreMaterial');
        $this->where('nombre', $nombre);
        $datos = $this->findAll();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
     }

   //   public function obtenerMaterialesFila($id, $nombre){
   //      $this->where('fila', $id);
   //      $this->where('nombre', $nombre);
   //      $datos = $this->findAll();
   //      return $datos;
   //   }



}