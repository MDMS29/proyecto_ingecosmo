<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/insumos.png') ?>" />Insumos</h2>
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
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarProveedor" onclick="seleccionarProveedor(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?php echo base_url('/proveedores/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- -----modal----------     -->
<form method="POST" id="formularioProveedores" autocomplete="off">
    <div class="modal fade" id="agregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" id="modalHeader">
                    <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.jpg') ?>"/>

                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"></h1>
                    </div>

                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form>
                    <div class="modal-body d-flex">
                        <div class="column-gap-3" style="width: 100%; padding-inline: 15px;">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label" style="margin:0;">Nombre:</label>
                                <input class="form-control" type="text" min='1' max='300' id="nombre" name="nombre">
                                <small id="msgRaSo" class="invalido"></small>

                                <input hidden id="tp" name="tp">
                                <input hidden id="id" name="id">
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" for="message-text" class="col-form-label">Existencia:</label>
                                <input type="text" class="form-control" id="existencia" name="existencia"></input>
                                <small id="msgNit" class="invalido"></small>
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" class="col-form-label" for="message-text">Placa de vehiculo:</label>
                                <input class="form-control" id="placa" name="placa"></input>
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" class="col-form-label" for="message-text">Precio:</label>
                                <input class="form-control" id="precio" name="precio"></input>
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" class="col-form-label" for="message-text">proveedores:</label>
                                <input class="form-control" id="proveedores" name="proveedores"></input>
                            </div>
                        </div>


                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                    <button type="submit" class="btn btnAccionF" id="btnGuardar"></button>
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
                    $('#id').val(res[0]['id_tercero'])
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
        columns: [
            {
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
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarProveedor(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>' +

                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Proveedor"></button>'
                    );
                },
            }
 
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
    //Validacion de Razon Social
    
</script>