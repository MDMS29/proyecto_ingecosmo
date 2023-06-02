<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
  <h2 class="text-center mb-4">
    <img style=" width:40px; height:40px; " src="<?php echo base_url('/img/insumos.png') ?>" />Administrar Insumos
  </h2>
  <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
    <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="2">Categoria Insumo</a> - <a class="toggle-vis btn" data-column="6">Precio
      Venta</a>
  </div>
  <div class="table-responsive p-2">
    <table class="table table-striped" id="tableInsumosAdmin" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Nombre</th>
          <th scope="col" class="text-center">Categoria Insumo</th>
          <th scope="col" class="text-center">Cantidad Actual</th>
          <th scope="col" class="text-center">Estante </th>
          <th scope="col" class="text-center">Fila</th>
          <th scope="col" class="text-center">Precio Venta</th>
          <th scope="col" class="text-center">Acciones </th>
        </tr>
      </thead>
      <tbody class="text-center">
        <!-- TABLA ADMINSITRAR INSUMO -->

      </tbody>
    </table>
  </div>
  <div class="footer-page">
    <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarInsumo" onclick="seleccionarInsumo(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
    <a href="<?php echo base_url('/insumos/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
  </div>
</div>

<!-- modal agregar -->

<form id="formularioAgregar" autocomplete="off">
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

        <div class="modal-body" id="modalAgregar2">

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Nombre:</label>
              <input class="form-control" id="nombre" name="nombre" placeholder="">
              <small id="msgAgregar" class="invalido2"></small>
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Compra:</label>
              <input class="form-control" type="number" id="precioC" name="precioC" placeholder="">
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Precio Venta:</label>
              <input class="form-control" type="number" id="precioV" name="precioV" placeholder="">
            </div>

            <div class="mb-3" style="width: 90%;">
              <label for="exampleDataList" class="col-form-label">Cantidad Ingresada:</label>
              <input class="form-control" type="number" id="cantidadA" name="cantidadA" placeholder="">
            </div>
          </div>

          <div class="d-flex column-gap-3" style="width: 100%">
            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Estante:</label>
              <select style=" margin-left: 0px !important;" class="form-control form-select" name="estante" id="estante">
                <option selected value="">-- Seleccione Un Estante--</option>
                <?php foreach ($estantes as $data) { ?>
                  <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Fila:</label>
              <select style=" margin-left: 0px !important;" class="form-control form-select" name="fila" id="fila">
                <option selected value="">-- Seleccione una fila--</option>
               
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  var contador = 0
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

  function seleccionarInsumo(id, tp) {
    if (tp == 2) {
      $.ajax({
        type: 'POST',
        url : "<?= base_url('insumosAdmin/buscarInsumo')?>",
        data : {
          id
        },
        dataType: 'json',
        success : function(data){
          $('#tituloModal').text('Editar')
          $('#imgModal').attr('src', '<?= base_url('img/editar1.png') ?>')
          $('#imgModal').attr('width', '25')
          $('#nombre').val(data['nombre'])
          $('#precioC').val(data['precio_compra'])
          $('#precioV').val(data['precio_venta'])
          $('#cantidadA').val(data['cantidad_actual'])
          $('#estante').val(data['nomEstante'])
          $('#btnAgregar').text('Actualizar')
        }
      })
    }else{
      $('#tituloModal').text('Agregar')
      $('#imgModal').attr('src', '<?= base_url('img/plus-b.png') ?>')
      $('#imgModal').attr('width', '25')
      $('#btnAgregar').text('Guardar')
      
    }
  }
  //Obtener filas del estante
  $('#estante').on("change", function(e) {
    estante = $('#estante').val()
    $.ajax({
      url: '<?php echo base_url('insumos/obtenerFilasInsumos/') ?>' + estante,
      type: 'POST',
      dataType: 'json',
      success: function(res) {
        console.log(res)

        var cadena
        cadena = `<option value="" selected>-- Seleccione una fila --</option>`
        for (let i = 0; i < res.length; i++) {

          cadena += `<option value=${res[i].fila
          }>${res[i].fila}</option>`
        }
        $('#fila').html(cadena)
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
          row.cantidad_actual < 5 ? estado = 'invalidoInsumo' : estado = 'valido'
          return `<span class="${estado}" id="spanInsu">${row.cantidad_actual}</span>`
        }
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
          return '$' + row.precio_venta
        }
      },
      {
        data: null,
        render: function(data, type, row) {
          return (
            '<button class="btn" onclick="seleccionarInsumo(' + data.id_material + ' , 2 )" data-bs-target="#agregarInsumo" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>' +

            '<button class="btn" data-href=' + data.id_material + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Proveedor"></button>'
          );
        },
      }

    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },

  });
</script>