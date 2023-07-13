<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
  <h2 class="text-center mb-4">
    <img style=" width:40px; height:40px; " src="<?php echo base_url('/img/insumos.png') ?>" />Administrar Insumos
  </h2>
  <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
    <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="2">Categoria Insumo</a> - <a class="toggle-vis btn" data-column="4">Cantidad Vendida</a> - <a class="toggle-vis btn" data-column="7">Precio Venta</a> - <a class="toggle-vis btn" data-column="8">Precio Compra</a>
  </div>
  <div class="table-responsive p-2">
    <table class="table table-striped" id="tableInsumosAdmin" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Nombre</th>
          <th scope="col" class="text-center">Categoria Insumo</th>
          <th scope="col" class="text-center">Cantidad Actual</th>
          <th scope="col" class="text-center">Cantidad Vendida</th>
          <th scope="col" class="text-center">Estante </th>
          <th scope="col" class="text-center">Fila</th>
          <th scope="col" class="text-center">Precio Venta</th>
          <th scope="col" class="text-center">Precio Compra</th>
          <th scope="col" class="text-center">Acciones </th>
        </tr>
      </thead>
      <tbody class="text-center">
        <!-- TABLA ADMINSITRAR INSUMO -->

      </tbody>
    </table>
  </div>
  <div class="footer-page">
    <button class="btn btnAccionF " data-bs-toggle="modal" data-bs-target="#agregarInsumo" onclick="seleccionarInsumo(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
    <a href="<?php echo base_url('/insumosAdmin/eliminados'); ?>" class="btn btnRedireccion"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
  </div>
</div>

