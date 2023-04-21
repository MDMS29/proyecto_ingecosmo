<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/materiales.css">
  <script src="jquery-3.6.4.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
              <input href="#" onclick="detallesMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/detalles.png" width="30" height="30" title="Mas detalles del insumo"></input>
              <input href="#" onclick="usarMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#usarMaterialModal" type="image" src="<?php echo base_url(); ?>/img/usarM.png" width="30" height="30" title="Usar insumo"></input>
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


  <!-- Modal -->
  <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mas Detalles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <label for="exampleDataList" class="form-label">Precio de Venta</label>
          <input class="form-control" list="datalistOptions" id="precioVenta" name="precioVenta" placeholder="">
          <label for="exampleDataList" class="form-label">Precio de Compra</label>
          <input class="form-control" list="datalistOptions" id="precioCompra" name="precioCompra" placeholder="">
          <label for="exampleDataList" class="form-label">Cantidad Vendida</label>
          <input class="form-control" list="datalistOptions" id="cantidadVendida" name="cantidadVendida" placeholder="">
          <label for="exampleDataList" class="form-label">Cantidad Actual</label>
          <input class="form-control" list="datalistOptions" id="cantidadActual" name="cantidadActual" placeholder="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary close" data-bs-dismiss="modal">No</button>
          <a class="btn btn-danger btn-ok">Si</a>
        </div>
      </div>
    </div>
  </div>


  <!-- script javascript actualizar -->
  <script>
    function detallesMaterial(id_material) {
      dataURL = "<?php echo base_url('/materiales/detallesMaterial'); ?>" + "/" + id_material;
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {
          $("#titulo").text('Mas Detalles');
          $("#precioVenta").val(rs[0]['precio_venta']);
          $("#precioCompra").val(rs[0]['precio_compra']);
          $("#cantidadVendida").val(rs[0]['cantidad_vendida']);
          $("#cantidadActual").val(rs[0]['cantidad_actual']);
          // $("#detallesModal").modal("show");
        }
      })
    }
  </script>
</body>


</html>