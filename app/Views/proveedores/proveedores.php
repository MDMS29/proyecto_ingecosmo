<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>" /> Proveedores</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php foreach ($proveedores as $p) { ?> 
                <tr>
                    <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                    <td class="text-center"><?php echo $p['id_tercero']; ?></td>
                    <td class="text-center"><?php echo $p['razon_social']; ?></td>
                    <td class="text-center"><?php echo $p['direccion']; ?></td>
                    <td class="text-center">

                    </td>
                </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>

</div>