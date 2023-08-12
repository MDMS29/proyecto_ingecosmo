<link rel="stylesheet" href="<?php echo base_url('css/estanteria.css') ?>">
<div id="content" class="p-4 p-md-5">
    <div class="estanteria">
        <!-- <div class="card">
            <div class="card__image">
                <div class="ima">
                    <img src="< ?php echo base_url('/img/fotoSeccion/rueda.png') ?>">
                </div>
            </div>
            <div class="card__content">
                <p class="card__title">Card Title</p>
                <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <a class="card__content" href="#">Ver mas</a>
            </div>
        </div> -->

        <div class="verFilas" id="verFilas">

            <h1 class="titulo" style="text-transform:uppercase;">ESTANTERIA DE <?php echo $titulo['nombre'] ?></h1>
        </div>

        <div class="contenedorE">
            <div class="contenidoCardF">

                <?php if (empty($data)) { ?>

                    <div class="contenidoCardF" style="min-width: 400px;">
                        <p>No se encuentran filas - <?php echo $titulo['nombre'] ?></p>
                    </div>
                <?php } else { ?>
                    <?php foreach ($data as $dato) { ?>

                        <input type="hidden" name="categoria" id="categoria" value="<?= $dato['id_estante'] ?>">
                        <div class="card2">
                            <div class="imagenes">
                                <img class="iconos" src="<?php echo base_url('/img/fotoSeccion/') . $dato['iconoF'] ?>">
                            </div>
                            <div class="Isabella">
                                <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black; margin-bottom:0; margin-left:30px; padding-top: 10px;">Sección <?php echo $dato['nombre']; ?></h5>
                                <div class="textoFilaF" id="Contenedor">
                                    <div class="bloque1">

                                        <input id='nombreFila' value="<?php echo $dato['id_fila']; ?>" hidden>
                                        <div class="bloqueTextoEF" id="<?php echo $dato['id_fila']; ?>">
                                        </div>
                                        <!-- INFORMACION DINAMICA -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="bloqueFooter">
            <div class="footer-page">
                <button class="btn btnAccionF" data-bs-target="#seccionModal" data-bs-toggle="modal" alt="icon-plus" width="20"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
                <a class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/estanteria'); ?>"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</a>
            </div>
        </div>
    </div>
</div>

<form enctype="multipart/form-data" autocomplete="off" id="agregarSeccion">
    <div class="modal fade" id="seccionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="body">

                <div class="modal-content" style="border:5px solid #161666; border-radius:10px;">
                    <div class="modal-header" id="modalHeader">

                        <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">
                        <div class="tituloHeader d-flex">
                            <img class="imgAgregar" src="<?php echo base_url('/img/agregar11.png') ?>" />
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:20px;">Agregar sección</h1>
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
                                    <label class="col-form-label" style="margin:0; font-size:17px;" for="message-text">Imagen:</label>

                                    <img src="<?php echo base_url() . '' ?> " class="logo" width="100">
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*"></input>
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

<!-- MODAL DETALLES -->
<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <input type="text" name="id" id="id" hidden>
        <input type="text" name="tp" id="tp" hidden>

        <div class="modal-content" style="border: 5px solid #161666;">

            <div class="modal-header flex justify-content-between align-items-center w-100">
                <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
                <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                    <img src="<?= base_url('img/MasDetalles2.png') ?>" width="30" height="30" style="margin-right: 5px;" />
                    <h1 class="modal-title fs-5 text-center" id="tituloModal">Detalles</h1>
                </div>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <div class="modal-body w-100">

                <div class="d-flex column-gap-3" style="width: 100%">
                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="" disabled>
                        <small id="msgEditar" class="invalido3"></small>
                    </div>

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Proveedor:</label>
                        <div class="input-group mb-3">

                            <input class="form-control" type="text" id="proveedor1" name="proveedor1" disabled>
                        </div>
                    </div>
                </div>

                <div class="d-flex column-gap-3" style="width: 100%">
                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Cantidad:</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="cantidad1" name="Cantidad" disabled>
                        </div>
                    </div>

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Orden de trabajo:</label>
                        <input type="text" class="form-control" id="ordenTrabajo1" name="ordenTrabajo" placeholder="" disabled>
                    </div>
                </div>


                <div class="d-flex column-gap-3" style="width: 100%">

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Placa:</label>
                        <input type="text" class="form-control" id="placa1" name="placa" placeholder="" disabled>
                    </div>

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Bodega:</label>
                        <input type="text" class="form-control" id="bodega1" name="bodega" placeholder="" disabled>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btnCerrar" data-bs-toggle="modal" onclick="limpiarCampos()" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
                    <!-- <button type="button" class="btn btnEditar" id="btnEditar" onclick="habilitar()">Editar</button> -->
                </div>
            </div>

        </div>
    </div>
</div>

<!-- MODAL USAR-->
<div class="modal fade" id="usarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="formularioUsar" autocomplete="off">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content" id="modalContentUsar">

                <div class="modal-header flex justify-content-between align-items-center w-100">
                    <input type="text" name="idMaterial" id="idMaterial" hidden>
                    <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img src="<?= base_url('img/usarlogo.png') ?>" width="30" height="30" style="margin-right: 5px;" />
                        <h1 class="modal-title fs-5 text-center" id="tituloModal">Usar Repuesto</h1>
                    </div>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>


                <div class="modal-body" id="modalBodyUsar">

                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Nombre del repuesto:</label>
                            <input class="form-control" id="nombreRepuesto" name="nomRepuesto" placeholder="" disabled>
                        </div>

                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Proveedor:</label>
                            <input class="form-control" id="proveedor2" name="proveedor" placeholder="" disabled>
                        </div>
                    </div>

                    <div class="d-flex column-gap-3" style="width: 100%">

                        <div class="mb-3" style="width: 50%;">
                            <label for="exampleDataList" class="col-form-label">Orden de trabajo:</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" id="ordenTrabajo2" name="ordenTrabajo" disabled>
                            </div>
                        </div>

                        <div class="mb-3" style="width: 50%;">
                            <label for="exampleDataList" class="col-form-label">Placa:</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" id="placa2" name="placa" disabled>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex column-gap-3" style="width: 100%">

                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Cantidad existente:</label>
                            <div>
                                <input type="number" class="form-control" id="cantidadExistente" name="cantidadExistente" onInput="validarInput()" placeholder="" disabled>
                            </div>
                        </div>

                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Cantidad a Usar: <i style="color:crimson">*</i></label>
                            <div>
                                <input type="text" class="form-control" id="cantidadUsar" name="cantidadUsar" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/,'')">
                                <small id="msgUsar" class="invalido"></small>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                    <button type="button" class="btn btnCerrar" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btnAccionF" id="btnValidar"><img src="<?= base_url('img/orden-entrega.png') ?>" alt="icon-plus" width="20">Agregar a
                        orden</button>


                </div>
            </div>
        </div>
    </form>
</div>



<script>
    bloque = $('.bloqueTextoEF')
    for (let i = 0; i < bloque.length; i++) {
        let fila = $(`#${bloque[i].id}`)
        fila = fila[0].id
        console.log(fila + "hi");
        $.ajax({
            url: '<?php echo base_url('filas/obtenerMaterialesFila/') ?>' + fila,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                var cadena = ""
                var vacio = ""
                console.log(res);
                if (res.length == 0) {
                    cadena += `
                    <div class="textoVacio " style="color: #000000; font-size:15px; margin-left: 60px; display:flex; justify-content:center;  align-items:center; flex-direction:column;">
                    <i class="bi bi-exclamation-circle" style="color:#fab83c; font-size:25px;"></i>
                    <p> ¡No hay materiales en la fila! </p> 
                    </div>`;
                    $(`#${bloque[i].id}`).html(cadena)

                } else {
                    for (let i = 0; i < res.length; i++) {
                        cadena += `
                        <div class="sumary-flex">
                    <p class="subTexto">
                   
                    <button onclick="detallesMaterial(${res[i].id_material})" class="verMas" style="background: transparent; border:transparent;">${res[i].nombre}</button>
                    

                    </p>
                    </div>`;
                    }
                    $(`#${bloque[i].id}`).html(cadena)
                    console.log("first")
                }
            }
        })
    }

    // $.ajax({
    //     url: '< ?php echo base_url('filas/obtenerMaterialesFila/') ?>' + fila,
    //     type: 'POST',
    //     dataType: 'json',
    // })

    function detallesMaterial(id_material) {
        $('#btnUsar1').attr('onclick', `usarMaterial(${id_material},2)`)

        dataURL = "<?php echo base_url('/materiales/detallesRepuesto'); ?>" + "/" + id_material;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                console.log(rs)
                $('#detallesModal').modal('show')
                $("#titulo").text('Detalles');
                $("#idMaterial").val(rs[0]['id_material']);
                $("#nombre1").val(rs[0]['nombre']);
                $("#proveedor1").val(rs[0]['nomProveedor']);
                $("#cantidad1").val(Number(rs[0]['cantidad_actual']));
                $("#ordenTrabajo1").val(rs[0]['numOrden']);
                $("#placa1").val(rs[0]['placaVeh']);
                $("#bodega1").val(rs[0]['bodega']);
            }
        })
    }

    function usarMaterial(id_material) {
        dataURL = "<?php echo base_url('/materiales/usarRepuesto'); ?>" + "/" + id_material;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                $("#idMaterial").val(rs[0]['id_material']);
                $("#nombreRepuesto").val(rs[0]['nombre']);
                $("#proveedor2").val(rs[0]['nomProveedor']);
                $("#ordenTrabajo2").val(rs[0]['numOrden']);
                $("#placa2").val(rs[0]['placaVeh']);
                $("#cantidadExistente").val(rs[0]['cantidad_actual']);
            }
        })
    }

    // operaciones con el input usar
    $('#cantidadUsar').on('input', function(e) {
        idMaterial = $("#idMaterial").val()
        cantidad = $('#cantidadUsar').val()
        cantidadExistente = $('#cantidadExistente').val()
        if (parseInt(cantidad) > parseInt(cantidadExistente)) {
            $('#msgUsar').text(' *Valor invalido*')
            $("#btnValidar").attr('disabled', '');
            validUsar = false
            // $('#subtotal').val(0)
        } else {
            $('#msgUsar').text('')
            validUsar = true
            // $('#subtotal').val(cantidad * valorVenta)
        }
    })

    $("#formularioUsar").on("submit", function(e) {
        e.preventDefault()

        idMaterial = $("#idMaterial").val()
        cantidadExistente = $("#cantidadExistente").val()
        cantidad = $("#cantidadUsar").val()
        ordenTrabajo = $("#ordenTrabajo").val()
        placa = $("#placa").val()
        idCategoria = $("#idCategoria").val()

        if ([cantidad].includes("")) {
            return mostrarMensaje('error', '¡Campos Vacios!')
        }

        console.log(idMaterial)
        obj = {
            idMaterial,
            cantidadExistente,
            cantidad,
            placa,
            ordenTrabajo
        }
        console.table(obj);

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('repuestos/usar') ?>",
            data: {
                idMaterial,
                cantidadExistente,
                cantidad,
                placa,
                ordenTrabajo
            },
            dataType: "json",
            success: function(data) {
                if (data == 1) {
                    mostrarMensaje('success', '¡Repuesto usado con exito!')
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000)
                } else {
                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                }
            }
        });


    })

    $("#agregarSeccion").on("submit", function(e) {
        e.preventDefault()
        nombreSeccion = $("#nombre").val()
        idBodega = $("#categoria").val()
        if ([nombreSeccion].includes("")) {
            return Swal.fire({
                position: "center",
                icon: "error",
                text: "¡Campos Vacios!",
                showConfirmButton: false,
                timer: 1000
            })
        }
        var formData = new FormData();
        formData.append('idBodega', idBodega);
        formData.append('nombreSeccion', nombreSeccion);
        formData.append('foto', $('#foto')[0].files[0]);
        $.ajax({
            url: '<?php echo base_url('filas/insertarSeccion') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false, // Importante: desactiva el tipo de contenido predeterminado
            processData: false, // Importante: no proceses los datos

        }).done(function(data) {
            console.log(data)
            mostrarMensaje('success', '¡Se agrego la sección!');
            setTimeout(() => {
                window.location.reload()
            }, 1000);
        })

    })
</script>