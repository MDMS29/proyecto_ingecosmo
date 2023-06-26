<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/usuarios/perfil.css') ?>">
<!-- <link rel="stylesheet" href="< ?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>"> -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h1>Perfil</h1>
    <div class="container-info">
        <div class="info-user">
            <div class="d-flex align-items-center">
                <img style="border-radius: 50%;" alt="Foto Usuario" id="fotoPerfil" />
            </div>
            <div class="w-100 p-2 d-flex flex-column justify-content-center">
                <h4 class="fw-bold p-2"><?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] . ' ' . $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?></h4>

                <div class="d-flex gap-3 p-2">
                    <label>Rol:</label>
                    <p><?= $usuario['nombre_rol'] ?></p>
                </div>

                <div class="d-flex">
                    <div class="px-2 d-flex gap-3 flex-grow-1">
                        <label>Tipo Documento:</label>
                        <p><?= $usuario['tipo_Documento'] ?></p>
                    </div>
                    <div class="px-2 d-flex gap-3 flex-grow-1">
                        <label>N° Documento:</label>
                        <p><?= $usuario['n_identificacion'] ?></p>
                    </div>
                </div>
                <div class="w-100 d-flex gap-3">
                    <button data-bs-toggle="modal" data-bs-target="#editarPerfil" type="button" class="btn btnRedireccion flex-grow-1" onclick="editarCampos(<?= $usuario['id_usuario'] . ',' . 2 ?>)" title="Editar Perfil">Editar Perfil</button>
                    <button class="btn btnAccionF flex-grow-1" data-bs-toggle="modal" data-bs-target="#cambiarContra" type="button" title="Cambiar Contraseña">Cambiar Contraseña</button>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="info-sistema d-flex justify-content-evenly">
                <?php if (session('idRol') == 1) { ?>
                    <div class="d-flex flex-column gap-2">
                        <!-- TRABAJADORES -->
                        <div class="card py-2" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 10%); border-radius:20px; width: 300px;">
                            <div class="header-card">
                                <h5 class="fs-6">Trabajadores | <span id="cargo"> Todos </span></h5>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true" title="Filtrar Trabajadores"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-popper-placement="bottom-end">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item" onclick="filtrarCargo(0, 'Todos')">Todos</a></li>
                                        <?php foreach ($cargos as $cargo) { ?>
                                            <li><a class="dropdown-item" onclick="filtrarCargo(<?= $cargo['id_cargo'] ?> , '<?= $cargo['nombre'] ?>')"><?= $cargo['nombre'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body px-6 p-0">

                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div>
                                        <img src="<?= base_url('img/trabajadores-n.png') ?>" alt="logo trabajadores" width="40" class="img-card">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h4 id="n-trabajadores" style="margin: 0;"><?= $countTraba['n_trabajador'] ?></h4>
                                    </div>
                                </div>
                                <small class=" d-flex text-end"><a style="width: 90%;" href="<?= base_url('trabajadores') ?>" title="Ver Más">Ver más</a></small>
                            </div>

                        </div>

                        <!-- ORDENES DE SERVICIO -->
                        <div class="card py-2" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 10%); border-radius:20px; width: 300px;">
                            <div class="header-card">
                                <h5 class="fs-6">Orden de Servicio | <span id="tituloOrden"> Ultima Orden </span></h5>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true" title="Filtrar Trabajadores"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-popper-placement="bottom-end">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item" onclick="filtrarEstado(0, 'Ultima Orden')">Ultima Orden</a></li>
                                        <?php foreach ($estadoVehi as $estado) { ?>
                                            <li><a class="dropdown-item" onclick="filtrarEstado(<?= $estado['id'] ?>, '<?= $estado['nombre'] ?>')"><?= $estado['nombre'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body px-6 p-0">

                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div>
                                        <img src="<?= base_url('img/orden-servicio-b.png') ?>" alt="logo ordenes de servicio" width="40" class="img-card">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h4 id="n-orden" style="margin: 0;"><?= $countOrden['n_orden'] ?></h4>
                                        &nbsp;
                                        <small id="placa" class="text-black-50" style="margin: 0;"><?= $countOrden['placa'] ?></small>
                                    </div>
                                </div>
                                <small class=" d-flex text-end"><a style="width: 90%;" href="<?= base_url('ordenServicio') ?>" title="Ver Más">Ver más</a></small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <!-- USUARIOS DEL SISTEMA -->
                        <div class="card py-2" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 10%); border-radius:20px; width: 300px;">
                            <div class="header-card">
                                <h5 class="fs-6">Usuarios | <span id="tituloUsuarios"> Todos </span></h5>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true" title="Filtrar Trabajadores"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-popper-placement="bottom-end">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item" onclick="filtrarRol(0, 'Todos')">Todos</a></li>
                                        <?php foreach ($roles as $rol) { ?>
                                            <li><a class="dropdown-item" onclick="filtrarRol(<?= $rol['id_rol'] ?>, '<?= $rol['nombre'] ?>')"><?= $rol['nombre'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body px-6 p-0">
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div>
                                        <img src="<?= base_url('img/usuarioS-n.png') ?>" alt="logo ordenes de servicio" width="40" class="img-card">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h4 id="n-usuario" style="margin: 0;"><?= $countUsuario['n_usuario'] ?></h4>
                                    </div>
                                </div>
                                <small class=" d-flex text-end"><a style="width: 90%;" href="<?= base_url('usuarios') ?>" title="Ver Más">Ver más</a></small>
                            </div>
                        </div>
                        <!-- VEHICULOS -->
                        <div class="card py-2" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 10%); border-radius:20px; width: 300px;">
                            <div class="header-card">
                                <h5 class="fs-6">Vehiculos | <span id="tituloVehiculos"> Todos </span></h5>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true" title="Filtrar Trabajadores"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-popper-placement="bottom-end">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item" onclick="filtrarMarca(0, 'Todos')">Todos</a></li>
                                        <?php foreach ($marcas as $marca) { ?>
                                            <li><a class="dropdown-item" onclick="filtrarMarca(<?= $marca['id_marca'] ?>, '<?= $marca['nombre'] ?>')"><?= $marca['nombre'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body px-6 p-0">
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div>
                                        <img src="<?= base_url('img/vehiculo-b.png') ?>" alt="logo ordenes de servicio" width="40" class="img-card">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h4 id="n-vehi" style="margin: 0;"><?= $countVehi['n_vehi'] ?></h4>
                                    </div>
                                </div>
                                <small class=" d-flex text-end"><a style="width: 90%;" href="<?= base_url('vehiculos') ?>" title="Ver Más">Ver más</a></small>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="d-flex card-info gap-2">
                        <!-- INSUMOS -->
                        <div class="card py-2" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 10%); border-radius:20px; width: 300px;">
                            <div class="header-card">
                                <h5 class="fs-6">Insumos | <span id="tituloInsumos"> Todos </span></h5>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true" title="Filtrar Trabajadores"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-popper-placement="bottom-end">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item" onclick="filtrarInsumos(0, 'Todos')">Todos</a></li>
                                        <?php foreach ($categorias as $categoria) { ?>
                                            <li><a class="dropdown-item" onclick="filtrarInsumos(<?= $categoria['id_param_det'] ?>, '<?= $categoria['nombre'] ?>')"><?= $categoria['nombre'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body px-6 p-0">
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div>
                                        <img src="<?= base_url('img/insumos.png') ?>" alt="logo ordenes de servicio" width="40" class="img-card">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h4 id="n-insumos" style="margin: 0;"><?= $countInsumo['n_material'] ?></h4>
                                    </div>
                                </div>
                                <small class=" d-flex text-end"><a style="width: 90%;" href="<?= base_url('vehiculos') ?>" title="Ver Más">Ver más</a></small>
                            </div>
                        </div>
                        <!-- REPUESTOS -->
                        <div class="card py-2" style="box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 10%); border-radius:20px; width: 300px;">
                            <div class="header-card">
                                <h5 class="fs-6">Repuestos | <span id="tituloRepuestos"> Todos </span></h5>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="true" title="Filtrar Trabajadores"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow " data-popper-placement="bottom-end">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item" onclick="filtrarRepuestos(0, 'Todos')">Todos</a></li>
                                        <?php foreach ($estantes as $estante) { ?>
                                            <li><a class="dropdown-item" onclick="filtrarRepuestos(<?= $estante['id'] ?>, '<?= $estante['nombre'] ?>')"><?= $estante['nombre'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body px-6 p-0">
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <div>
                                        <img src="<?= base_url('img/repuestos-b.png') ?>" alt="logo ordenes de servicio" width="40" class="img-card">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h4 id="n-repuestos" style="margin: 0;"><?= $countRepuestos['n_material'] ?></h4>
                                    </div>
                                </div>
                                <small class=" d-flex text-end"><a style="width: 90%;" href="<?= base_url('vehiculos') ?>" title="Ver Más">Ver más</a></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="info-user tel-correo flex-column p-2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#telefonos" role="tab" aria-controls="profile" aria-selected="false">Telefonos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#correos" role="tab" aria-controls="profile" aria-selected="false">Correos</a>
                </li>
            </ul>
            <div class="w-100">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="telefonos" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-perfil p-4">
                            <table class="table table-borderless table-sm table-hover" style="border:none;margin:0;">
                                <thead>
                                    <tr class="table-secondary">
                                        <th scope="col" class="text-center">Numero</th>
                                        <th scope="col" class="text-center">Tipo</th>
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
                                                <?= $tel['tipo'] == '3' ? 'Celular' : 'Fijo' ?>
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
                        <div class="table-responsive p-4">
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
                </div>
            </div>
        </div>
        <div class="info-permiso px-2 py-3">
            <h3>Permisos del Sistema - <span id="cargo"><?= $usuario['nombre_rol'] ?></span></h3>
            <ul>
                <?php foreach ($permisos as $permiso) { ?>
                    <li><?= $permiso['nombre'] ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
</div>

<!-- CAMBIAR CONTRASEÑA -->
<form autocomplete="off" id="formularioContraseñas">
    <div class="modal fade" id="cambiarContra" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header flex justify-content-between align-items-center">
                        <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                        <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/restorePass.png') ?>" alt="" width="30" height="30"> Restablecer
                            Contraseña</h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('contraRes', 'confirContraRes', 'idUsuario')">X</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idUsuario" id="idUsuario">
                        <div class="container p-4" style="background-color: #dfe6f2;border-radius:10px;">
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%" id="divContras">
                                    <label id="labelNom" for="nombres" class="col-form-label"> Contraseña:
                                    </label>
                                    <div class="flex">
                                        <input type="password" name="contraRes" class="form-control" id="contraRes" minlength="5">
                                        <small class="normal">¡La contraseña debe contar con un minimo de 6
                                            caracteres!</small>
                                    </div>
                                    <div class="form-check" style="margin-top: 10px;">
                                        <input class="form-check-input" type="checkbox" value="" id="verModal" onchange="verContrasena()">
                                        <label class="form-check-label" for="verModal">
                                            Ver Contraseña
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%" id="divContras2">
                                    <div>
                                        <label for="nombres" class="col-form-label">Confirmar Contraseña:</label>
                                        <input type="password" name="confirContraRes" class="form-control" id="confirContraRes" minlength="5">
                                    </div>
                                    <small id="msgConfirRes" class="normal"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('contraRes', 'confirContraRes')">Cerrar</button>
                        <input type="submit" class="btn btnRedireccion" value="Actualizar" id="btnActuContra"></input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- -------------------modal------------------------- -->
<form method="POST" id="formularioPerfil" autocomplete="off">
    <div class="modal fade" id="editarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="body-R" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header flex align-items-center gap-3">
                        <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png') ?>" width="100" />

                        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                            <img id="logoModal" src="<?= base_url('img/editar.png') ?>" alt="icon-plus" width="20">
                            <h1 class="modal-title fs-5" id="tituloModal"> Editar</h1>
                        </div>

                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" for="recipient-name" style="margin:0;">Primer Nombre:</label>
                                    <input class="form-control" type="text" min='1' max='300' id="nombreP" name="nombreP">
                                    <input id="id" name="id" hidden>
                                    <input type="text" name="tp" id="tp" hidden>

                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Segundo Nombre:</label>
                                    <input class="form-control" id="nombreS" name="nombreS"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Primer Apellido:</label>
                                    <input class="form-control" id="apellidoP" name="apellidoP"></input>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Segundo Apellido:</label>
                                    <input class="form-control" id="apellidoS" name="apellidoS"></input>
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

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombres" id="FotoUsuario" class="col-form-label">Foto de Usuario:</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept="image/png">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnRedireccion" id="btnGuardar">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // variables
    var inputIden = 0;
    var validIdent = true;
    var res

    // foto perfil
    var foto = '<?= base_url('usuarios/mostrarImagen/') . $usuario['id_usuario'] ?>';
    $('#fotoPerfil').attr('src', `${foto}`)

    function limpiarCampos() {
        $('#msgConfirRes').text('')
        $('#msgConfir').text('')
        $('#msgDoc').text('')
    }

    function editarCampos(id, tp) {
        //Actualizar datos
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + 0,
                dataType: 'json',
            }).done(function(res) {
                $('#tp').val(2)
                $('#id').val(res[0]['id_usuario'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#nIdenti').val(res[0]['n_identificacion'])
                $('#msgDoc').text('')
                console.log(res)
            })
        }
    }
    $('#formularioPerfil').on('submit', function(e) {
        e.preventDefault()
        id = $('#id').val()
        tp = $('#tp').val()
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        console.log({
            id,
            tp,
            nombreP,
            nombreS,
            apellidoP,
            apellidoS,
            tipoDoc,
            nIdenti
        })
        if ([nombreP, apellidoP, apellidoS, tipoDoc, nIdenti].includes('') || validIdent == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            var formData = new FormData();
            formData.append('id', id);
            formData.append('tp', tp);
            formData.append('nombreP', nombreP);
            formData.append('nombreS', nombreS);
            formData.append('apellidoP', apellidoP);
            formData.append('apellidoS', apellidoS);
            formData.append('tipoDoc', tipoDoc);
            formData.append('nIdenti', nIdenti);
            formData.append('rol', '<?= session('idRol') ?>');
            formData.append('foto', $('#foto')[0].files[0]);
            $.ajax({
                url: '<?php echo base_url('usuarios/insertar') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false, // Importante: desactiva el tipo de contenido predeterminado
                processData: false, // Importante: no proceses los datos
                success: function(idUser) {
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Usuario!')
                        validIdent = true
                    }
                }
            }).done(function(data) {
                $("#editarPerfil").modal('hide');
                location.reload();
            })
        }
    })
    // ---------------------------validaciones---------------------------
    //Funcion para buscar cliente segun su identificacion
    function buscarUsuarioIdent(id, inputIden) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputIden,
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
    //Identificar si el numero de identificacion no este registrado
    $('#nIdenti').on('input', function(e) {
        inputIden = $('#nIdenti').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputIden,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['n_identificacion'] == inputIden) {
                        $('#msgDoc').text('')
                        validIdent = true
                    } else {
                        buscarUsuarioIdent(0, inputIden)
                    }
                }
            })
        }
    })
    // -----------contrassss y su validacion----------------
    //Ver contraseñas
    function verContrasena() {
        var check, password;
        password = document.getElementById("contraRes");
        password2 = document.getElementById("confirContraRes");
        check = document.getElementById("verModal");
        if (check.checked == true) // Si la checkbox de mostrar contraseña está activada
        {
            password.type = "text";
            password2.type = "text";
        } else // Si no está activada 
        {
            password.type = "password";
            password2.type = "password";
        }
    }
    //Verificacion de contraseñas
    function verifiContra(tipo, inputMsg, inputContra, inputConfir) {
        input = $(`#${inputMsg}`)
        contra = $(`#${inputContra}`).val()
        confirContra = $(`#${inputConfir}`).val()
        if (tipo == 2) {
            if (contra == '' && confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (contra == confirContra) {
                input.text('¡Contraseñas valida!').removeClass().addClass('valido')

            } else if (contra == '') {
                input.text('¡Ingrese una contraseña!').removeClass().addClass('normal')

            } else if (confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (contra != confirContra) {
                return input.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        } else {
            if (contra == '' && confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (contra == '' && confirContra) {
                input.text('¡Ingrese una contraseña!').removeClass().addClass('normal')

            } else if (confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (confirContra && contra == confirContra) {
                input.text('¡Contraseñas valida!').removeClass().addClass('valido')

            } else if (confirContra && contra != confirContra) {
                return input.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        }
    }
    $('#confirContraRes').on('input', function(e) {
        verifiContra(2, 'msgConfirRes', 'contraRes', 'confirContraRes')
    })
    $('#contraRes').on('input', function(e) {
        verifiContra(1, 'msgConfirRes', 'contraRes', 'confirContraRes')
    })
    //Funcion para cambiar contraseña
    $('#btnActuContra').on('click', function(e) {
        e.preventDefault()
        idUsuario = "<?= session('id') ?>"
        contra = $("#contraRes").val()
        contraConfir = $("#confirContraRes").val()

        if ([contra, contraConfir].includes('') || contra != contraConfir) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?= base_url('usuarios/cambiarContrasena') ?>',
                data: {
                    idUsuario,
                    contra,
                    contraConfir,
                    // rol: '< ?= session('idRol') ?>'
                },
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                limpiarCampos('msgConfirRes')
                if (data == 2) {
                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                } else {
                    return mostrarMensaje('success', '¡Se ha actualizado su contraseña!')
                    // const informacion = {
                    //     usuario: '',
                    //     contrasena: ''
                    // };
                    // localStorage.setItem("usuario", JSON.stringify(informacion));
                    // $.ajax({
                    //     type: 'POST',
                    //     url: '< ?= base_url('usuarios/salir') ?>',
                    //     dataType: 'json',
                    //     success: function(data) {
                    //         if (data == 1) {
                    //             window.location.href = '< ?= base_url('') ?>'
                    //         }
                    //     }
                    // })
                }
            })
        }
    })
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

    function filtrarCargo(id, nombre) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('trabajadores/contadorTrabajadores') ?>',
            data: {
                id
            },
            dataType: 'json',
            success: function(res) {
                $('#cargo').text(nombre)
                $('#n-trabajadores').text(res.n_trabajador)
            }
        })
    }

    function filtrarEstado(id, nombre) {
        if (id == 0) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('ordenServicio/obtenerUltimaOrden') ?>',
                data: {},
                dataType: 'json',
                success: function(res) {
                    $('#tituloOrden').text(nombre)
                    $('#n-orden').text(res.n_orden)
                    $('#placa').text(res.placa)
                }
            })
        } else {

            $.ajax({
                type: 'POST',
                url: '<?= base_url('ordenServicio/contadorOrdenes') ?>',
                data: {
                    id
                },
                dataType: 'json',
                success: function(res) {
                    $('#tituloOrden').text(nombre)
                    $('#n-orden').text(res.n_ordenes)
                    $('#placa').text('')
                }
            })
        }
    }

    function filtrarRol(id, nombre) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('usuarios/contadorUsuarios') ?>',
            data: {
                id
            },
            dataType: 'json',
            success: function(res) {
                $('#tituloUsuarios').text(nombre)
                $('#n-usuario').text(res.n_usuario)
            }
        })
    }

    function filtrarMarca(id, nombre) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('vehiculos/contadorVehiculos') ?>',
            data: {
                id
            },
            dataType: 'json',
            success: function(res) {
                $('#tituloVehiculos').text(nombre)
                $('#n-vehi').text(res.n_vehi)
            }
        })
    }
    function filtrarInsumos(id, nombre) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('insumos/contadorInsumos') ?>',
            data: {
                id
            },
            dataType: 'json',
            success: function(res) {
                $('#tituloInsumos').text(nombre)
                $('#n-insumos').text(res.n_material)
            }
        })
    }
    function filtrarRepuestos(id, nombre) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('insumos/contadorRepuestos') ?>',
            data: {
                id
            },
            dataType: 'json',
            success: function(res) {
                $('#tituloRepuestos').text(nombre)
                $('#n-repuestos').text(res.n_material)
            }
        })
    }
</script>