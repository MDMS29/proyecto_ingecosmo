<link rel="stylesheet" href="<?php echo base_url('css/estanteria.css') ?>">
<div id="content" class="p-4 p-md-5">
    <div class="estanteria">
        <h1 class="titulo"><img class="logo1" src="<?php echo base_url('/img/estante-b.png'); ?>">ORGANIZACIÓN Y ESTANTERIA</h1>

        <div class="contenedorE">
            <div class="contenidoCardE">
                <?php foreach ($estantes as $dato) { ?>
                    <div class="card1">
                        <div class="imagenes">
                            <img class="iconos" src="<?php echo base_url('/img/') . $dato['n_iconos'] ?>">
                        </div>
                        <div class="textoCard">
                            <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:21px; color:black; margin-bottom:0"><?php echo  $dato['n1'] . " " . $dato['nombre'] ?></h5>
                            <div class="bloqueTextoE" id="<?= $dato['id'] ?>">
                                <p class="subTexto">
                                    <span id="contador">
                                        <!-- CONTADOR DINAMICO -->
                                    </span>
                                </p>
                            </div>
                            <a onclick="redireccion(<?php echo $dato['id'] ?>, <?php echo $dato['tipo_estante'] ?>)" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver fila</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
    <div class="bloqueFooter">
        <div class="footer-page">
            <!-- <button class="btn btnRedireccion" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus" width="20"><img src="< ?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button> -->

            <a class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/home'); ?>"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</a>
        </div>
    </div>

</div>


<form enctype="multipart/form-data" autocomplete="off" id="agregarEstante">
    <div class="modal fade" id="estanteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="body">

                <div class="modal-content" style="border:5px solid #161666; border-radius:10px;">
                    <div class="modal-header" id="modalHeader">

                        <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">
                        <div class="tituloHeader">
                            <img class="imgAgregar" src="<?php echo base_url('/img/agregar11.png') ?>" />
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:40px;">Agregar estante</h1>
                        </div>
                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body d-flex ">
                        <form>
                            <div class=" column-gap-3" style="width: 100%; padding-inline: 15px;">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" for="recipient-name" style="margin:0; font-size:17px;">Nombre:</label>
                                    <input class="form-control" type="text" min='1' max='300' id="nombre" name="nombre">
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0; font-size:17px;" for="message-text">Filas:</label>
                                    <input class="form-control" id="fila" name="fila" type="number">
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0; font-size:17px;" for="message-text">Imagen:</label>

                                    <img src="<?php echo base_url() . '' ?> " class="logo" width="100">
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"></input>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnCerrar" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnGuardar1" id="btnGuardar">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    cards = $('.bloqueTextoE')
    for (let i = 0; i < cards.length; i++) {
        $.ajax({
            url: '<?= base_url('filas/contadorArticulos') ?>',
            type: 'POST',
            data: {
                idEstante: cards[i].id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $(`#${cards[i].id} #contador`).text(data.length == 0 ? 'No tiene materiales' : 'Tiene ' + data[0]?.numeroArt + ' materiales')
            }
        })
    };

    $('#agregarEstante').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('imagen', $('#imagen')[0].files[0]); // Obtener el archivo seleccionado

        $.ajax({
            url: "<?php echo base_url('/estanteria/insertar'); ?>",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Evitar que jQuery procese los datos
            contentType: false, // Evitar que jQuery establezca el tipo de contenido
            success: function(res) {
                if (res == 1) {
                    mostrarMensaje('success', '¡Se ha guardado el estante!');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }
            }
        });
    });


    async function redireccion(id, tipo) {
        let tipos = {
            60: "Estante",
            61: "Bodega"
        }
        let resultados = 0;

        try {
            const res = await $.ajax({
                url: "<?php echo base_url('/filas/filasEstante/') ?>" + id,
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false
            });

            for (const fila of res) {
                const response = await $.ajax({
                    url: "<?php echo base_url('/filas/obtenerMaterialesFila/') ?>" + fila.numeroFila,
                    type: 'POST',
                    dataType: 'json',
                    processData: false,
                    contentType: false
                });

                if (response.length > 0) {
                    resultados += 1;
                }
            }

            console.log(resultados);

            if (resultados == 0) {
                return mostrarMensaje('warning', `¡${tipos[tipo]} sin materiales!`);
            }

            if (resultados != 0) {
                const finalRes = await $.ajax({
                    url: "<?php echo base_url('/filas/materialesEstante/') ?>" + id,
                    type: 'POST',
                    dataType: 'json',
                    processData: false,
                    contentType: false
                });
                window.location.href = "<?php echo base_url('filas/mostrarFila/') ?>" + id;
                // }
            }
        } catch (error) {
            // Manejar el error aquí
            console.error(error);
        }
    }
</script>