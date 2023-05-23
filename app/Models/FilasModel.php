<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class FilasModel extends Model
{
   protected $table        = 'materiales';
   protected $primaryKey   = 'id_material';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   protected $useSoftDeletes = false;

   protected $allowedFields = ['id_vehiculo', 'id_proovedor', 'nombre', 'categoria_material', 'tipo_material', 'cantidad_vendida', 'cantidad_actual', 'precio_venta', 'precio_compra', 'fecha_ultimo_ingre', 'fecha_ultimo_salid', 'estante', 'fila', 'usuario_crea', 'fecha_crea', 'estado'];

   protected $useTimestamps = true;
   protected $createdField  = 'fecha_crea';
   protected $updatedField  = '';
   protected $deletedField  = '';

   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation    = false;

   public function obtenerFilas($estante)
   {
      $this->select('materiales.*, materiales.estante as nombreFila, estanteria.nombre as estanteria, estanteria.n_iconos as icono');
      $this->join('estanteria', 'materiales.estante = estanteria.id');
      $this->where('estante', $estante);


      $this->groupBy('fila');
      $datos = $this->findAll();
      return $datos;
   }

   public function traerFilas($fila)
   {
      $this->select('materiales.*, materiales.fila as numeroFila');
      $this->where('fila', $fila);
      $datos = $this->findAll();
      return $datos;
   }

   public function traerMaterial($nombre)
   {
      $this->select('materiales.*, materiales.nombre as nombreMaterial');
      $this->where('nombre', $nombre);
      $datos = $this->findAll();
      return $datos;
   }

   public function contadorArticulos($id)
   {
      $this->select('COUNT(*) as numeroFila');
      $this->join('estanteria', 'materiales.estante = estanteria.id');
      $this->groupBy('estante');
      $this->where('estante', $id);
      $datos = $this->findAll();
      return $datos;
   }

   public function traerDetalles($id_material)
   {
      $this->select('materiales.* ,estanteria.nombre as nombreEstante');
      $this->join('estanteria', 'estanteria.id = materiales.estante');
      $this->where('id_material', $id_material);
      $datos = $this->first();
      return $datos;
   }

   public function contadorFilas($id)
   {
      /*       $query = "SELECT COUNT(num) as total FROM (SELECT COUNT(*) as num FROM materiales WHERE estante =' .  $id . ' GROUP BY fila) as fila";
      
      $data = $this->table($query);
      return $data; */
      //$aa="SELECT COUNT(*) as num"
      //FROM materiales WHERE estante = 3 GROUP BY fila) as hhh";
      // $datos =  $this->select('COUNT(fila) as total');
      /*       $data = $this->from(
         $aa
      );
      return $data; */
      $this->select('COUNT(num) as total');
      $this->select('COUNT(*) as num');
      $this->where('estante', 3);
      $this->groupBy('fila');
      $datos = $this->findAll();
      return $datos;
   }




   //   public function obtenerMaterialesFila($id, $nombre){
   //      $this->where('fila', $id);
   //      $this->where('nombre', $nombre);
   //      $datos = $this->findAll();
   //      return $datos;
   //   }



}
