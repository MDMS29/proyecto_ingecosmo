<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">
<div id="content" class="p-4 p-md-5">
  <div class="contenedorCards">
    <div class="masBaterias" id="masBaterias">
      <h2 style="margin-bottom: 20px;"> Bodega <?= $nombreBodega ?></h2>
    </div>

    <div class="contenedor-d">
      <div class="contenedorD2">
        <?php if (empty($data)) { ?>
          <p>No se encuentra repuestos - Bodega <?= $nombreBodega ?></p>
        <?php } else { ?>
          <?php foreach ($data as $dato) { ?>
            <div class="card">

              <div class="contenido1">
                <img src="<?php echo base_url('/img/') . $icono ?>" class="baterias" />
                <h5 class="card-title" id="nombreCard"><?php echo $dato['nombre']; ?></h5>
              </div>
              <br>
              <br>

              <div class="contenido2">
                <div class="Imagenes">
                  <input href="#" onclick="detallesMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/MasDetallesW.png" width="30" height="30" title="Mas detalles del repuesto" id="btnUsar"></input>

                  <input href="#" onclick="usarMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#usarMaterial" type="image" src="<?php echo base_url(); ?>/img/grifo.png" width="30" height="30" title="usar repuestos"></input>
                </div>
              </div>

            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="footer-page">
    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#materialesModal" onclick="agregar(0, 1)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20">
      Agregar</button>

    <a href="<?php echo base_url('/repuestos'); ?>" class="btn btnRedireccion" id="Regresar" data-bs-target="#materialesModal"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20">Regresar</a>
  </div>
</div>

<!-- MODAL AGREGAR -->
<form id="formularioAgregar" autocomplete="off">
  <input class="form-control" id="id" name="id" type="text" value="0" hidden>
  <!-- <input type="text" value="< ?= $idCate ?>" id="idCategoria" hidden> -->

  <input type="text" name="id" id="id" hidden>
  <input type="text" name="tp" id="tp" hidden>

  <div class="modal fade" id="materialesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content" id="modalContent">

        <div class="modal-header flex justify-content-between align-items-center w-100">
          <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
          <div class="d-flex align-items-center justify-content-center" style="width:auto;">
            <img src="<?= base_url('img/botonAgregar.png') ?>" width="30" height="30" style="margin-right: 5px;" />
            <h1 class="modal-title fs-5 text-center" id="tituloModal" style="font-family: Nunito;">Agregar
            </h1>
          </div>
          <button type="button" class="btn" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close">X</button>

        </div>

        <div class="modal-body" id="modalAgregar2">

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Nombre: <i style="color:crimson">*</i></label>
              <input class="form-control" id="nombre" name="nombre">
              <small id="msgAgregar" class="invalido2"></small>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Proveedor: <i style="color:crimson">*</i></label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="proveedor" id="proveedor">
                <option selected value="">--Seleccione--</option>
                <?php foreach ($proveedores as $data) { ?>
                  <option value="<?= $data['id_tercero'] ?>"><?= $data['razon_social'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Cantidad: <i style="color:crimson">*</i></label>
              <input class="form-control" type="text" id="cantidad" name="cantidad" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/,'')">
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Orden de trabajo: <i style="color:crimson">*</i></label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="ordenTrabajo" id="ordenTrabajo">
                <option selected value="">--Seleccione--</option>
                <?php foreach ($ordenes as $data) { ?>
                  <option value="<?= $data['id_orden'] ?>"><?= $data['n_orden'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Placa:</label>
              <input class="form-control" type="text" id="placa" name="placa" placeholder="" disabled>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Bodega:</label>
              <input class="form-control" name="bodega" id="bodega" disabled value="<?= $nomEstante ?>">

              <!-- <select style="background-color:#ECEAEA;" class="form-select form-select" name="bodega" id="bodega">
                <option selected value="">--Seleccione--</option>
                < ?php foreach ($estanteria as $data) { ?>
                  <option value="< ?= $data['id'] ?>">< ?= $data['nombre'] ?></option>
                < ?php } ?>
              </select> -->
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 49%;">
              <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:17px; font-weight: 600;">Sección <i style="color:crimson">*</i></label>
              <select style="background-color:#ECEAEA;" id="seccion" class="form-select" name="seccion">
                <option value="" selected>-- Seleccione --</option>
                <?php foreach ($filas as $fila) { ?>
                  <option id="<?php echo $fila['id_fila']; ?>F" value=<?php echo $fila['id_fila']; ?>> <?php echo $fila['nombre']; ?></option>
                <?php } ?>
              </select>
              <input hidden id="tp" name="tp">
              <input hidden id="id" name="id">
            </div>
          </div>

          <div class="modal-footer" id="modalFooter">
            <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
            <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btnAccionF" id="btnAgregar">Agregar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- MODAL DETALLES -->
<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>

    <div class="modal-content" style="border: 5px solid #161666;">

      <div class="modal-header flex justify-content-between align-items-center w-100">
        <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
          <img src="<?= base_url('img/MasDetalles2.png') ?>" width="30" height="30" style="margin-right: 5px;" />
          <h1 class="modal-title fs-5 text-center" id="tituloModal">Detalles</h1>
        </div>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>

      <div class="modal-body w-100">

        <div class="d-flex column-gap-3" style="width: 100%">
          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="" disabled>
            <small id="msgEditar" class="invalido3"></small>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Proveedor:</label>
            <div class="input-group mb-3">

              <input class="form-control" type="text" id="proveedor1" name="proveedor1" disabled>
            </div>
          </div>
        </div>

        <div class="d-flex column-gap-3" style="width: 100%">
          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Cantidad:</label>
            <div class="input-group mb-3">
              <input class="form-control" type="number" id="cantidad1" name="Cantidad" disabled>
            </div>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Orden de trabajo:</label>
            <input type="text" class="form-control" id="ordenTrabajo1" name="ordenTrabajo" placeholder="" disabled>
          </div>
        </div>


        <div class="d-flex column-gap-3" style="width: 100%">

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Placa:</label>
            <input type="text" class="form-control" id="placa1" name="placa" placeholder="" disabled>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Bodega:</label>
            <input type="text" class="form-control" id="bodega1" name="bodega" placeholder="" disabled>
          </div>
        </div>

        <div class="d-flex column-gap-3" style="width: 100%">
        <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Sección:</label>
            <input type="text" class="form-control" id="seccion1" name="seccion" placeholder="" disabled>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" onclick="limpiarCampos()" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
          <!-- <button type="button" class="btn btnEditar" id="btnEditar" onclick="habilitar()">Editar</button> -->
          <button type="button" class="btn btnAccionF" id="btnUsar1" data-bs-toggle="modal" data-bs-target="#usarMaterial">Usar</button>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- MODAL USAR-->
<div class="modal fade" id="usarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form id="formularioUsar" autocomplete="off">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

      <div class="modal-content" id="modalContentUsar">

        <div class="modal-header flex justify-content-between align-items-center w-100">
          <input type="text" name="idMaterial" id="idMaterial" hidden>
          <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
          <div class="d-flex align-items-center justify-content-center" style="width:auto;">
            <img src="<?= base_url('img/usarlogo.png') ?>" width="30" height="30" style="margin-right: 5px;" />
            <h1 class="modal-title fs-5 text-center" id="tituloModal">Usar Repuesto</h1>
          </div>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>


        <div class="modal-body" id="modalBodyUsar">
          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 100%">

              <!-- <label for="exampleDataList" class="col-form-label">Orden de Servicio:</label> -->

              <!-- <select style="background-color:#ECEAEA;" class="form-select form-select" name="ordenes" id="ordenes">
                <option selected="">--Seleccione--</option>
                < ?php foreach ($ordenes as $data) { ?>
                  <option value="< ?= $data['id_orden'] ?>">< ?= $data['n_orden'] ?></option>
                < ?php } ?>
              </select> -->
            </div>

            <div class="mb-3" style="width: 100%">
              <!-- <label for="exampleDataList" class="col-form-label">Trabajadores:</label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="trabajadores" id="trabajadores">
                <option selected="">--Seleccione--</option>
                < ?php foreach ($trabajadores as $data) { ?>
                  <option value="< ?= $data['id_trabajador'] ?>">< ?= $data['nombre'] ?></option>
                < ?php } ?>

              </select> -->
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 50%">
              <label for="exampleDataList" class="col-form-label">Nombre del repuesto:</label>
              <input class="form-control" id="nombreRepuesto" name="nomRepuesto" placeholder="" disabled>
            </div>

            <div class="mb-3" style="width: 50%">
              <label for="exampleDataList" class="col-form-label">Proveedor:</label>
              <input class="form-control" id="proveedor2" name="proveedor" placeholder="" disabled>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">

            <div class="mb-3" style="width: 50%;">
              <label for="exampleDataList" class="col-form-label">Orden de trabajo:</label>
              <div class="input-group mb-3">
                <input class="form-control" type="text" id="ordenTrabajo2" name="ordenTrabajo" disabled>
              </div>
            </div>

            <div class="mb-3" style="width: 50%;">
              <label for="exampleDataList" class="col-form-label">Placa:</label>
              <div class="input-group mb-3">
                <input class="form-control" type="text" id="placa2" name="placa" disabled>
              </div>
            </div>

          </div>

          <div class="d-flex column-gap-3" style="width: 100%">

            <div class="mb-3" style="width: 50%">
              <label for="exampleDataList" class="col-form-label">Cantidad existente:</label>
              <div>
                <input type="number" class="form-control" id="cantidadExistente" name="cantidadExistente" onInput="validarInput()" placeholder="" disabled>
              </div>
            </div>

            <div class="mb-3" style="width: 50%">
              <label for="exampleDataList" class="col-form-label">Cantidad a Usar: <i style="color:crimson">*</i></label>
              <div>
                <input type="text" class="form-control" id="cantidadUsar" name="cantidadUsar" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/,'')">
                <small id="msgUsar" class="invalido"></small>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
          <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btnAccionF" id="btnValidar"><img src="<?= base_url('img/orden-entrega.png') ?>" alt="icon-plus" width="20">Agregar a
            orden</button>


        </div>
      </div>
    </div>
  </form>
</div>

<script>
  function limpiarCampos() {

    $("#nombre1").val('');
    $("#nombre").val('');
    $("#proveedor").val('');
    $("#cantidad").val('');
    $("#ordenTrabajo").val('');
    $("#placa").val('');
    $("#seccion").val('');


    $("#cantidadUsar").val('');
    $('#msgUsar').text('')
    $('#msgAgregar').text('')
    $("#imagenDetalle").attr('src', '<?php echo base_url('/img/masDetalles.png') ?>');
  }



  $('#ordenTrabajo').on('change', function(e) {
    id = $('#ordenTrabajo').val()
    $.ajax({
      url: "<?= base_url('ordenServicio/buscarOrden') ?>",
      type: 'POST',
      data: {
        id
      },
      success: function(data) {
        data = JSON.parse(data)
        $('#placa').val(data['placa'])

      }
    })
  })


  // formulario agregar 
  $("#formularioAgregar").on("submit", function(e) {
    e.preventDefault()
    idMaterial = $("#idMaterial").val()
    nombre = $("#nombre").val()
    proveedor = $("#proveedor").val()
    cantidad = $("#cantidad").val()
    ordenTrabajo = $("#ordenTrabajo").val()
    placa = $("#placa").val()
    seccion = $("#seccion").val()
    idCategoria = $("#idCategoria").val()
    if ([nombre, proveedor, cantidad, ordenTrabajo, placa, bodega, seccion].includes("")) {
      return Swal.fire({
        position: "center",
        icon: "error",
        text: "¡Campos Vacios!",
        showConfirmButton: false,
        timer: 1000
      })
    }
    $.post({
      url: '<?php echo base_url('repuestos/insertar') ?>',
      data: {
        idMaterial,
        nombre: nombre,
        proveedor: proveedor,
        cantidad: cantidad,
        ordenTrabajo: ordenTrabajo,
        tipoMaterial: 10,
        idCategoria: idCategoria,
        placa: placa,
        seccion: seccion,
        bodega: "<?= $idBodega ?>"
      },
      success: function(res) {
        if (res == 1) {
          mostrarMensaje('success', '¡Se agrego material!');
          $("#id").val(0)
          setTimeout(() => {
            window.location.reload()
          }, 1000);
        } else {
          return mostrarMensaje('error', '¡No se pudo agregar el material!');
        }

      }
    })

  })

  function agregar(id, tp) {
    $('#tp').val(tp)

  }

  function detallesMaterial(id_material) {
    $('#btnUsar1').attr('onclick', `usarMaterial(${id_material},2)`)

    dataURL = "<?php echo base_url('/materiales/detallesRepuesto'); ?>" + "/" + id_material;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {
        console.log(rs)
        $('#detallesModal').modal('show')
        $("#titulo").text('Detalles');
        $("#idMaterial").val(rs[0]['id_material']);
        $("#nombre1").val(rs[0]['nombre']);
        $("#proveedor1").val(rs[0]['nomProveedor']);
        $("#cantidad1").val(Number(rs[0]['cantidad_actual']));
        $("#ordenTrabajo1").val(rs[0]['numOrden']);
        $("#placa1").val(rs[0]['placaVeh']);
        $("#bodega1").val(rs[0]['bodega']);
        $("#seccion1").val(rs[0]['nomSeccion']);
      }
    })
  }

  function usarMaterial(id_material) {
    dataURL = "<?php echo base_url('/materiales/usarRepuesto'); ?>" + "/" + id_material;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {
        $("#idMaterial").val(rs[0]['id_material']);
        $("#nombreRepuesto").val(rs[0]['nombre']);
        $("#proveedor2").val(rs[0]['nomProveedor']);
        $("#ordenTrabajo2").val(rs[0]['numOrden']);
        $("#placa2").val(rs[0]['placaVeh']);
        $("#cantidadExistente").val(rs[0]['cantidad_actual']);
      }
    })
  }


  // operaciones con el input usar
  $('#cantidadUsar').on('input', function(e) {
    idMaterial = $("#idMaterial").val()
    cantidad = $('#cantidadUsar').val()
    cantidadExistente = $('#cantidadExistente').val()
    if (parseInt(cantidad) > parseInt(cantidadExistente)) {
      $('#msgUsar').text(' *Valor invalido*')
      $("#btnValidar").attr('disabled', '');
      validUsar = false
      // $('#subtotal').val(0)
    } else {
      $('#msgUsar').text('')
      validUsar = true
      // $('#subtotal').val(cantidad * valorVenta)
    }
  })



  // formulario usar

  $("#formularioUsar").on("submit", function(e) {
    e.preventDefault()

    idMaterial = $("#idMaterial").val()
    cantidadExistente = $("#cantidadExistente").val()
    cantidad = $("#cantidadUsar").val()
    ordenTrabajo = $("#ordenTrabajo").val()
    placa = $("#placa").val()
    idCategoria = $("#idCategoria").val()

    if ([cantidad].includes("")) {
      return mostrarMensaje('error', '¡Campos Vacios!')
    }

    console.log(idMaterial)
    obj = {
      idMaterial,
      cantidadExistente,
      cantidad,
      placa,
      ordenTrabajo
    }
    console.table(obj);

    $.ajax({
      type: 'POST',
      url: "<?php echo base_url('repuestos/usar') ?>",
      data: {
        idMaterial,
        cantidadExistente,
        cantidad,
        placa,
        ordenTrabajo
      },
      dataType: "json",
      success: function(data) {
        if (data == 1) {
          mostrarMensaje('success', '¡Repuesto usado con exito!')
          setTimeout(() => {
            window.location.reload();
          }, 2000)
        } else {
          return mostrarMensaje('error', '¡Ha ocurrido un error!')
        }
      }
    });


  })
</script>