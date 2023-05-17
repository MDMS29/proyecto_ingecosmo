<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:50px; height:50px; " src="<?php echo base_url('/img/Aliados.png') ?>" /> Aliados</h2>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableAliados" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <a href="<?php echo base_url('/aliados') ?>" class="btn btnRedireccion">Regresar</a>
    </div>
</div>


<div class="modal fade" id="verAliado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog modal-xl">
        <div class="body">
            <div class="logo">
                <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa">
            </div>
            <div class="modal-content">
                <div class="modal-header flex">
                    <h1 class="modal-title fs-5 text-center" id="tituloModal"><!-- TEXTO DINAMICO--></h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="textoP" style="margin:0;">Razon Social:</label>
                            <input class="form-control inputP" type="text" min='1' max='300' id="RazonSocial" name="RazonSocial" disabled>
                            <small id="msgRaSo" class="invalido"></small>
                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label style="margin:0;" for="message-text" class="col-form-label textoP">NIT:</label>
                            <input type="number" class="form-control inputP" id="nit" name="nit" disabled>
                            <small id="msgDoc" class="invalido"></small>
                        </div>
                        <div class="mb-3" style="width: 100%">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" name="direccion" class="form-control" id="direccion" disabled>
                        </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Confirma Reestablecer -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0px; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de reestablecer este Aliado?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Reestablecer</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var ContadorPRC = 0;
    // Tabla de Aliados
    var tableAliados = $("#tableAliados").DataTable({
        ajax: {
            url: '<?= base_url('aliados/obtenerAliados') ?>',
            method: "POST",
            data: {
                estado: 'I'
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
                        '<button class="btn text-primary" onclick="seleccionarAliado(' + data.id_tercero + ')" data-bs-target="#verAliado" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4"></i></button>' +
                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Eliminar" title="Eliminar Aliado" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    function seleccionarAliado(id) {
        //Actualizar datos
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + id + "/" + 0,
            dataType: 'json',
            success: function(res) {
                $('#tituloModal').text('Editar Aliado')
                $('#tp').val(2)
                $('#id').val(res[0]['id_tercero'])
                $('#RazonSocial').val(res[0]['razon_social'])
                $('#nit').val(res[0]['n_identificacion'])
                $('#direccion').val(res[0]['direccion'])
                $('#btnGuardar').text('Actualizar')
            }
        })
    }
    //Cambiar estado de "Inactivo" a "Activo"
    $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestablecerAliado(${$(e.relatedTarget).data('href')})`)
    })

    function ReestablecerAliado(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('aliados/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#modalConfirmar').modal('hide')
            tableAliados.ajax.reload(null, false)
        })
    }
</script>