<link rel="stylesheet" href="<?php echo base_url("css/principal/home.css") ?>">
</link>


<div id="content" class="p-4 p-md-5">
    <div class="contenedor2">
        <div class="contenido1">
            <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                <img class="logo-admin" src="<?php echo base_url('/img/logo-admin.png'); ?>">
                <label class="titulo-home">INGECOSMOS</label>
                <p class="texto-home">En Ingecosmos tenemos la mejor calidad y garantía para fidelizar a cada uno de
                    nuestros clientes.
                    En este programa se podrá ver los Trabajadores, Clientes, Materiales, Vehículos y Proveedores, tendrá el
                    poder de agregar, editar y eliminar cualquiera de sus datos almacenados.</p>
            <?php } ?>

            <?php if (session('idRol') == 3) { ?>
                <img class="logo-admin" src="<?php echo base_url('/img/logo-almacenista.png'); ?>">
                <label class="titulo-home">INGECOSMOS</label>
                <p class="texto-home">En Ingecosmos tenemos la mejor calidad y garantía para fidelizar a cada uno de
                    nuestros clientes.
                    En este programa podrás ver los Insumos y Repuestos, Historial, Organizacion y Estanteria, Carrito para el uso de materiales, tendrá el poder de
                    agregar y usar Materiales y verlos reflejados en el carrito, cambiar materiales de fila, ver la ubicacion de los productos en los estantes. </p>
            <?php } ?>
        </div>

        <div class="contenido2" >
            <img src="<?php echo base_url('/img/carrusel-home1.jpg'); ?>" class="imgHome" alt="Image Ingecosmo">
        </div>
    </div>
</div>