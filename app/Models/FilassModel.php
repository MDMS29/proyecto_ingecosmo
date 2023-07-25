<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class FilassModel extends Model
{
   protected $table        = 'filas';
   protected $primaryKey   = 'id_fila';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   protected $useSoftDeletes = false;

   protected $allowedFields = ['nombre', 'id_estante','tipo_fila', 'iconoF','usuario_crea', 'fecha_crea', 'estado'];

   protected $useTimestamps = true;
   protected $createdField  = 'fecha_crea';
   protected $updatedField  = '';
   protected $deletedField  = '';

   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation    = false;

   public function obtenerFilas($estante)
   {
      $this->select('filas.*, filas.id_estante as nombreFila, estanteria.nombre as estanteria, estanteria.n_iconos as icono');
      $this->join('estanteria', 'filas.id_estante = estanteria.id', 'left');
      $this->where('id_estante', $estante);
      $this->groupBy('id_fila');
      $datos = $this->findAll();
      return $datos;
   }

   public function traerFilas($id)
   {
      $this->select('filas.*, filas.id_fila as numeroFila');
      $this->where('fila', $id);
      $datos = $this->findAll();
      return $datos;
   }

   public function traerFilasEstante($id)
   {
      $this->select('filas.id_fila as numeroFila');
      $this->where('id_estante', $id);
      $datos = $this->findAll();
      return $datos;
   }

   public function traerFila()
   {
      $this->select('filas.*, filas.id_fila as numeroFila');
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

   // public function traerMaterialEstante($material, $estantes){
   //    $this->select('materiales.*, materiales.id_material as material, materiales.estante as estanteMaterial');
   //    $this->where('materiales.id_material', $material);
   //    $this->where('materiales.estante', $estantes);
   // $datos = $this->findAll();
   //    return $datos;
   // }


   public function traerDetalles($id_material)
   {
      $this->select('filas.* ,estanteria.nombre as nombreEstante');
      $this->join('estanteria', 'estanteria.id = filas.id_estante');
      $this->where('id_material', $id_material);
      $datos = $this->first();
      return $datos;
   }
  
   // public function obtenerMaterialesCate($categoria, $fila)
   //  {
   //      $this->select('id_material, nombre, fila');
   //      $this->where('materiales.categoria_material', $categoria);
   //      $this->where('materiales.fila', $fila);
   //      $datos = $this->findAll();
   //      return $datos;
   //  }


   //   public function obtenerMaterialesFila($id, $nombre){
   //      $this->where('fila', $id);
   //      $this->where('nombre', $nombre);
   //      $datos = $this->findAll();
   //      return $datos;
   //   }

   public function obtenerSecciones($estante)
   {
       $this->select('filas.*');
       $this->where('tipo_fila', '61');
       $this->where('estado', 'A');
       $datos = $this->findAll(); 
       return $datos;
   }



}
