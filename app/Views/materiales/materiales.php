<link rel="stylesheet" href="css/materiales.css">
<script src="jquery-3.6.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<div id="content" class="p-4 p-md-5">
  <div class="MasBaterias" id="MasBaterias">
    <img src="<?php echo base_url('/img/baterias.png') ?>" id="imagenBateria" />
    <h5><?php echo $data[0]['nombre_categoria'] ?></h5>

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
            <input href="#" onclick="detallesMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/detalles.png" width="30" height="30" title="Mas detalles del insumo" id="btnUsar"></input>
            <input href="#" onclick="usarMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#usarMaterialModal" type="image" src="<?php echo base_url(); ?>/img/usarM.png" width="30" height="30" title="Usar insumo"></input>
          </div>
        </div>

      </div>
    <?php } ?>
  </div>
  <div class="footer-page">
    <button href="<?php echo base_url('/principal'); ?>" class="btn btnRedireccion" id="Regresar">Regresar</button>
    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#materialesModal" onclick="seleccionarMaterial(<?php echo 1 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
  </div>
</div>

</html>

<!-- MODAL AGREGAR -->
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
        <div class="modal-footer" id="modal-footer">
          <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btnAccionF">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- Modal -->

<div class="modal" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="modal-content">

      <div class="modal-header" id="modal-header">
        <div class="header2">
          <img src="<?php echo base_url('/img/masDetalles.png') ?>" class="detalles" />
          <h5 class="modal-title text-center" id="exampleModalLabel">Detalles</h5>
        </div>

        <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body" id="modal-body">


        <div class="campos">

          <label for="exampleDataList" class="form-label">Precio de Venta</label>
          <input type="text" class="form-control" list="datalistOptions" id="precioVenta" name="precioVenta" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Precio de Compra</label>
          <input type="text" class="form-control" list="datalistOptions" id="precioCompra" name="precioCompra" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Cantidad Vendida</label>
          <input type="text" class="form-control" list="datalistOptions" id="cantidadVendida" name="cantidadVendida" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Cantidad Actual</label>
          <input type="text" class="form-control" list="datalistOptions" id="cantidadActual" name="cantidadActual" placeholder="" disabled>
        </div>

      </div>

      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#usarMaterial">Usar</button>
      </div>
    </div>
  </div>
</div>



<!-- MODAL USAR -->

<div class="modal" id="usarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header" id="modal-header">
        <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
        <<h1 class="modal-title fs-5 w-100 text-center" id="titulo3">Usar Insumo</h1>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detallesModal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <label for="exampleDataList" class="form-label">Nombre de la bateria:</label>
          <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
          <label for="exampleDataList" class="form-label">Cantidad a Usar</label>
          <input class="form-control" list="datalistOptions" id="cantidad" name="cantidad" placeholder="">
        </div>
      </div>
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
        <button type="button" class="btn btnAccionF">Usar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL USAR -->

<div class="modal fade" id="usarMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header" id="modal-header">
        <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
        <<h1 class="modal-title fs-5 w-100 text-center" id="titulo3">Usar Insumo</h1>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detallesModal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <label for="exampleDataList" class="form-label">Nombre de la bateria:</label>
          <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
          <label for="exampleDataList" class="form-label">Cantidad a Usar</label>
          <input class="form-control" list="datalistOptions" id="cantidad" name="cantidad" placeholder="">
        </div>
      </div>
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btnAccionF">Usar</button>
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
        $("#titulo").text('');
        $("#precioVenta").val(rs[0]['precio_venta']);
        $("#precioCompra").val(rs[0]['precio_compra']);
        $("#cantidadVendida").val(rs[0]['cantidad_vendida']);
        $("#cantidadActual").val(rs[0]['cantidad_actual']);
        $("#detallesModal").modal("show");
      }
    })
  }

  //   $('#btnCerrar').click( function() {
  //     $("#detallesModal").modal("hide");
  //     detallesMaterial(2)
  // console.log('click');
  //   })
</script>