<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    
    protected $table = 'terceros'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_tercero';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = [  'razon_social', 'direccion', 'tipo_tercero', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function obtenerProveedores()
    {
        $this->select('terceros.*');
        $this->where('tipo_tercero','8');
        $this->where('estado','A');
        $data = $this->findAll();  
        return $data;
    }
}
