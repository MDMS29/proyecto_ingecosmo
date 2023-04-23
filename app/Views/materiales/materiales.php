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
    <div class="MasBaterias" id="MasBaterias">
      <h5>Baterias</h5>
      <img src="<?php echo base_url('/img/baterias.png') ?>" id="imagenBateria" />

    </div>
    <div id="contenedor">
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
        <a href="<?php echo base_url('/principal'); ?>" class="btn Regresar" id="Regresar">Regresar</a>
        <a href="" onclick="seleccionarMaterial(<?php echo 1 . ',' . 1 ?>);" class="btn Agregar" id="Agregar" data-bs-toggle="modal" type="image" src="<?php echo base_url(); ?>/img/agregar11.png" width="30" height="30" data-bs-target="#materialesModal">Agregar</a>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Detalles</h5>

          <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
          <img src="<?php echo base_url('/img/masDetalles.png') ?>" class="detalles" />

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row" style="flex-direction: row;">
              <div class="col-xs-100 col-md-100">
                <div class="form-group two-fields">

                  <div class="input-group">
                    <label for="exampleDataList" class="form-label" style="padding: 5px; margin:5px; top:20px;font-weight: 500;">Precio de Venta</label>
                    <input class="form-control" list="datalistOptions" style="padding: 5px; margin:5px; width:10px;text-align:center;font-weight: bold;" id="precioVenta" name="precioVenta" placeholder="" disabled>

                    <label for="exampleDataList" class="form-label" style="padding: 5px; margin:5px; top:20px;font-weight: 500;">Precio de Compra</label>
                    <input class="form-control" list="datalistOptions" style="padding: 5px; margin:5px; width:10px;text-align:center;font-weight: bold;" id="precioCompra" name="precioCompra" placeholder="" disabled>

                    <label for="exampleDataList" class="form-label" style="padding: 5px; margin:5px; top:20px;font-weight: 500;">Cantidad Vendida</label>
                    <input class="form-control" list="datalistOptions" style="padding: 5px; margin:5px; width:10px;text-align:center;font-weight: bold;" id="cantidadVendida" name="cantidadVendida" placeholder="" disabled>
                    <label for="exampleDataList" class="form-label" style="padding: 5px; margin:5px; top:20px;text-align:center;font-weight: 500;">Cantidad Actual</label>
                    <input class="form-control" list="datalistOptions" style="padding: 5px; margin:5px; width:10px;text-align:center;font-weight: bold;" id="cantidadActual" name="cantidadActual" placeholder="" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cerrar mx-auto" style="background-color: #161666; width: 118px; height: 45px;color: #ffffff;" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <form method="POST" action="<?php echo base_url('/materiales/insertar'); ?>" autocomplete="off">
    <div class="modal fade" id="materialesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
            <div id="agregar">

              <img src="<?php echo base_url('/img/agregar11.png') ?>" />
            </div>
            <h1 class="modal-title fs-5 w-100 text-center" id="titulo1">Agregar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="exampleDataList" class="form-label">Nombre de la bateria:</label>
            <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
            <label for="exampleDataList" class="form-label">Precio Venta:</label>
            <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
            <label for="exampleDataList" class="form-label">Precio Compra</label>
            <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
            <label for="exampleDataList" class="form-label">Cantidad Actual</label>
            <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
            <label for="exampleDataList" class="form-label">Cantidad Vendida</label>
            <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">



          </div>
          <div class="modal-footer" id="botones">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style=" background-color: #161666;">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_Guardar" style=" background-color: #E25050;">Agregar</button>
          </div>
        </div>
      </div>
    </div>
  </form>






  <div class="modal fade" id="usarMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
          <div id="agregar">

          </div>
          <h1 class="modal-title fs-5 w-100 text-center" id="titulo3">Usar Insumo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div style="text-align:center;font-weight:bold;" class="modal-body">
            <img src="<?php echo base_url('/img/activar.png') ?>" class="activar" />
            <p id="activar1">¿Estas seguro de Usar este insumo?</p>
          </div>



        </div>
        <div class="modal-footer" id="botones">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style=" background-color: #161666;">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="btn_Guardar" style=" background-color: #E25050;">Usar</button>
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