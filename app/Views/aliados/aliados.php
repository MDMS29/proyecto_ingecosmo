+

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/Aliados.png') ?>" /> Aliados</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="1">Razon Social</a> - <a class="toggle-vis btn" data-column="2">NIT</a> - <a class="toggle-vis btn" data-column="3">Direccion</a>
        </div>
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
                <!-- TABLA PROVEDOORES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarAliado" onclick="seleccionarAliado(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?php echo base_url('/aliados/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- -----modal----------     -->
<form method="POST" id="formularioAliados" autocomplete="off">

    <div class="modal fade" id="agregarAliado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="mb-3">
                            <label for="recipient-name" class="textoP" style="margin:0;">Razon Social:</label>
                            <input class="inputP" type="text" min='1' max='300' id="RazonSocial" name="RazonSocial">
                            <small id="msgRaSo" class="invalido"></small>

                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label style="margin:0;" for="message-text" class="textoP">NIT:</label>
                            <input type="number" class="inputP" id="nit" name="nit"></input>
                            <small id="msgDoc" class="invalido"></small>
                        </div>

                        <div class="mb-3">
                            <label style="margin:0;" class="textoP" for="message-text">Direccion:</label>
                            <input class="inputP" id="direccion" name="direccion"></input>
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
    // variables
    var inputRazonSocial = 0;
    var inputNit = 0;
    var ContadorPRC = 0
    var validRazonSocial;
    var validNit;

    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })

    //Mostrar mensajes de SwalFire
    function mostrarMensaje(tipo, msg) {
        Swal.fire({
            position: 'center',
            icon: `${tipo}`,
            text: `${msg}`,
            showConfirmButton: false,
            timer: 1500
        })
    }


    $('#modalConfirmarP').on('show.bs.modal', function(e) {
        $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    });

    // Tabla de usuarios  
    var tableAliados = $("#tableAliados").DataTable({
        ajax: {
            url: '<?= base_url('aliados/obtenerAliados') ?>',
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
                        '<button class="btn" onclick="seleccionarAliado(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarAliado" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Aliado"></button>' +

                        '<input type="image" class="btn" data-href=<?php echo base_url('/aliado/eliminar/') ?>' + data.id_tercero + '/I data-bs-toggle="modal" data-bs-target="#modalConfirmarP" src="<?php echo base_url("icons/delete.svg") ?>"></input>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableAliados.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });

    //Insertar y editar Trabajador
    function seleccionarAliado(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchAli/') ?>" + id + "/" + 0,
                dataType: 'json',

            }).done(function(res) {
                $('#tituloModal').text('Editar Aliado')
                $('#tp').val(2)
                $('#id').val(res[0]['id_trabajador'])
                $('#RazonSocial').val(res[0]['razon_social  '])
                $('#nit').val(res[0]['n_identificacion'])
                $('#direccion').val(res[0]['direccion'])
                $('#btnGuardar').text('Actualizar')
            })
        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar Aliado')
            $('#tp').val(2)
            $('#id').val('')
            $('#RazonSocial').val('')
            $('#nit').val('')
            $('#direccion').val('')
            $('#btnGuardar').text('Agregar')
        }
    }
        //Funcion para buscar trabajador segun su identificacion
        function buscarAliadoRzn(id, inputNit) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchAli/') ?>" + id + "/" + inputNit,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgDoc').text('')
                    validIdent = true
                } else if (res[0] != null) {
                    $('#msgDoc').text('* Numero de identificación invalido *')
                    validIdent = false
                }
            }
        })
    }
    //Envio de formulario
    $('#formularioAliados').on('submit', function(e) {
        e.preventDefault()
        $('#btnGuardar').attr('disabled', '')
        tp = $('#tp').val()
        id = $('#id').val()
        RazonSocial = $('#RazonSocial').val()
        nit = $('#nit').val()
        direccion = $('#direccion').val()

        //Control de campos vacios
        if ([RazonSocial, nit, direccion].includes('') || validRazonSocial != true || validNit != true) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?php echo base_url('aliados/insertar') ?>',
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
                $('#agregarAliado').modal('hide')
                tableAliados.ajax.reload(null, false); //Recargar tabla
                $('#btnGuardar').removeAttr('disabled') //jumm
                ContadorPRC = 0
            });
        };
    })

    //Validacion de Razon Social
    function buscarRazonSocial(id, inputRazonSocial) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + 0 + "/" + inputRazonSocial,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgRaSo').text('')
                    validRazonSocial = true
                } else if (res[0] != null) {
                    $('#msgRaSo').text('* Razon Social ya Existente *')
                    validRazonSocial = false
                }
            }
        })
    }

    //Validacion de Nit
    function buscarNit(id, inputNit) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/aliados/buscarAliados/') ?>" + 0 + "/" + inputNit,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgNit').text('')
                    validRazonNit = true
                } else if (res[0] != null) {
                    $('#msgNit').text('* NIT ya Existente *')
                    validRazonNit = false
                }
            }
        })
    }


    function seleccionarAliado(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + id + 0,
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
        $("#modalConfirmarP").modal("hide");
    });
</script>