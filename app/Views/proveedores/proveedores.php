<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_clientes.css") ?>">
<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/icons/icon-proveedores.png') ?>" /> Proveedores</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableProveedores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="">
                <!-- < ?php $contador = 0 ?>
                < ?php foreach ($proveedores as $p) { ?>
                    <tr>
                        <th scope="row" class="text-center">< ?= $contador += 1 ?></th>
                        <td class="text-center">< ?php echo $p['razon_social']; ?></td>
                        <td class="text-center">< ?php echo $p['n_identificacion']; ?></td>
                        <td class="text-center">< ?php echo $p['direccion']; ?></td>
                        <td class="text-center">
                            <button class="btn" onclick="seleccionarProveedor(< ?= $p['id_tercero'] . ',' . 2 ?>)" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="< ?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>

                            <input type="image" class="btn" href="#" data-href="< ?php echo base_url('/proveedores/eliminar') . '/' . $p['id_tercero'] . '/' . 'I'; ?>" data-bs-toggle="modal" data-bs-target="#modalConfirmaP" src="< ?php echo base_url('icons/delete.svg') ?>"></input>
                        </td>
                    </tr>
                < ?php } ?> -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarProveedor" onclick="seleccionarProveedor(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?php echo base_url('/proveedores/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- -----modal----------     -->
<form method="POST" id="formularioProveedores" autocomplete="off">

    <div class="modal fade" id="agregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="modalProveedor">
            <div class="modal-content" id="modalContentP">

                <div class="modal-header" id="modalHeader">

                    <img style=" width:60px; height:60px; " src="<?php echo base_url('/img/ingecosmo.jpg') ?>" />

                    <div id="modalHeader2">

                        <h1 class="modal-title fs-5" id="tituloModal">AGREGAR</h1>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modalAgregarP">
                        <div class="mb-3" >
                            <label for="recipient-name" class="textoP" style="margin:0;">Razon Social:</label>
                            <input class="form-control" type="text" min='1' max='300' id="RazonSocial" name="RazonSocial">
                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>

                        <div class="mb-3" >
                            <label style="margin:0;" for="message-text"class="textoP" >NIT:</label>
                            <input class="form-control" id="nit" name="nit"></input>
                        </div>

                        <div class="mb-3">
                            <label style="margin:0;"class="textoP" for="message-text" >Direccion:</label>
                            <input class="form-control" id="direccion" name="direccion"></input>
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
<div class="modal fade" id="modalConfirmaP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 50px; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/icons/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Proveedor?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#modalConfirmaP').on('show.bs.modal', function(e) {
        $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    });

     // Tabla de usuarios  
     var tableProveedores = $("#tableProveedores").DataTable({
        ajax: {
            url: '<?= base_url('proveedores/obtenerProveedores') ?>',
            method: "POST",
            data: {
                estado: 'A'
            },
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    ContadorPRC = ContadorPRC + 1;
                    return "<b>" + ContadorPRC + "</b>";
                },
            },
            {
                data: 'razon_social'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'direccion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarProveedor(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>' +

                        '<input type="image" class="btn" data-href=<?php echo base_url('/proveedores/eliminar') ?>' + data.id_tercero + '/I data-bs-toggle="modal" data-bs-target="#modalConfirmarP" src="<?php echo base_url("icons/delete.svg") ?>"></input>' 
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

        //Envio de formulario
        $('#formularioProveedores').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        RazonSocial = $('#RazonSocial').val()
        nit= $('#nit').val()
        direccion = $('#direccion').val()
        
        //Control de campos vacios
        if ([RazonSocial, nit, direccion].includes('')) {
            return mostrarMensaje('error', '¡Hay campos vacios!')
        } else {
            $.ajax({
                url: '<?php echo base_url('proveedores/insertar') ?>',
                type: 'POST',
                data: {
                    id,
                    tp,
                    RazonSocial,
                    nit,
                    direccion
                },
                success: function(idUser) {
                    
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Proveedor!')
                    } else {
                        mostrarMensaje('success', '¡Se ha Registrado el Proveedor!')
                    }
                }
            }).done(function(data) {
                $('#agregarProveedor').modal('hide')
                tableProveedores.ajax.reload(null, false); //Recargar tabla
                $('#btnGuardar').removeAttr('disabled') //jumm
                ContadorPRC = 0
            });
        };
    })

    function seleccionarProveedor(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('EDITAR')
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_tercero'])
                    $('#RazonSocial').val(res[0]['razon_social'])
                    $('#nit').val(res[0]['n_identificacion'])
                    $('#direccion').val(res[0]['direccion'])
                    $('#btnGuardar').text('Actualizar')
                }
            })
        } else {
            //Insertar datos
            $('#tituloModal').text(`AGREGAR`)
            $('#tp').val(1)
            $('#id').val(0)
            $('#RazonSocial').val('')
            $('#nit').val('')
            $('#direccion').val('')
            $('#btnGuardar').text('Agregar')

        }
    }

    $('#btnNo').click(function() {
        $("#modalConfirmaP").modal("hide");
    });
</script>