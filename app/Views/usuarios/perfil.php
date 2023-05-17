<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" accept="image/png" />
                        </div>
                    </div>
                </div>
                <div class="col-md-7" id="encP">
                    <div class="profile-head">
                        <h5>
                            <?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] . ' ' . $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?>
                        </h5>

                        <h6>
                            <?= $usuario['nombre_rol'] ?>
                        </h6>

                        <p class="profile-ranting" style="opacity: 0;">3</p>
                        <ul class="nav nav-tabs" style="margin-bottom: 0;" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#telefonos" role="tab" aria-controls="profile" aria-selected="false">Telefonos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#correos" role="tab" aria-controls="profile" aria-selected="false">Correos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contraseñas" role="tab" aria-controls="profile" aria-selected="false">Contraseñas</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                            <div class="profile-work">
                                <p>Permisos</p>
                                <p>Podrás ver los Trabajadores, Clientes, Materiales, Vehículos y Proveedores.</p>
                                <p>Tendrás el poder de agregar, editar y eliminar cualquiera de sus datos almacenados.</p>

                            </div>
                        <?php } ?>

                        <?php if (session('idRol') == 3) { ?>
                            <div class="profile-work">
                                <p>Permisos</p>
                                <p>Podrás ver los Insumos, Historial, Organizacion y Estanteria, tendrá el poder de agregar, editar y eliminar cualquiera de sus datos almacenados.</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="bloquePerfil">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Id Usuario</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input disabled class="form-control" id="idUsu" value="<?= $usuario['id_usuario'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Nombres</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input disabled class="form-control" id="nombres" value="<?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Apellidos</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input disabled class="form-control" id="apellidos" value="<?= $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Tipo Documento</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input disabled class="form-control" id="tipDoc" value="<?= $usuario['tipo_Documento'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>N° Documento</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input disabled class="form-control" id="numDoc" value="<?= $usuario['n_identificacion'] ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="bloquePerfil2">
                                    <div class="rowBtn">
                                        <button data-bs-toggle="modal" data-bs-target="#editarPerfil" type="button" class="btn btnRedireccion" onclick="verInput()">Editar perfil</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="telefonos" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive p-4" style="background-color: #f8f9fa;">
                                    <table class="table table-borderless table-sm table-hover" style="border:none;margin:0;">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col" class="text-center">Numero</th>
                                                <th scope="col" class="text-center">Prioridad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($telefonos as $tel) { ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tel['numero'] ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $tel['prioridad'] == 'P' ? 'Principal' : 'Secundario' ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="correos" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive p-4" style="background-color: #f8f9fa;">
                                    <table class="table table-borderless table-sm table-hover" style="border:none;margin:0;">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col" class="text-center">Correo</th>
                                                <th scope="col" class="text-center">Prioridad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($correos as $correo) { ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $correo['correo'] ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $correo['prioridad'] == 'P' ? 'Principal' : 'Secundario' ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contraseñas" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container" style="background-color: #dfe6f2;border-radius:10px;">
                                    <div class="d-flex column-gap-3" style="width: 100%" id="contenedorPerfil">
                                        <div class="mb-3" style="width: 100%; margin: 0;" id="contenidoPerfil">
                                            <div class="mb-3" style="width: 100%; margin: 0;" id="bloqueContra">
                                                <label id="labelNom" for="nombres" class="col-form-label"> Contraseña:
                                                </label>
                                                <div class="flex">
                                                    <input type="password" name="contraRes" class="form-control" id="contraRes" minlength="5">
                                                    <small class="normal">¡La contraseña debe contar con un minimo de 6 caracteres!</small>
                                                </div>
                                                <div class="form-check" style="margin-top: 10px;">
                                                    <input class="form-check-input" type="checkbox" value="" id="ver" onchange="verContrasena()">
                                                    <label class="form-check-label" for="ver">
                                                        Ver Contraseña
                                                    </label>
                                                </div>
                                            </div>

                                            <div id="contenidoPerfil2" class="mb-3" style="width: 100%; margin: 0px;">
                                                <div class="mb-3" style="width: 100%; margin: 0px;" id="bloqueContra">
                                                    <div>
                                                        <label for="nombres" class="col-form-label">Confirmar Contraseña:</label>
                                                        <input type="password" name="confirContraRes" class="form-control" id="confirContraRes" minlength="5">
                                                    </div>
                                                    <small id="msgConfirRes" class="normal"></small>
                                                </div>
                                                <div id="bloqueContra2">
                                                    <input type="submit" class="btn btnAccionF" value="Actualizar" id="btnActuContra"></input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- -------------------modal------------------------- -->
<form method="POST" id="formularioPerfil" autocomplete="off">
    <div class="modal fade" id="editarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" id="modalHeader">
                    <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.jpg') ?>" />

                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img id="logoModal" src="<?= base_url('icons/plus-b.png') ?>" alt="icon-plus">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"></h1>
                    </div>

                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form>
                    <div class="modal-body d-flex">
                        <div class="column-gap-3" style="width: 100%; padding-inline: 15px;">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label" style="margin:0;">Primer Nombre:</label>
                                <input class="form-control" type="text" min='1' max='300' id="nombreP" name="nombreP">

                                <input hidden id="tp" name="tp">
                                <input hidden id="id" name="id">
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" for="message-text" class="col-form-label">Segundo Nombre:</label>
                                <input type="text" class="form-control" id="nombreS" name="nombreS"></input>
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" for="message-text" class="col-form-label">Primer Apellido:</label>
                                <input type="text" class="form-control" id="apellidoP" name="apellidoP"></input>
                            </div>
                            <div class="mb-3">
                                <label style="margin:0;" for="message-text" class="col-form-label">Segundo Apellido:</label>
                                <input type="text" class="form-control" id="apellidoS" name="apellidoS"></input>
                            </div>

                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="tipoDoc">Tipo Identificación:</label>
                                <select class="form-select form-select form-control" name="tipoDoc" id="tipoDoc">
                                    <option value="1" selected>Cedula de Ciudadania</option>
                                    <option>-- Seleccione --</option>
                                </select>
                            </div>

                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="message-text">N° Identificacion:</label>
                                <input class="form-control" id="nIdenti" name="nIdenti"></input>
                                <small id="msgDoc" class="invalido"></small>
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

<script>
    //Ver contraseñas
    function verContrasena() {
        var check, password;
        password = document.getElementById("contraRes");
        check = document.getElementById("ver");
        if (check.checked == true) // Si la checkbox de mostrar contraseña está activada
        {
            password.type = "text";
        } else // Si no está activada 
        {
            password.type = "password";
        }
    }

    function verInput(id) {

        let formPerfil =
            ` <form>
        <div>
            hi
        </div>
            
        </form>`
    }

    $('#home').replaceWith(newElement);
</script>