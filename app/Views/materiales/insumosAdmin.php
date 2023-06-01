<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/insumos.png') ?>" /> Insumos</h2>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableInsumosAdmin" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Categoria del Insumo</th>
                    <th scope="col" class="text-center">Tipo de material</th>
                    <th scope="col" class="text-center">Cantidad Actual</th>
                    <th scope="col" class="text-center">Estante </th>
                    <th scope="col" class="text-center">Fila</th>
                    <th scope="col" class="text-center">Acciones </th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PROVEDOORES -->

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
  <!-- <input type="text" value="< ?= $idCate ?>" id="idCategoria" hidden> -->

  <input type="text" name="id" id="id" hidden>
  <input type="text" name="tp" id="tp" hidden>

  <div class="modal fade" id="agregarInsumo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="modalContent">
        <div class="modal-header" id="modalHeader">
          <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
          <div id="agregar">
            <img style="margin-right: 10px; width:30px;" src="http://localhost/ingecosmo/public/img/plus-b.png" alt="icon-plus" width="20">
          </div>
          <h1 class="modal-title" id="titulo1">Agregar</h1>
          <button type="button" class="btn-close" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close"></button>
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
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="estante" id="estante1">
                <option selected value="">-- Seleccione Un Estante--</option>
                <!-- < ?php foreach ($estanteria as $data) { ?>
                  <option value="< ?= $data['id'] ?>">< ?= $data['nombre'] ?></option> -->
                <!-- < ?php } ?> -->
              </select>
            </div>

            <div class="mb-3" style="width: 80%;">
              <label for="exampleDataList" class="col-form-label">Fila:</label>
              <select style="background-color:#ECEAEA;" class="form-select form-select" name="fila" id="fila1">
                <option selected value="">-- Seleccione una fila--</option>
                <!-- < ?php foreach ($fila as $fila) { ?>
                  <option value="< ?= $fila['numeroFila'] ?>">< ?= $fila['numeroFila'] ?></option>
                < ?php } ?> -->
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

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar el repuesto?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Editar o Agregar Proveedor
    function seleccionarProveedor(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id + "/" + 0 + '/' + 0,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('Editar')
                    $('#logoModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_material'])
                    $('#RazonSocial').val(res[0]['razon_social'])
                    $('#nit').val(res[0]['n_identificacion'])
                    $('#direccion').val(res[0]['direccion'])
                    $('#btnGuardar').text('Actualizar')
                    $('#msgRaSo').text('')
                    $('#msgNit').text('')
                }
            })

        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar')
            $('#logoModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
            $('#tp').val(1)
            $('#id').val(0)
            $('#RazonSocial').val('')
            $('#nit').val('')
            $('#direccion').val('')
            $('#btnGuardar').text('Agregar')
            $('#msgRaSo').text('')
            $('#msgNit').text('')
        }
    }
    // Tabla   
    var tableInsumosAdmin = $("#tableInsumosAdmin").DataTable({
        ajax: {
            url: '<?= base_url('insumosAdmin/ObtenerDetallesInsumos') ?>',
            method: "POST",
            data: {
                estado: 'A'
            },
            dataSrc: "",
        },
        columns: [{
                data: 'nombre'
            },
            {
                data: 'categoria_material'
            },
            {
                data: 'nombre_categoria'
            },
            {
                data: 'cantidad_actual'
            },
            {
                data: 'nombreEstante'
            },
            {
                data: 'fila'
            },
            // {
            //     data: null,
            //     render: function(data, type, row) {
            //         return (
            //             '<button class="btn" onclick="seleccionarProveedor(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>' +

                //         '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Proveedor"></button>'
                //     );
                // },
            // }
 
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
    //Validacion de Razon Social
</script>