<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/icons/vehiculo-b.png') ?>" /> Vehiculos</h2>
    <div class="d-flex justify-content-around p-2" id="container">
        <div id="entrada">
            <h3>Entrada</h3>
            <div id="containerEntrada">
                <!-- CARD DINAMICA -->
            </div>
        </div>
        <div id="salida">
            <h3>Salida</h3>
            <div id="containerSalida">
                <!-- CARD DINAMICA -->
            </div>
        </div>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarVehiculo" onclick="seleccionarVehiculo(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Tabla de vehiculos
    tiposMovi = {
        57: 'Entrada',
        58: 'Salida',
        59: 'Cambio de Estado'
    }
    $.ajax({
        url: '<?= base_url('historial/obtenerHistorialVehiculos') ?>',
        method: "POST",
        dataSrc: "",
    }).done(
        function(res) {
            data = JSON.parse(res)
            console.log(data)
            var card = ""
            for (let i = 0; i < data.length; i++) {
                tipoMov = data[i].id_tipo_mov
                card += `
                    <div id=${data[i].id_movimientoenc} class="card">
                    
                        <div class="card-body">
                            <h5 class="card-title"> ${data[i].placa} </h5>
                            <p class="card-title">Tipo Responsable: ${data[i].nom_tipo_terce} </p>
                            <p class="card-text">Responsable: ${data[i].tipo_tercero == 5 ? data[i].cliente : data[i].razon_social}</p>
                        </div>
                    </div>
                `
                if (tiposMovi[tipoMov] == 'Entrada') {
                    $('#containerEntrada').html(card)
                } else {
                    $('#containerSalida').html(card)
                }
            }
        }
    )
</script>