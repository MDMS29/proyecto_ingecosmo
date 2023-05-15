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
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] . ' ' . $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?>
                        </h5>
                        <h6>
                            Wayando
                        </h6>
                        <p class="profile-ranting" style="opacity: 0;">3</p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#telefonos" role="tab" aria-controls="profile" aria-selected="false">Telefonos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#correos" role="tab" aria-controls="profile" aria-selected="false">Correos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Permisos</p>
                        <p>Podrás ver los Trabajadores, Clientes, Materiales, Vehículos y Proveedores, tendrás el poder de agregar, editar y eliminar cualquiera de sus datos almacenados.</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Id Usuario</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $usuario['id_usuario'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombres</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s']  ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Apellidos</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tipo Documento</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $usuario['tipo_Documento']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>N° Documento</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $usuario['n_identificacion']?></p>
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
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>