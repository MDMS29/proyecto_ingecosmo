<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
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
            <div class="body">
                <div class="modal-content" id="modalContentP">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="90">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"><!-- TEXTO DINAMICO--></h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="modalAgregarP">
                                <div class="mb-3" style="width: 100%">
                                    <label for="razon_social" class="col-form-label">Razon Social:</label>
                                    <input type="text" name="RazonSocial" class="form-control inputP" id="RazonSocial" min='1' max='300'>
                                    <small id="msgRaSo" class="invalido"></small>
                                    <input hidden id="tp" name="tp">
                                    <input hidden id="id" name="id">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="">
                                        <label for="nit" class="col-form-label">NIT:</label>
                                        <input type="number" name="nit" class="form-control" id="nit" minlength="9" maxlength="11">
                                        <small id="msgNit" class="invalido"></small>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="">
                                        <label for="direccion" class="col-form-label">Direccion:</label>
                                        <input type="text" name="direccion" class="form-control" id="direccion">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/icons/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Aliado?</p>
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
    var validNit=true;  

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
                        '<button class="btn" onclick="seleccionarAliado(' + data.id_tercero + ',2)" data-bs-target="#agregarAliado" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Aliado"></button>' +

                        '<input type="image" class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar" src="<?php echo base_url("icons/delete.svg") ?>"></input>'
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

    //Limpiar campos de telefonos y correos
    function limpiarCampos(accion) {
        $('#msgConfirRes').text('')
        $('#msgConfir').text('')
    }
    //Validacion de Razon Social
    function buscarRazonSocial(id, inputRazonSocial) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/aliados/buscarAliadoRzn/') ?>" + id + "/" + inputRazonSocial,
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
    //Valor para el nit si es valido o invalido
    $('#RazonSocial').on('input', function(e) {
        inputRazonSocial = $('#RazonSocial').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarRazonSocial(0, inputRazonSocial)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/aliados/buscarAliadoRzn/') ?>" + id + "/" + inputRazonSocial,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['razon_social'] == inputRazonSocial) {
                        $('#msgRaSo').text('')
                        validRazonSocial = true
                    } else {
                        buscarRazonSocial(0, inputRazonSocial)
                    }
                }
            })
        }
    })
    //Validacion de Nit
    function buscarNit(id, inputNit) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + id + "/" + inputNit,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgNit').text('')
                    validNit = true
                } else if (res[0] != null) {
                    $('#msgNit').text('* NIT ya Existente *')
                    validNit = false
                }
            }
        })
    }
    //Valor para el nit si es valido o invalido
    $('#nit').on('input', function(e) {
        inputNit = $('#nit').val()  
        console.log(inputNit)
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarNit(0, inputNit)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + id + "/" + inputNit,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['n_identificacion'] == inputNit) {
                        $('#msgNit').text('')
                        validNit = true
                    } else {
                        buscarNit(0, inputNit)
                    }
                }
            })
        }
    })
    //Envio de formulario
    $('#formularioAliados').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        RazonSocial = $('#RazonSocial').val()
        nit = $('#nit').val()
        direccion = $('#direccion').val()
        //Control de campos vacios
        if ([RazonSocial, nit, direccion].includes('') || validRazonSocial == false || validNit == false) {
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
                success: function(idTer) {
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Proveedor!')
                    } else {
                        mostrarMensaje('success', '¡Se ha Registrado el Proveedor!')
                    }
                }
            }).done(function(data) {
                limpiarCampos('msgConfir')
                $('#agregarAliado').modal('hide')
                tableAliados.ajax.reload(null, false); //Recargar tabla
                $('#btnGuardar').removeAttr('disabled') //jumm
                ContadorPRC = 0
            });
        };
    })

    function seleccionarAliado(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + id + '/' + 0,
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
        } else {
            //Insertar datos
            $('#tituloModal').text(`AGREGAR`)
            $('#tp').val(1)
            $('#id').val(0)
            $('#RazonSocial').val('')
            $('#nit').val('')
            $('#direccion').val('')
            $('#msgNit').text('') 
            $('#msgRaSo').text('') 
            $('#btnGuardar').text('Agregar')

        }

    }

    //Cambiar estado de "Activo" a "Eliminado" 
    $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `EliminarAliado(${$(e.relatedTarget).data('href')})`)
    })

    function EliminarAliado(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('aliados/cambiarEstado') ?>",
            data: {
                id,
                estado: 'I'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            $('#modalConfirmar').modal('hide')
            tableAliados.ajax.reload(null, false)
            ContadorPRC = 0
        })
    }
</script>