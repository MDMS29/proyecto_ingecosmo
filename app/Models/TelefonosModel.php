<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class TelefonosModel extends Model
{
    protected $table = 'telefonos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_telefono';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_usuario', 'numero', 'tipo_telefono', 'tipo_usuario', 'prioridad', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerTelefonoUser($id)
    {
        $this->select('id_telefono, numero, prioridad');
        $this->where('id_usuario' , $id);
        $data = $this->findAll();
        return $data;
    }
    public function buscarTelefono($numero){
        $this->select('id_telefono, numero, prioridad');
        $this->where('numero' , $numero);
        $data = $this->first();
        return $data;
    }
}