<!-- AGREGAR O EDITAR INSUMO -->
<form id="formularioInsumo" autocomplete="off">
  <input class="form-control" id="id" name="id" type="text" value="0" hidden>

  <input type="text" name="id" id="id" hidden>
  <input type="text" name="tp" id="tp" hidden>

  <div class="modal fade" id="agregarInsumo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="modalContent">
        <div class="modal-header d-flex align-items-center justify-content-between">
          <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
          <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><img id="imgModal" src=""><span id="tituloModal"><!-- TEXTO DINAMICO--></span> </h1>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>

        <div class="modal-body">
          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Nombre: <i class="asterisco" style="color:crimson;">*</i></label>
              <input class="form-control" id="nombre" name="nombre" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú ]/,'')">
              <input class="form-control" id="nombreHidden" name="nombreHidden" hidden>
              <small id="msgAgregar" class="invalidoInsumo"></small>
            </div>
            <div class="mb-3" style="width: 90%;">
              <label for="categoria" class="col-form-label">Categoria: <i class="asterisco" style="color:crimson;">*</i></label>
              <select class="form-control form-select" name="estante" id="categoria">
                <option selected value="">-- Seleccione --</option>
                <?php foreach ($categorias as $data) { ?>
                  <option value="<?= $data['id_param_det'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 100%;">
              <label for="exampleDataList" class="col-form-label">Cantidad Actual: <i class="asterisco" style="color:crimson;">*</i></label>
              <input class="form-control" type="text" id="cantidadA" name="cantidadA" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/,'')" >
            </div>

            <div class="mb-3" style="width: 100%;">
              <label for="exampleDataList" class="col-form-label">Cantidad Vendida:</label>
              <input class="form-control" type="text" id="cantidadV" name="cantidadV" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/,'')">
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Venta: <i class="asterisco" style="color:crimson;">*</i></label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">$</span>
                <input class="form-control" type="text" id="precioV" name="precioV" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/,'')">
              </div>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Compra: <i class="asterisco" style="color:crimson;">*</i></label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">$</span>
                <input class="form-control" type="text  " id="precioC" name="precioC" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/,'')">
              </div>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Estante: <i class="asterisco" style="color:crimson;">*</i></label>
              <select style=" margin-left: 0px !important;" class="form-control form-select" name="estante" id="estante">
                <option selected value="">-- Seleccione --</option>
                <?php foreach ($estantes as $data) { ?>
                  <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Fila: <i class="asterisco" style="color:crimson;">*</i></label>
              <select style=" margin-left: 0px !important;" class="form-control form-select" name="fila" id="fila">
                <option selected value="">-- Seleccione --</option>

              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer" id="modalFooter">
          <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btnAccionF" id="btnAgregar">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- MODAL RESTOCK DEL MATERIAL -->
<div class="modal fade" id="restockMaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <input type="hidden" name="idMate" id="idMate">
      <div class="modal-header flex justify-content-between align-items-center">
        <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
        <h1 class="modal-title fs-5 text-center ">
          <img src="<?= base_url('img/restock.png') ?>" alt="" width="30" height="30">
          <span id="tituloRestock"><!-- TEXTO DINAMICO  --></span>
        </h1>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos()">X</button>
      </div>
      <div class="modal-body">
        <div class=" column-gap-3" style="width: 100%">
          <div class="mb-3 w-100">
            <label for="cantActu" class="col-form-label">Cantidad Actual :</label>
            <input type="number" class="form-control text-center" id="cantActu" disabled>
          </div>
          <div class="mb-3 w-100">
            <label for="cantRestock" class="col-form-label">Cantidad a Agregar: <i style="color:crimson;">*</i></label>
            <input type="number" class="form-control text-center" id="cantRestock" name="cantRestock">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="limpiarCampos()">Cerrar</button>
        <button type="button" class="btn btnAccionF" id="btnRestock">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Confirmar Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">

    <div class="modal-content" id="modalEliminarContentP">
      <div class="modalContenedorP">
        <div id="contenidoHeaderEliminarP" class="modal-header">
          <img style=" width:100px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
          <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="contenidoEliminarP">
          <div class="bloqueModalP">
            <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
            <p class="textoModalP">¿Estas seguro de eliminar este Insumo?</p>
          </div>
        </div>
      </div>
      <div id="bloqueBtnP" class="modal-footer">
        <button id="btnNo" class="btn btnAccionF " data-dismiss="modal">Cerrar</button>
        <a id="btnSi" class="btn btnRedireccion">Eliminar</a>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  var contador = 0
  var validNom = true
  //Mostrar Ocultar Columnas
  $('a.toggle-vis').on('click', function(e) {
    e.preventDefault();
    // Get the column API object
    var column = tableInsumosAdmin.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
  });
  //Div ocualtar columnas de la tabla
  var botones = $(".ocultar a");
  botones.click(function() {
    if ($(this).attr('class').includes('active')) {
      $(this).removeClass('active');
    } else {
      $(this).addClass('active');
    }
  })
  // Limpiar campos
  function limpiarCampos() {
    validNom = true
    $('#msgAgregar').text('')
    $('#cantRestock').text('')
  }
  //Mostrar filas al seleccionar el estante
  function mostrarFilas(estante, fila) {
    var cadena
    if (estante == '') {
      cadena = `<option value="" selected>-- Seleccione --</option>`
      $('#fila').html(cadena)
      $('#fila').val(fila)
    } else {
      $.ajax({
        url: '<?php echo base_url('insumos/obtenerFilasInsumos/') ?>' + estante,
        type: 'POST',
        dataType: 'json',
        success: function(res) {
          console.log(res)
          if(res.length == 0){
            cadena =  `<option value="" selected>-- No Hay Filas  --</option>`
          }else{
            cadena = `<option value="" selected>-- Seleccione  --</option>`
            for (let i = 0; i < res.length; i++) {
              cadena += `<option value=${res[i].id_fila}>${res[i].nombre}</option>`
            }

          }
          $('#fila').html(cadena)
          $('#fila').val(fila)
        }
      })
    }
  }
  //Agregar o editar insumo
  function seleccionarInsumo(id, tp) {
    if (tp == 2) {
      $.ajax({
        type: 'POST',
        url: "<?= base_url('insumosAdmin/buscarInsumo') ?>",
        data: {
          id
        },
        dataType: 'json',
        success: function(data) {
          $('#tituloModal').text('Editar')
          $('#imgModal').attr('src', '<?= base_url('img/editar1.png') ?>')
          $('#imgModal').attr('width', '25')
          $('#id').val(data['id_material'])
          $('#tp').val(2)
          $('#nombre').val(data['nombre'])
          $('#nombreHidden').val(data['nombre'])
          $('#categoria').val(data['categoria_material'])
          $('#precioC').val(data['precio_compra'])
          $('#precioV').val(data['precio_venta'])
          $('#cantidadA').val(data['cantidad_actual'])
          $('#cantidadV').val(data['cantidad_vendida'])
          $('#estante').val(data['idEstante'])
          mostrarFilas(data['idEstante'], data['fila'])
          $('#btnAgregar').text('Actualizar')
          $('.asterisco').hide()
        }
      })
    } else {
      $('#tituloModal').text('Agregar')
      $('#imgModal').attr('src', '<?= base_url('img/plus-b.png') ?>')
      $('#imgModal').attr('width', '25')
      $('#id').val(0)
      $('#tp').val(1)
      $('#nombre').val('')
      $('#nombreHidden').val('')
      $('#categoria').val('')
      $('#precioC').val('')
      $('#precioV').val('')
      $('#cantidadA').val('')
      $('#cantidadV').val('')
      $('#estante').val('')
      mostrarFilas('', '')
      $('#btnAgregar').text('Guardar')
      $('.asterisco').show()

    }
  }
  //Obtener filas del estante
  $('#estante').on("change", function(e) {
    estante = $('#estante').val()
    mostrarFilas(estante, '')
  })
  //Validar nombre de material
  $('#nombre').on("input", function(e) {
    nombre = $('#nombre').val()
    nomHidden = $('#nombreHidden').val()
    $.ajax({
      type: 'POST',
      url: "<?= base_url('insumosAdmin/buscarInsumo') ?>",
      dataType: 'json',
      data: {
        id: 0,
        nombre
      },
      success: function(res) {
        if (nombre == nomHidden) {
          $('#msgAgregar').text('')
          validNom = true
        } else if (res != null) {
          $('#msgAgregar').text('* Este insumo fue registrado *')
          validNom = false
        } else {
          $('#msgAgregar').text('')
          validNom = true
        }
      }
    })
  })
  // Tabla de inusmos
  var tableInsumosAdmin = $("#tableInsumosAdmin").DataTable({
    ajax: {
      url: '<?= base_url('insumosAdmin/obtenerInsumos') ?>',
      method: "POST",
      data: {
        estado: 'A'
      },
      dataSrc: "",
    },
    columns: [{
        data: null,
        render: function(data, type, row) {
          contador = contador + 1
          return '<b>' + contador + '</b>'
        }
      },
      {
        data: 'nombre'
      },
      {
        data: 'categoria'
      },
      {
        data: null,
        render: function(data, type, row) {
          var estado = ''
          row.cantidad_actual < 8 ? estado = 'invalidoInsumo' : estado = 'valido'
          return `<span class="${estado}" id="spanInsu">${row.cantidad_actual}</span>`
        }
      },
      {
        data: 'cantidad_vendida'
      },
      {
        data: 'nomEstante'
      },
      {
        data: 'fila'
      },
      {
        data: 'precio_venta',
        render: function(data, type, row) {
          return formatearCantidad(row.precio_venta)
        }
      },
      {
        data: 'precio_compra',
        render: function(data, type, row) {
          return formatearCantidad(row.precio_compra)
        }
      },
      {
        data: null,
        render: function(data, type, row) {
          return (
            '<button class="btn" onclick="seleccionarInsumo(' + data.id_material + ' , 2 )" data-bs-target="#agregarInsumo" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Insumo"></button>' +

            '<button class="btn" data-href=' + data.id_material + ' data-bs-toggle="modal" data-bs-target="#modalEliminar"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Insumo"></button>' +

            `<button class="btn" onclick="restockMaterial('${row.nombre}', ${row.cantidad_actual}, ${row.id_material})" data-bs-toggle="modal" data-bs-target="#restockMaterial"><img src="<?php echo base_url("img/restock.png") ?>" alt="Boton Reestock" title="Restock Insumo" width="25"></button>`
          );
        },
      }

    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },

  });
  $('#formularioInsumo').on('submit', function(e) {
    e.preventDefault()
    tp = $('#tp').val()
    id = $('#id').val()
    nombre = $('#nombre').val()
    categoria = $('#categoria').val()
    precioC = $('#precioC').val()
    precioV = $('#precioV').val()
    cantidadA = $('#cantidadA').val()
    cantidadV = $('#cantidadV').val()
    estante = $('#estante').val()
    fila = $('#fila').val()

    if ([nombre, categoria, precioC, precioV, cantidadA, estante, fila].includes('') || !validNom) {
      mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
    } else {
      $.ajax({
        url: "<?= base_url('insumosAdmin/insertar') ?>",
        type: 'POST',
        dataType: 'json',
        data: {
          tp,
          id,
          nombre,
          categoria,
          precioC,
          precioV,
          cantidadA,
          cantidadV: cantidadV == '' ? 0 : cantidadV,
          estante,
          fila
        },
        success: function(res) {
          contador = 0
          if (tp == 2) {
            if (res == 1) {
              tableInsumosAdmin.ajax.reload(null, false)
              $('#agregarInsumo').modal('hide')
              mostrarMensaje('success', '¡Se ha actualizado el insumo!')
            } else {
              mostrarMensaje('error', '¡Ha ocurrido un error!')
            }
          } else {
            if (res == 1) {
              tableInsumosAdmin.ajax.reload(null, false)
              $('#agregarInsumo').modal('hide')
              mostrarMensaje('success', '¡Se ha guardado el insumo!')
            } else {
              mostrarMensaje('error', '¡Ha ocurrido un error!')
            }
          }
        }
      })
    }
  })
  // Mostrar info modal
  function restockMaterial(nombre, cantActual, id) {
    $('#tituloRestock').text('Reestock - ' + nombre)
    $('#cantActu').val(cantActual)
    $('#idMate').val(id)
  }
  //Hacer restock material
  $('#btnRestock').on('click', function(e) {
    cantActual = $('#cantActu').val()
    cantAgregar = $('#cantRestock').val()
    id = $('#idMate').val()

    if ([cantAgregar].includes('')) {
      mostrarMensaje('error', '¡Ingrese una cantidad valida!')
    } else {
      $.ajax({
        type: 'POST',
        url: "<?= base_url('insumosAdmin/restockMaterial') ?>",
        dataType: 'json',
        data: {
          id,
          cantActual,
          cantAgregar
        },
        success: function(res) {
          if (res == 1) {
            contador = 0
            tableInsumosAdmin.ajax.reload(null, false)
            $('#restockMaterial').modal('hide')
            mostrarMensaje('success', '¡Se realizo el restock!')
          } else {
            mostrarMensaje('error', '¡Ingrese una cantidad valida!')
          }
        }
      })
    }
  })
  // Cambiar estado de "Activo" a "Inactivo"
  $('#modalEliminar').on('shown.bs.modal', function(e) {
    $(this).find('#btnSi').attr('onclick', `EliminarMaterial(${$(e.relatedTarget).data('href')})`)
  })

  function EliminarMaterial(id) {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('insumosAdmin/cambiarEstado') ?>",
      data: {
        id,
        estado: 'I'
      }
    }).done(function(data) {
      mostrarMensaje('success', data)
      $('#modalEliminar').modal('hide')
      contador = 0
      tableInsumosAdmin.ajax.reload(null, false)
    })
  }
  $('#btnNo').click(function() {
    $("#modalEliminar").modal("hide");
  });
</script>