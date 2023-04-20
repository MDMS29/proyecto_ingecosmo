<div id="content" class="p-4 p-md-5">
    <h2 class="text-center"><span class="fa fa-user"></span> Usuarios del Sistema</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;">
        <table class="table table-bordered table-sm table-striped table-hover" id="tablePaises" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Rol</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                        <td class="text-center"><?= $d['nombre_p'] . ' ' . $d['nombre_s'] ?></td>
                        <td class="text-center"><?= $d['apellido_p'] . ' ' . $d['apellido_s'] ?></td>
                        <td class="text-center"><?= $d['doc_res'] ?></td>
                        <td class="text-center"><?= $d['n_identificacion'] ?></td>
                        <td class="text-center"><?= $d['nombre_rol'] ?></td>
                        <td class="text-center">
                            <a class="btn"><img src="<?php echo base_url('icons/edit.svg')?>" alt="Boton Editar" title="Editar Usuario"></a>
                            <a class="btn"><img src="<?php echo base_url('icons/delete.svg')?>" alt="Boton Eliminar" title="Eliminar Usuario"></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>