<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div id="content" class="p-4 p-md-5">
  <div class="MasBaterias" id="MasBaterias">
    <h5 class="titulo"><?= $nombreCategoria ?></h5>
  </div>

  <div class="contenedor-d">
    <?php if (empty($data)) { ?>
      <p>No se encuentra insumos - <?= $nombreCategoria ?></p>
    <?php } else { ?>
      <?php foreach ($data as $dato) { ?>

        <div class="card">

          <div class="contenido1">
            <img src="<?php echo base_url('/img/') . $icono ?>" class="baterias" />
            <h5 class="card-title"><?php echo $dato['nombre']; ?></h5>
          </div>
          <br>
          <br>

          <div class="contenido2">
            <div class="Imagenes">
              <input href="#" onclick="detallesMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/detalles.png" width="30" height="30" title="Mas detalles del insumo" id="btnUsar"></input>
              <input href="#" onclick="usarMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#usarMaterial" type="image" src="<?php echo base_url(); ?>/img/usarM.png" width="30" height="30" title="Usar insumo"></input>
            </div>
          </div>

        </div>
      <?php } ?>
    <?php } ?>
  </div>

  <div class="footer-page">
    <a href="<?php echo base_url('/insumos'); ?>" class="btn btnRedireccion" id="Regresar">Regresar</a>
    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#materialesModal" onclick="agregarMaterial(<?php echo 1 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
  </div>
</div>

<input class="form-control" id="id" name="id" type="text" hidden>
<input type="text" value="<?= $idCate ?>" id="idCategoria" hidden>
<!-- MODAL AGREGAR -->
<form id="formularioAgregar" autocomplete="off">
  <div class="modal fade" id="materialesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modalContent" style="border: 5px solid #161666;  border-radius: 10px;">
        <div class="modal-header" id="modalHeader">
          <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
          <div id="agregar">
            <img style="margin-right: 10px; width:30px;" src="http://localhost/ingecosmo/public/icons/plus-b.png" alt="icon-plus" width="20">
          </div>
          <h1 class="modal-title" id="titulo1">Agregar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalAgregar2">

          <div class="camposAgregar">
            <label for="exampleDataList" class="form-label">Nombre:</label>
            <input class="form-control" list="datalistOptions" id="nombre" name="nombre" placeholder="">
          </div>

          <div class="camposAgregar">
            <label for="exampleDataList" class="form-label">Precio Compra:</label>
            <input class="form-control" type="number" list="datalistOptions" id="precioC" name="precioC" placeholder="">
          </div>

          <div class="camposAgregar">
            <label for="exampleDataList" class="form-label">Precio Venta:</label>
            <input class="form-control" type="number" list="datalistOptions" id="precioV" name="precioV" placeholder="">
          </div>

          <div class="camposAgregar">
            <label for="exampleDataList" class="form-label">Cantidad Actual:</label>
            <input class="form-control" type="number" list="datalistOptions" id="cantidadA" name="cantidadA" placeholder="">
          </div>




        </div>
        <div class="modal-footer" id="modal-footer">
          <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btnAccionF" id="btnAgregar">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- Modal Detalles- Editar-->

<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="modal-content">

      <div class="modal-header" id="modal-header">
        <div class="header2">
          <img src="<?php echo base_url('/img/masDetalles.png') ?>" id="imagenDetalle" class="detalles" />
          <h5 class="modal-title text-center" id="titulo">Detalles</h5>
        </div>

        <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />

        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detallesModal" aria-label="Close">X</button>

      </div>
      <div class="modal-body" id="modal-body">

        <div class="campos">

          <label for="exampleDataList" class="form-label">Nombre insumo:</label>
          <input type="text" class="form-control" list="datalistOptions" id="nombre1" name="nombre" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Precio de Venta:</label>
          <input type="text" class="form-control" list="datalistOptions" id="precioVenta" name="precioVenta" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Precio de Compra:</label>
          <input type="text" class="form-control" id="precioCompra" name="precioCompra" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Cantidad Vendida:</label>
          <input type="text" class="form-control"  id="cantidadVendida" name="cantidadVendida" placeholder="" disabled>
        </div>

        <div class="campos">

          <label for="exampleDataList" class="form-label">Cantidad Actual:</label>
          <input type="text" class="form-control"  id="cantidadActual" name="cantidadActual" placeholder="" disabled>
        </div>

      </div>

      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
        <button type="button" class="btn btnEditar" id="btnEditar" onclick="habilitar()">Editar</button>
        <button type="button" class="btn btnAccionF" id="btnUsar1" data-bs-toggle="modal" data-bs-target="#usarMaterial">Usar</button>

      </div>
    </div>
  </div>
