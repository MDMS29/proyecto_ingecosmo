<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'roles'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_rol';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'descripcion', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fechaCrea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerRoles()
    {
        $this->select('roles.*,');
        $data = $this->findAll();
        return $data;
    }
}
