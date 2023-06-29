<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
  <h2 class="text-center mb-4">
    <img style=" width:40px; height:40px; " src="<?php echo base_url('/img/insumos.png') ?>" />Administrar Insumos Eliminados
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
  <button type="button" class="btn btnRedireccion d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
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
          <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-eye-fill fs-4"></i><span id="tituloModal">Ver Material</span> </h1>
          <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>

        <div class="modal-body">
          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Nombre:</label>
              <input class="form-control" id="nombre" name="nombre" disabled>
            </div>
            <div class="mb-3" style="width: 90%;">
              <label for="categoria" class="col-form-label">Categoria:</label>
              <select class="form-control form-select" name="estante" id="categoria" disabled>
                <option selected value="" >-- Seleccione --</option>
                <?php foreach ($categorias as $data) { ?>
                  <option value="<?= $data['id_param_det'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 100%;">
              <label for="exampleDataList" class="col-form-label">Cantidad Actual:</label>
              <input class="form-control" type="number" id="cantidadA" name="cantidadA" disabled >
            </div>

            <div class="mb-3" style="width: 100%;">
              <label for="exampleDataList" class="col-form-label">Cantidad Vendida:</label>
              <input class="form-control" type="number" id="cantidadV" name="cantidadV" disabled>
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Venta:</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">$</span>
                <input class="form-control" type="number" id="precioV" name="precioV" disabled>
              </div>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Compra:</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">$</span>
                <input class="form-control" type="number" id="precioC" name="precioC" disabled>
              </div>

            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Estante:</label>
              <select style=" margin-left: 0px !important;" class="form-control form-select" name="estante" id="estante" disabled>
                <option selected value="">-- Seleccione --</option>
                <?php foreach ($estantes as $data) { ?>
                  <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Fila:</label>
              <select style=" margin-left: 0px !important;" class="form-control form-select" name="fila" id="fila" disabled>
                <option selected value="">-- Seleccione --</option>

              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer" id="modalFooter">
          <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- MODAL REESTABLECER ELIMINAR -->
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
            <img style=" width:100px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
            <p class="textoModalP">¿Estas seguro de reestablecer este Insumo?</p>
          </div>
        </div>
      </div>
      <div id="bloqueBtnP" class="modal-footer">
        <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
        <a id="btnSi" class="btn btnAccionF">Reestablecer</a>
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
          cadena = `<option value="" selected>-- Seleccione  --</option>`
          for (let i = 0; i < res.length; i++) {
            cadena += `<option value=${res[i].id_fila}>${res[i].fila}</option>`
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
          $('#tituloModal').text('Ver Insumo')
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
        }
      })
    }
  }
  // Tabla de inusmos
  var tableInsumosAdmin = $("#tableInsumosAdmin").DataTable({
    ajax: {
      url: '<?= base_url('insumosAdmin/obtenerInsumos') ?>',
      method: "POST",
      data: {
        estado: 'I'
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
            '<button class="btn" onclick="seleccionarInsumo(' + data.id_material + ' , 2 )" data-bs-target="#agregarInsumo" data-bs-toggle="modal" title="Ver Insumo"><i class="bi bi-eye-fill fs-4 text-primary"></i></button>' +

            '<button class="btn" data-href=' + data.id_material + ' data-bs-toggle="modal" data-bs-target="#modalEliminar"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restaurar" title="Restaurar Insumo" width="20"></button>'
          );
        },
      }

    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },

  });
  // Cambiar estado de "Inactivo" a "Activo"
  $('#modalEliminar').on('shown.bs.modal', function(e) {
    $(this).find('#btnSi').attr('onclick', `ReestablerMaterial(${$(e.relatedTarget).data('href')})`)
  })
  function ReestablerMaterial(id) {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('insumosAdmin/cambiarEstado') ?>",
      data: {
        id,
        estado: 'A'
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