</div>

<!-- MODAL USAR -->

<div class="modal fade" id="usarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="formularioUsar" autocomplete="off">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-lg" id="modalContentUsar">
      <div class="modal-header" id="modalHeaderUsar">
        <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />

        <div class="HEADER">

          <h1 class="modal-title fs-5 w-100 text-center" id="titulo3">Usar Insumo</h1>
          <button type="button" class="btn" data-bs-toggle="modal" aria-label="Close">X</button>
        </div>
      </div>
      <div class="modal-body" id="modalBodyUsar">

        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Nombre del insumo:</label>
          <input class="form-control"  id="nombreInsumo" name="nombreInsumo" placeholder="" disabled>
        </div>

        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Cantidad Existente:</label>
          <input class="form-control"  id="cantidadExistente" name="cantidadExistente" placeholder="" disabled>
        </div>
        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Cantidad a Usar:</label>
          <div>
            <input class="form-control"  id="cantidadUsar" name="cantidadUsar" placeholder="">
            <small id="msgUsar" class="invalido"></small>
          </div>
        </div>
        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Precio de Venta:</label>
          <input class="form-control"  id="PrecioDeVenta" name="PrecioDeVenta" placeholder="" disabled>
        </div>
        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Subtotal:</label>
          <input class="form-control" list="datalistOptions" id="subtotal" name="subtotal" placeholder="" disabled>
        </div>

      </div>
      <div class="modal-footer" id="modalFooter">
        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btnAccionF">Usar</button>
      </div>
    </div>
  </div>
</form>
</div>

<!-- MODAL USAR 2-->
<!-- <div class="modal fade" id="usarMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-lg" style="border: 5px solid #161666;  border-radius: 10px;">
      <div class="modal-header" id="modal-header">
        <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
        <<h1 class="modal-title fs-5 w-100 text-center" id="titulo3">Usar Insumo</h1>
          <button type="button" class="btn" data-bs-toggle="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body" id="modalBodyUsar">

        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Nombre del insumo:</label>
          <input class="form-control" list="datalistOptions" id="nombreI" name="nombre" placeholder="">
        </div>
        <div class="camposUsar">
          <label for="exampleDataList" class="form-label">Cantidad a Usar:</label>
          <input class="form-control" list="datalistOptions" id="cantidadU" name="cantidad" placeholder="">
        </div>

      </div>
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btnAccionF">Usar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

