<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<div id="content" class="p-4 p-md-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div>
            <div class="card shadow">
                <div class="rounded-top text-white d-flex flex-row" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1)), url('<?= base_url('img/ingecosmo.png') ?>'); background-position: center;background-repeat:no-repeat;position: relative;height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;background-color: transparent;border-radius: 50%;">
                        <img src="<?php echo base_url('/img/usuario.png') ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mb-2" style="width: 150px;1;background-color: black;border:1px solid black;border-radius: 50%;">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center p-4 text-black" style="background-color: #f8f9fa;">
                    <div class="d-flex">
                        <h4 class="fw-bolder"><?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] . ' ' . $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?></h4>
                    </div>
                    <div class="d-flex text-center py-1">
                        <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">
                            Editar perfil
                        </button>
                    </div>
                </div>
                <div class="card-body p-4 text-black">
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        <div class="flex-grow-1 ">
                            <p class="lead fw-normal mb-1">Telefonos:</p>
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
                                                    <?= $tel['prioridad'] == 'P' ? 'Primario' : 'Secundario' ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-5 flex-grow-1">
                            <p class="lead fw-normal mb-1">Emails:</p>
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
                                                    <?= $correo['prioridad'] == 'P' ? 'Primario' : 'Secundario' ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0">Recent photos</p>
                        <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-2">
                            <img src="" alt="image 1" class="w-100 rounded-3">
                        </div>
                        <div class="col mb-2">
                            <img src="" alt="image 1" class="w-100 rounded-3">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <img src="" alt="image 1" class="w-100 rounded-3">
                        </div>
                        <div class="col">
                            <img src="" alt="image 1" class="w-100 rounded-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>