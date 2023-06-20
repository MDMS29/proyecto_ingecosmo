<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">
<div id="content" class="p-4 p-md-5">

  <div class="MasBaterias" id="MasBaterias">
    <h5 class="titulo"> Bodega <?= $nombreBodega ?></h5>
  </div>

  <div class="contenedor-d">
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

  <div class="footer-page">
    <a href="<?php echo base_url('/repuestos'); ?>" class="btn btnRedireccion" id="Regresar" data-bs-target="#materialesModal"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20">Regresar</a>
    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#materialesModal" onclick="agregar(0, 1)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
  </div>
</div>

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
            <h1 class="modal-title fs-5 text-center" id="tituloModal" style="font-family: Nunito;">Agregar</h1>
          </div>
          <button type="button" class="btn" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close">X</button>

        </div>

        <div class="modal-body" id="modalAgregar2">

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Nombre:</label>
              <input class="form-control" id="nombre" name="nombre" placeholder="">
              <small id="msgAgregar" class="invalido2"></small>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Proveedor:</label>
              <input class="form-control" type="number" id="Proveedor" name="Proveedor" placeholder="">
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Cantidad:</label>
              <input class="form-control" type="number" id="Cantidad" name="Cantidad" placeholder="">
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Orden de trabajo:</label>
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
              <input class="form-control" type="number" id="placa" name="placa" placeholder="">
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Bodega:</label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="Bodega" id="Bodega">
                <option selected value="">--Seleccione--</option>
                <?php foreach ($estanteria as $data) { ?>
                  <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="modal-footer" id="modalFooter">
            <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btnAccionF" id="btnAgregar">Agregar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>

    <div class="modal-content" id="modalContentD">

      <div class="modal-header flex justify-content-between align-items-center w-100">
        <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
          <img src="<?= base_url('img/MasDetalles2.png') ?>" width="30" height="30" style="margin-right: 5px;" />
          <h1 class="modal-title fs-5 text-center" id="tituloModal">Detalles</h1>
        </div>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>

      <div class="modal-body w-100" id="modalBodyD">
        
        <div class="d-flex column-gap-3" style="width: 100%">
          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" onInput="validarInput()" placeholder="" disabled>
            <small id="msgEditar" class="invalido3"></small>
          </div>
          
          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Proveedor:</label>
            <div class="input-group mb-3">
              
              <input class="form-control" type="number" id="Proveedor" name="Proveedor" disabled>
            </div>
          </div>
        </div>

        <div class="d-flex column-gap-3" style="width: 100%">
          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Cantidad:</label>
            <div class="input-group mb-3">
              <input class="form-control" type="number" id="Cantidad" name="Cantidad" disabled>
            </div>
          </div>
          
          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Orden de trabajo:</label>
            <input type="text" class="form-control" id="ordenTrabajo" name="ordenTrabajo"  placeholder="" disabled>
          </div>
        </div>
        

        <div class="d-flex column-gap-3" style="width: 100%">

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Placa:</label>
            <input type="text" class="form-control" id="placa" name="placa" placeholder="" disabled>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Bodega:</label>
            <input type="text" class="form-control" id="bodega" name="bodega" placeholder="" disabled>
          </div>
        </div>

        <div class="modal-footer" id="modalFooterD">
          <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" onclick="limpiarCampos()" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
          <!-- <button type="button" class="btn btnEditar" id="btnEditar" onclick="habilitar()">Editar</button> -->
          <button type="button" class="btn btnAccionF" id="btnUsar1" data-bs-toggle="modal" data-bs-target="#usarMaterial">Usar</button>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Modal usar-->
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
              <input class="form-control" id="nombreRepuesto" name="nombreRepuesto" placeholder="" disabled>
            </div>

            <div class="mb-3" style="width: 50%">
              <label for="exampleDataList" class="col-form-label">Proveedor:</label>
              <input class="form-control" id="Proveedor" name="Proveedor" placeholder="" disabled>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">

            <div class="mb-3" style="width: 50%;">
              <label for="exampleDataList" class="col-form-label">Placa:</label>
              <div class="input-group mb-3">
                <input class="form-control" type="number" id="Placa" name="Placa" disabled>
              </div>
            </div>

            <div class="mb-3" style="width: 50%">
              <label for="exampleDataList" class="col-form-label">Cantidad existente:</label>
              <div>
                <input type="number" class="form-control" id="cantidadExistente" name="cantidadExistente" onInput="validarInput()" placeholder="">
                <small id="msgUsar" class="invalido"></small>
              </div>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 50%">

          <div class="mb-3" style="width: 97%">
              <label for="exampleDataList" class="col-form-label">Cantidad a Usar:</label>
              <div>
                <input type="number" class="form-control" id="cantidadUsar" name="cantidadUsar" onInput="validarInput()" placeholder="">
                <small id="msgUsar" class="invalido"></small>
              </div>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btnAccionF" id="btnValidar"><img src="<?= base_url('img/orden-entrega.png') ?>" alt="icon-plus" width="20">Agregar a orden</button>


        </div>
      </div>
    </div>
  </form>
</div>

<script>
  function limpiarCampos() {

    $("#nombre1").val('');
    $("#nombre").val('');
  }

  function agregar(id, tp) {
    $('#tp').val(tp)
  }


    // formulario agregar 
    $("#formularioAgregar").on("submit", function(e) {
    e.preventDefault()
    idMaterial = $("#idMaterial").val()
    nombre = $("#nombre").val()
    proveedor = $("#proveedor").val()
    cantidad = $("#cantidad").val()
    ordenTrabajo = $("#ordenTrabajo").val()
    placa = $("#placa").val()
    bodega = $("#bodega").val()
    idCategoria = $("#idCategoria").val()
    if ([nombre, proveedor, cantidadActual, ordenTrabajo, placa, bodega].includes("")) {
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
        idMaterial: id_material,
        nombre: nombre,
        proveedor: proveedor,
        cantidad: cantidad,
        ordenTrabajo: ordenTrabajo,
        tipoMaterial: 10,
        idCategoria: idCategoria,
        placa: placa,
        bodega: bodega
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
</script>