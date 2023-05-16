<head>
        <link rel="stylesheet" href="<?php echo base_url("css/principal/home.css") ?>">
</head>

<div id="content" class="p-4 p-md-5">
    <div class="contenedor2">
        <div class="contenido1">
            <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
            <img class="logo-admin" src="<?php echo base_url('/img/logo-admin.png'); ?>">
            <label class="titulo-home">INGECOSMOS</label>
            <p class="texto-home">En Ingecosmos tenemos la mejor calidad y garantía para fidelizar a cada uno de
                nuestros clientes.
                En este programa se podrá ver los Trabajadores, Clientes, Materiales, Vehículos y Proveedores, tendrá el
                poder de agregar, editar y eliminar cualquiera de sus datos almacenados</p>
            <?php } ?>

            <?php if (session('idRol') ==3) { ?>
            <img class="logo-admin" src="<?php echo base_url('/img/logo-almacenista.png'); ?>">
            <label class="titulo-home">INGECOSMOS</label>
            <p class="texto-home">En Ingecosmos tenemos la mejor calidad y garantía para fidelizar a cada uno de
                nuestros clientes.
                En este programa podrás ver los Insumos, Historial, Organizacion y Estanteria, tendrá el poder de
                agregar, editar y eliminar cualquiera de sus datos almacenados </p>
            <?php } ?>
        </div>

        <div class="contenido2">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo base_url('/img/carrusel-home1.jpg'); ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>