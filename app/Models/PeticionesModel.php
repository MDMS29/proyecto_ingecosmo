<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class PeticionesModel extends Model
{
    protected $table = 'peticiones'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_peticion';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_peticion', 'emisor', 'receptor', 'asunto', 'msg_emisor', 'msg_receptor', 'tipo_validacion', 'fecha_envio_pet', 'fecha_res_pet', 'hora_envio_pet', 'hora_res_pet', 'usuario_crea', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = ''; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function obtenerPeticiones()
    {
        $this->select('peticiones.*');
        $data = $this->findAll();
        return $data;
    }
}
