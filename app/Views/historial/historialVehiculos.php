<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/historial-vehiculo-b.png') ?>" />Historial Vehiculos</h2>
    <div class="d-flex justify-content-around p-2 container gap-4" id="container">
        <div id="entrada" class="container card" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 800px;">
            <h3 class="text-center p-3" style="position: sticky;top:0px; z-index:1; background-color:white;"><img style="margin: 5px 20px; width:45px; height:45px;" src="<?php echo base_url('/icons/entrada-histo.png') ?>" />Entrada</h3>
            <div id="containerEntrada" class="d-flex flex-column gap-4">
                <!-- CARD DINAMICA -->
            </div>
        </div>
        <div id="salida" class="container card" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 800px;">
            <h3 class="text-center p-3" style="position: sticky;top:0px; z-index:1; background-color:white;"><img style="margin: 5px 20px; width:45px; height:45px;" src="<?php echo base_url('/icons/salida-histo.jpg') ?>" />Salida</h3>
            <div id="containerSalida" class="d-flex flex-column gap-4">
                <!-- CARD DINAMICA -->
            </div>
        </div>
    </div>
    <!-- <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarVehiculo" onclick="seleccionarVehiculo(< ?= 0 . ',' . 1 ?>)"><img src="< ?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="< ?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="< ?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div> -->
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    tiposMovi = {
        57: 'Entrada',
        58: 'Salida',
        59: 'Cambio de Estado'
    }
    //Mostrar movimientos
    $.ajax({
        url: '<?= base_url('historial/obtenerHistorialVehiculos') ?>',
        method: "POST",
        dataSrc: "",
    }).done(
        function(res) {
            data = JSON.parse(res)
            var cardE = ""
            var cardS = ""
            data.forEach(mov => {
                if (mov.id_tipo_mov == 57) {
                    cardE += `
                        <div id=${mov.id_movimientoenc} class="card" style="border: none !important;">
                            <div class="d-flex align-items-center flex-wrap justify-content-center"> 
                                <img style="margin: 0px 20px; width:45px; height:45px; " src="<?php echo base_url('/img/historial-vehiculo-b.png') ?>" />
                                <div class="card-body" style="background-color: #d9d9d9;border-radius:10px; color:black;">
                                    <p>Tipo Responsable: <span class="fw-bold">${mov.nom_tipo_terce} </p>
                                    <p>Responsable: <span class="fw-bold">${mov.tipo_tercero == 5 ? mov.cliente : mov.razon_social}</span></p>
                                    <p>N° Orden: <span class="fw-bold">${mov.n_orden} </span></p>
                                    <p>Placa Vehiculo: <span class="fw-bold text-uppercase">${mov.placa} </span></p>
                                    <p>Fecha Entrada: <span class="fw-bold">${mov.fecha_movimiento} </span></p>
                                </div>
                            </div>
                        </div>
                    `
                    $('#containerEntrada').html(cardE)
                } else if (mov.id_tipo_mov == 58) {
                    cardS += `
                        <div id=${mov.id_movimientoenc} class="card" style="border: none !important;">
                            <div class="d-flex align-items-center flex-wrap justify-content-center"> 
                                <img style="margin: 0px 20px; width:45px; height:45px;" src="<?php echo base_url('/img/historial-vehiculo-b.png') ?>" />
                                <div class="card-body" style="background-color: #d9d9d9;border-radius:10px;color:black;">
                                    <p>Tipo Responsable: <span class="fw-bold">${mov.nom_tipo_terce} </span></p>
                                    <p>Responsable: <span class="fw-bold">${mov.tipo_tercero == 5 ? mov.cliente : mov.razon_social}</span></p>
                                    <p>N° Orden: <span class="fw-bold">${mov.n_orden} </span></p>     
                                    <p>Placa Vehiculo: <span class="fw-bold text-uppercase">${mov.placa} </span></p>
                                    <p>Fecha Salida: <span class="fw-bold">${mov.fecha_movimiento} </span></p>
                                </div>
                            </div>
                        </div>
                    `
                    $('#containerSalida').html(cardS)
                }
            });
        }
    )
</script>