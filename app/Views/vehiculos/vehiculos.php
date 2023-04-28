<div id="content" class="p-4 p-md-5">
        <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>" /> Proveedores</h2>
        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
            <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Razon Social</th>
                        <th scope="col" class="text-center">NIT</th>
                        <th scope="col" class="text-center">Direccion</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 0 ?>
                    <?php foreach ($proveedores as $p) { ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                            <td class="text-center"><?php echo $p['razon_social']; ?></td>
                            <td class="text-center"><?php echo $p['n_identificacion']; ?></td>
                            <td class="text-center"><?php echo $p['direccion']; ?></td>
                            <td class="text-center">

                                <button class="btn" onclick="seleccionarProveedor(<?= $p['id_tercero'] . ',' . 2 ?>)" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>


                                <input type="image" class="btn-trash" href="#" data-href="<?php echo base_url('/proveedores/eliminar') . '/' . $p['id_tercero'] . '/' . 'E'; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" src="<?php echo base_url('icons/delete.svg') ?>"></input>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="footer-page">
            <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarProveedor" onclick="seleccionarProveedor(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
            <a href="<?= base_url('home') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
        </div>


        <!-- -----modal----------     -->
        <form method="POST" action="<?php echo base_url(); ?>proveedores/insertar" autocomplete="off">

            <div class="modal fade" id="agregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="modalcontent">

                        <div class="modal-header" id="modalHeader">

                            <img style=" width:60px; height:60px; " src="<?php echo base_url('/img/ingecosmo.jpg') ?>" />

                            <div id="modalHeader2">

                                <img style="background-color: black; margin-right: 10px;" src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20">
                                <h1 class="modal-title fs-5" id="tituloModal">AGREGAR</h1>
                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalBody">
                            <form>

                                <div class="modalAgregarP">
                                    <div class="mb-3" id="camposModalP">
                                        <label for="recipient-name" class="textoP">Razon Social:</label>
                                        <input type="text" min='1' max='300'  id="RazonSocial" name="RazonSocial">
                                        <input hidden id="tp" name="tp">
                                        <input hidden id="id" name="id">
                                    </div>

                                    <div class="mb-3" id="camposModalP">
                                        <label for="message-text" class="textoP">NIT:</label>
                                        <input  id="nit" name="nit"></input>
                                    </div>

                                    <div class="mb-3" id="camposModalP">
                                        <label for="message-text" class="textoP">Direccion:</label>
                                        <input  id="direccion" name="direccion"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                            <button type="submit" class="btn btnAccionF" id="btnGuardar">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Confirma Eliminar -->
        <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-xl">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar de Registro</h5>

                    </div>
                    <div class="modal-body">
                        <p>¿Estas seguro de eliminar este Proveedor?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-no" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                        <a id="btn-si" class="btn btnAccionF">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#modal-confirma').on('show.bs.modal', function(e) {
            $(this).find('#btn-si').attr('href', $(e.relatedTarget).data('href'));
        });

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
                $('#tituloModal').text('AGREGAR')
                $('#tp').val(1)
                $('#id').val(0)
                $('#RazonSocial').val('')
                $('#nit').val('')
                $('#direccion').val('')
                $('#btnGuardar').text('Agregar')

            }
        }

        $('#btn-no').click(function() {
            $("#modal-confirma").modal("hide");
        });
    </script>