var validUsar = true

  function detallesMaterial(id_material) {
    dataURL = "<?php echo base_url('/materiales/detallesMaterial'); ?>" + "/" + id_material;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {
        $("#titulo").text('Detalles');
        $("#id").val(rs[0]['id_material']);
        $("#nombre1").val(rs[0]['nombre']);
        $("#precioVenta").val(rs[0]['precio_venta']);
        $("#precioCompra").val(rs[0]['precio_compra']);
        $("#cantidadVendida").val(rs[0]['cantidad_vendida']);
        $("#cantidadActual").val(rs[0]['cantidad_actual']);

        $("#nombre1").attr('disabled', '');
        $("#precioVenta").attr('disabled', '');
        $("#precioCompra").attr('disabled', '');
        $("#cantidadVendida").attr('disabled', '');
        $("#cantidadActual").attr('disabled', '');
        $("#btnUsar1").removeAttr('hidden', '');
        $("#detallesModal").modal("show");
        $("#btnEditar").text('Editar');
        $("#btnEditar").attr('onclick', 'habilitar()');


        precioVenta.style.background = '#e9ecef';
        nombre1.style.background = '#e9ecef';
        precioCompra.style.background = '#e9ecef';
        cantidadActual.style.background = '#e9ecef';
        $("#imagenDetalle").attr('src', '<?php echo base_url('/img/masDetalles.png') ?>');

      }
    })
  }

  function usarMaterial(id_material) {
    dataURL = "<?php echo base_url('/materiales/usarMaterial'); ?>" + "/" + id_material;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {
        $("#id").val(rs[0]['id_material']);
        $("#nombreInsumo").val(rs[0]['nombre']);
        $("#cantidadExistente").val(rs[0]['cantidad_actual']);
        $("#PrecioDeVenta").val(rs[0]['precio_venta']);
        $("#cantidadVendida").val(rs[0]['cantidad_vendida']);

      }
    })
  }

  $('#cantidadUsar').on('input', function(e) {
    cantidad = $('#cantidadUsar').val()
    valorVenta = $("#PrecioDeVenta").val()  
    cantidadExistente = $('#cantidadExistente').val()
    if(parseInt(cantidad) > parseInt(cantidadExistente)){
      $('#msgUsar').text(' * Valor invalido * ')
      validUsar = false
    }else{
      $('#msgUsar').text('')
      validUsar = true
      $('#subtotal').val(cantidad * valorVenta)
    }
  })

  

  function habilitar() {

    $("#titulo").text('Editar');
    $("#nombre1").removeAttr('disabled', '');
    $("#precioVenta").removeAttr('disabled', '');
    $("#precioCompra").removeAttr('disabled', '');

    $("#cantidadVendida").removeAttr('hidden', '');
    $("#cantidadActual").removeAttr('disabled', '');
    $("#btnUsar1").attr('hidden', '');
    $("#imagenDetalle").attr('src', '<?php echo base_url('/img/editar.png') ?>');
    $("#btnEditar").text('Actualizar');
    $("#btnEditar").attr('onclick', 'actualizar()');

    precioVenta.style.background = '#F8F9FF';
    nombre1.style.background = '#F8F9FF';
    precioCompra.style.background = '#F8F9FF';
    cantidadActual.style.background = '#F8F9FF';

  }

  function actualizar() {
    id = $("#id").val()
    nombre = $("#nombre1").val()
    precioCompra = $("#precioCompra").val()
    cantidadVendida = $("#cantidadVendida").val()
    precioVenta = $("#precioVenta").val()
    cantidadActual = $("#cantidadActual").val()
    idCategoria = $("#idCategoria").val()
    if ([nombre, precioCompra, cantidadActual, cantidadVendida].includes("")) {
      return Swal.fire({
        position: "center",
        icon: "error",
        text: "¡Campos Vacios!",
        showConfirmButton: false,
        timer: 1000
      })
    } else {
      $.post({
        url: '<?php echo base_url('insumos/actualizar') ?>',
        data: {
          idMaterial: id,
          nombre: nombre,
          precioCompra: precioCompra,
          precioVenta: precioVenta,
          cantidadActual: cantidadActual,
          cantidadVendida: cantidadVendida,
          tipoMaterial: 9,
          idCategoria: idCategoria
        },
        success: function(e) {
          Swal.fire({
            position: "center",
            icon: "success",
            text: 'Se actualizo el material',
            showConfirmButton: false,
            timer: 1000
          })
          setTimeout(() => {
            window.location.reload()
          }, 1000);
        }
      })
    }
  }

  $("#formularioUsar").on("submit", function(e) {
    e.preventDefault()
    nombre = $("#nombreInsumo").val()
    cantidadExistente = $("#cantidadExistente").val()
    cantidadUsar = $("#cantidadUsar").val()
    precioVenta = $("#PrecioDeVenta").val()
    idCategoria = $("#idCategoria").val()
    if ([nombre, cantidadExistente, cantidadUsar, precioVenta].includes("")) {
      return Swal.fire({
        position: "center",
        icon: "error",
        text: "¡Campos Vacios!",
        showConfirmButton: false,
        timer: 1000
      })
    }
    $.post({
      url: '<?php echo base_url('insumos/usar') ?>',
      data: {
        nombre: nombre,
        cantidadExistente: cantidadExistente,
        precioVenta: precioVenta,
        tipoMaterial: 9,
        idCategoria: idCategoria
      },
      success: function(e) {
        Swal.fire({
          position: "center",
          icon: "success",
          text: 'Se ha usado este material con exito',
          showConfirmButton: false,
          timer: 1000
        })
        setTimeout(() => {
          window.location.reload()
        }, 1000);
      }
    })

  })



  $("#formularioAgregar").on("submit", function(e) {
    e.preventDefault()
    nombre = $("#nombre").val()
    precioCompra = $("#precioC").val()
    precioVenta = $("#precioV").val()
    cantidadActual = $("#cantidadA").val()
    idCategoria = $("#idCategoria").val()
    if ([nombre, precioCompra, cantidadActual].includes("")) {
      return Swal.fire({
        position: "center",
        icon: "error",
        text: "¡Campos Vacios!",
        showConfirmButton: false,
        timer: 1000
      })
    }
    $.post({
      url: '<?php echo base_url('insumos/insertar') ?>',
      data: {
        nombre: nombre,
        precioCompra: precioCompra,
        precioVenta: precioVenta,
        cantidadActual: cantidadActual,
        tipoMaterial: 9,
        idCategoria: idCategoria
      },
      success: function(e) {
        Swal.fire({
          position: "center",
          icon: "success",
          text: 'Se agrego material',
          showConfirmButton: false,
          timer: 1000
        })
        setTimeout(() => {
          window.location.reload()
        }, 1000);
      }
    })

  })
</script>