<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
<link rel="stylesheet" href="<?php echo base_url("css/proveedores/proveedores.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:50px; height:50px; " src="<?php echo base_url('/img/trabajadores-n.png') ?>" /> Trabajadores</h2>
    <div class="table-responsive p-2" >
        <table class="table table-striped" id="tableTrabajadores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Cargo</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
    <div class="footer-page">
    <a href="<?php echo base_url('/trabajadores') ?>" class="btn btnRedireccion">Regresar</a>
    </div>
</div>


<!-- Modal Confirma Reestablecer -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 50px; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/icons/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de reestablecer este Trabajador?</p>
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
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.

    // Tabla de usuarios
    var tableTrabajadores = $("#tableTrabajadores").DataTable({
        ajax: {
            url: '<?= base_url('trabajadores/obtenerTrabajadores') ?>',
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
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombre_p + " " + data.nombre_s;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.apellido_p + " " + data.apellido_s;
                }
            },
            {
                data: 'doc_res'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'nombre_cargo'
            },
            {
                data: 'direccion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarTrabajador(' + data.id_trabajador + ')" data-bs-target="#verTrabajador" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Ver" title="Ver Trabajador"></button>' +
                        '<button class="btn" data-href=<?php echo base_url('/trabajadores/cambiarEstado/') ?>' + data.id_trabajador + '/A data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("icons/restore.png") ?>" alt="Boton Eliminar" title="Eliminar Trabajador" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    function seleccionarTrabajador(id, tp) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchTra/') ?>" + id + "/" + 0,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('Editar Trabajador')
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_trabajador'])
                    $('#nombreP').val(res[0]['nombre_p'])
                    $('#nombreS').val(res[0]['nombre_s'])
                    $('#apellidoP').val(res[0]['apellido_p'])
                    $('#apellidoS').val(res[0]['apellido_s'])
                    $('#tipoDoc').val(1)
                    $('#nIdenti').val(res[0]['n_identificacion'])
                    $('#direccion').val(res[0]['direccion'])
                    $('#cargo').val(res[0]['id_cargo'])
                    $('#btnGuardar').text('Actualizar')
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 6,
                        dataType: 'json',
                        success: function(data) {
                            telefonos = data[0]
                            mostrarTelefonos()
                        }
                    })
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 6,
                        dataType: 'json',
                        success: function(data) {
                            correos = data[0]
                            mostrarCorreo()
                        }
                    })
                }
            })
        }

        // Funcion para mostrar correos en la tabla.
        function mostrarCorreo() {
        $('#email').val(correos[0]?.correo)
        var cadena
        if (correos.length == 0) {
            cadena += ` <tr class="text-center">
                            <td colspan="3">NO HAY CORREOS</td>
                        </tr>`
            $('#bodyCorre').html(cadena)
        } else {
            for (let i = 0; i < correos.length; i++) {
                cadena += ` <tr class="text-center">
                                <td>${correos[i].correo}</td>
                                <td>${correos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    // Funcion para mostrar telefonos en la tabla.
    function mostrarTelefonos() {
        $('#telefono').val(telefonos[0]?.numero)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="3">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center">
                                <td>${telefonos[i].numero}</td>
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
     //Cambiar estado de "Eliminado" a "Activo"
     $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'))
        $('#btnSi').on('click', function(e) {
            mostrarMensaje('success', 'Se ha reestablecido el usuario')
            tableUsuarios.ajax.reload(null, false)
        })
    })

    // $('#modalConfirmaP').on('show.bs.modal', function(e) {
    //     $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    // });

    // $('#modalActivarP').on('show.bs.modal', function(e) {
    //     $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    // });


    // $('.btnNo').click(function() {
    //     $("#modalActivarP").modal("hide");
    // });

    // //Mostrar mensajes de SwalFire
    // function mostrarMensaje(tipo, msg) {
    //     Swal.fire({
    //         position: 'center',
    //         icon: `${tipo}`,
    //         text: `${msg}`,
    //         showConfirmButton: false,
    //         timer: 1500
    //     })
    // }
</script>