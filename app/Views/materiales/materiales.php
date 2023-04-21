<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/materiales.css">
  <title>Materiales</title>
</head>

<body>
  <div id="content" class="p-4 p-md-5">
    <h2>Juego carticas</h2>
    <div class="contenedor">

      <?php foreach ($data as $dato) { ?>
       
          <div class="card">

              <div class="contenido1"> 
              <img src="<?php echo base_url('/img/baterias.png') ?>" class="baterias" />
              <h5 class="card-title"><?php echo $dato['nombre']; ?></h5>
              </div>

              <br>
              <br>

              <div class="contenido2">
              <div class="Imagenes">
                <input href="#" onclick="detalles(<?php echo $dato['nombre'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/detalles.png" width="30" height="30" title="Mas detalles del insumo"></input>
                <input href="#" onclick="usarMaterial(<?php echo $dato['nombre'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#usarMaterialModal" type="image" src="<?php echo base_url(); ?>/img/usarM.png" width="30" height="30" title="Usar insumo"></input>
            </div>
          </div>

        </div>
      <?php } ?>
      <div class="botones">
        <a href="<?php echo base_url('/principal'); ?>" class="btn Regresar">Regresar</a>
        <a href="" onclick="seleccionarMaterial(<?php echo 1 . ',' . 1 ?>);" class="btn Agregar" data-bs-toggle="modal" data-bs-target="#materialesModal">Agregar</a>
      </div>
    </div>
  </div>

</body>


</html>