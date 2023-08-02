<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- contenedor card -->
<div id="content" class="p-4 p-md-5">
  <div class="contenedorCards">
    <div class="MasBaterias" id="MasBaterias">
      <h2 style="margin-bottom: 20px;"><?= $nombreCategoria ?></h2>
    </div>

    <div class="contenedor-d">
      <div class="contenedorD2">
        <?php if (empty($data)) { ?>
          <abbr>No se encuentra insumos - <?= $nombreCategoria ?></abbr>
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
                  <input href="#" onclick="detallesMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/MasDetallesW.png" width="30" height="30" title="Mas detalles del insumo"></input>
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
    <a href="<?php echo base_url('/insumos'); ?>" class="btn btnRedireccion" id="Regresar" data-bs-target="#materialesModal"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20">Regresar</a>
  </div>
</div>

<!-- modal agregar -->

<form id="formularioAgregar" autocomplete="off">
  <input class="form-control" id="id" name="id" type="text" value="0" hidden>
  <input type="text" value="<?= $idCate ?>" id="idCategoria" hidden>

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
              <label for="exampleDataList" class="col-form-label">Nombre: <i style="color:crimson">*</i></label>
              <input class="form-control" id="nombre" name="nombre" >
              <small id="msgAgregar" class="invalido2"></small>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Compra: <i style="color:crimson">*</i></label>
              <input class="form-control" type="text" id="precioC" name="precioC" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/,'')">
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Venta: <i style="color:crimson">*</i></label>
              <input class="form-control" type="text" id="precioV" name="precioV" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/,'')">
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Cantidad Ingresada: <i style="color:crimson">*</i></label>
              <input class="form-control" type="text" id="cantidadA" name="cantidadA" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/,'')">
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Estante: <i style="color:crimson">*</i></label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="estante" id="estante1">
                <option selected value="">--Seleccione--</option>
                <?php foreach ($estanteria as $data) { ?>
                  <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Fila: <i style="color:crimson">*</i></label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="fila" id="fila1">
                <option selected value="">--Seleccione--</option>


              </select>
            </div>
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
</form>


<!-- Modal Detalles- Editar-->
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
            <label for="exampleDataList" class="col-form-label">Nombre insumo:</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" onInput="validarInput()" placeholder="" disabled>
            <small id="msgEditar" class="invalido3"></small>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Precio de Venta:</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">$</span>
              <input class="form-control" type="number" id="precioVenta" name="precioVenta" disabled>
            </div>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Precio de Compra:</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">$</span>
              <input class="form-control" type="number" id="precioCompra" name="precioCompra" disabled>
            </div>
          </div>

          <div class="mb-3" style="width: 90%;">
            <label for="exampleDataList" class="col-form-label">Cantidad Vendida:</label>
            <input type="text" class="form-control" id="cantidadVendida" name="cantidadVendida" style="margin-left: 15px;" placeholder="" disabled>
          </div>
        </div>

        <div class="d-flex column-gap-3" style="width: 90%">

          <div class="mb-3" style="width: 80%;">
            <label for="exampleDataList" class="col-form-label">Cantidad Actual:</label>
            <input type="text" class="form-control" id="cantidadActual" name="cantidadActual" placeholder="" disabled>
          </div>

          <div class="mb-3" style="width: 80%;">
            <label for="exampleDataList" class="col-form-label">Estante:</label>
            <input type="text" class="form-control" id="estante" name="estante" placeholder="" disabled>
          </div>
          <div class="mb-3" style="width: 80%;">
            <label for="exampleDataList" class="col-form-label">Fila:</label>
            <input type="text" class="form-control" id="fila" name="fila" placeholder="" disabled>
          </div>
        </div>

      </div>

      <div class="modal-footer" id="modalFooterD">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" onclick="limpiarCampos()" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
        <!-- <button type="button" class="btn btnEditar" id="btnEditar" onclick="habilitar()">Editar</button> -->



      </div>

    </div>
  </div>
</div>

<!-- Codigo javascript -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var validUsar = true

  var validAgregar = true
  var validEditar = true

  // vaciar campos

  function limpiarCampos() {

    $("#nombre1").val('');
    $("#nombre").val('');
    $("#precioC").val('');

    $("#precioV").val('');
    $("#cantidadA").val('');

    $("#precioVenta").val('');
    $("#precioCompra").val('');
    $("#cantidadVendida").val('');
    $("#cantidadActual").val('');

    $("#cantidadUsar").val('');
    $("#fila").val('');
    $("#estante1").val('');
    $("#fila1").val('aaaa');
    $("#subtotal").val('');
    $("#trabajadores").val('--Seleccione--');
    $("#ordenes").val('--Seleccione--');


    $('#msgUsar').text('')
    $('#msgAgregar').text('')
    $("#imagenDetalle").attr('src', '<?php echo base_url('/img/masDetalles.png') ?>');


  }


  $('#estante1').on("change", function(e) {
    estante = $('#estante1').val()
    $.ajax({
      url: '<?php echo base_url('insumos/obtenerFilasInsumos/') ?>' + estante,
      type: 'POST',
      dataType: 'json',
      success: function(res) {
        console.log(res)

        var cadena
        cadena = `<option value="" selected>-- Seleccione--</option>`
        for (let i = 0; i < res.length; i++) {

          cadena += `<option value=${res[i].id_fila}>${res[i].nombre}</option>`
        }
        $('#fila1').html(cadena)
      }
    })
  })

  // funcion traer detalles del material


  function detallesMaterial(id_material) {

    $('#btnUsar1').attr('onclick', `usarMaterial(${id_material},2)`)

    dataURL = "<?php echo base_url('/materiales/detallesMaterial'); ?>" + "/" + id_material;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {
        console.log(rs)
        $("#titulo").text('Detalles');
        $("#idMaterial").val(rs[0]['id_material']);
        $("#nombre1").val(rs[0]['nombre']);
        $("#precioVenta").val(rs[0]['precio_venta']);
        $("#precioCompra").val(rs[0]['precio_compra']);
        $("#cantidadVendida").val(rs[0]['cantidad_vendida']);
        $("#cantidadActual").val(rs[0]['cantidad_actual']);
        $("#estante").val(rs[0]['nombreEstante']);
        $("#fila").val(rs[0]['filaNombre']);


        precioVenta.style.background = '#e9ecef';
        nombre1.style.background = '#e9ecef';
        precioCompra.style.background = '#e9ecef';
        cantidadActual.style.background = '#e9ecef';
        estante.style.background = '#e9ecef';
        fila.style.background = '#e9ecef';



      }

    })
  }

  function validarInput() {
    document.getElementById("btnValidar").disabled = !document.getElementById("cantidadUsar").value.length;


  }



  // formulario agregar 
  $("#formularioAgregar").on("submit", function(e) {
    e.preventDefault()
    idMaterial = $("#idMaterial").val()
    nombre = $("#nombre").val()
    precioCompra = $("#precioC").val()
    precioVenta = $("#precioV").val()
    cantidadActual = $("#cantidadA").val()
    idCategoria = $("#idCategoria").val()
    fila = $("#fila1").val()
    estante = $("#estante1").val()
    if ([nombre, precioCompra, cantidadActual, fila, estante, precioVenta].includes("")) {
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
        precioCompra: precioCompra,
        precioVenta: precioVenta,
        cantidadActual: cantidadActual,
        tipoMaterial: 9,
        idCategoria: idCategoria,
        estante,
        fila: fila
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
  var validarInput;

  //Valor para el nombre si es valido o invalido
  $('#nombre').on('input', function(e) {
    nombre = $('#nombre').val()
    tp = $('#tp').val()
    id_material = $('#id').val()
    if (tp == 1 && id_material == 0) {
      buscarInsumoNom(0, nombre)
    } else if (tp == 2 && id_material != 0) {
      $.ajax({
        type: 'POST',
        url: "<?php echo base_url('srchIns/') ?>" + id_material + "/" + nombre,
        dataType: 'JSON',
        success: function(res) {
          if (res.nombre == nombre) {
            $('#msgAgregar').text('')
            validAgregar = true
          } else {
            buscarInsumoNom(0, nombre)
          }
        }
      })
    }
  })

  // Validacion de nombre del insumo

  function buscarInsumoNom(id_material, nombre) {
    $.ajax({
      type: 'POST',
      url: "<?php echo base_url('srchIns/') ?>" + id_material + "/" + nombre,
      dataType: 'JSON',
      success: function(res) {
        if (res == null) {
          $('#msgAgregar').text('')
          $("#btnAgregar").removeAttr('disabled', '');
          validAgregar = true
        } else if (res != null) {
          $('#msgAgregar').text('*Este insumo ya existe*')
          $("#btnAgregar").attr('disabled', '');
          validAgregar = false
        }
      }
    })


  }
  // funcion de actualizar

  function actualizar() {
    id = $("#id").val()
    nombre = $("#nombre1").val()
    precioCompra = $("#precioCompra").val()
    cantidadVendida = $("#cantidadVendida").val()
    precioVenta = $("#precioVenta").val()
    estante = $("#estante").val()
    fila = $("#fila").val()
    cantidadActual = $("#cantidadActual").val()
    idCategoria = $("#idCategoria").val()
    if ([nombre, precioCompra, cantidadActual, cantidadVendida, estante, fila, precioVenta].includes("")) {
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
          estante: estante,
          fila: fila,
          tipoMaterial: 9,
          idCategoria: idCategoria
        },
        success: function(e) {
          $("#id").val(0)
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
</script>