<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">
<div id="content" class="p-4 p-md-5">

<div class="MasBaterias" id="MasBaterias">
    <h5 class="titulo"> Bodega <?= $nombreBodega ?></h5>
  </div>

  <div class="contenedor-d">
    <?php if (empty($data)) { ?>
      <p>No se encuentra repuestos - Bodega <?= $nombreBodega ?></p>
    <?php } else { ?>
      <?php foreach ($data as $dato) { ?>

        <div class="card">

          <div class="contenido1">
            <img src="<?php echo base_url('/img/') . $icono ?>"  class="baterias"/>
            <h5 class="card-title" id="nombreCard"><?php echo $dato['nombre']; ?></h5>
          </div>
          <br>
          <br>

           <div class="contenido2">
            <div class="Imagenes">
              <input href="#" onclick="detallesMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#detallesModal" type="image" src="<?php echo base_url(); ?>/img/detalles.png" width="30" height="30" title="Mas detalles del repuesto" id="btnUsar"></input>

              <input href="#" onclick="usarMaterial(<?php echo $dato['id_material'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#usarMaterial" type="image" src="<?php echo base_url(); ?>/img/usarM.png" width="30" height="30" title="devoluciones"></input>
            </div>
          </div>

        </div>
      <?php } ?>
    <?php } ?>
  </div>

  <div class="footer-page">
    <a href="<?php echo base_url('/repuestos'); ?>" class="btn btnRedireccion" id="Regresar" data-bs-target="#materialesModal"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20">Regresar</a>
     <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#materialesModal" onclick="agregar(0, 1)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>  
  </div>
</div>

<form id="formularioAgregar" autocomplete="off">
  <input class="form-control" id="id" name="id" type="text" value="0" hidden>

  <input type="text" name="id" id="id" hidden>
  <input type="text" name="tp" id="tp" hidden>

  <div class="modal fade" id="materialesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modalContent" style="border: 5px solid #161666; height: 300px; border-radius: 10px;">
        <div class="modal-header" id="modalHeader">
          <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
          <div id="agregar">
            <img style="margin-right: 10px; width:30px;" src="http://localhost/ingecosmo/public/img/plus-b.png" alt="icon-plus" width="20">
          </div>
          <h1 class="modal-title" id="titulo1">Agregar</h1>
          <button type="button" class="btn-close" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalAgregar2">

          <div class="mb-3">
            <label for="exampleDataList" class="col-form-label">Nombre:</label>
            <div>
              <input class="form-control" id="nombre" name="nombre" placeholder="">
              <small id="msgAgregar" class="invalido2"></small>
            </div>
          </div>
        </div>
        <div class="modal-footer" id="modalFooter">
          <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btnAccionF" id="btnAgregar">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>

</div>

<script>

function limpiarCampos() {

$("#nombre1").val('');
$("#nombre").val('');
}

function agregar(id, tp) {
    $('#tp').val(tp)
  }


$("#formularioAgregar").on("submit", function(e) {
    e.preventDefault()
    nombre = $("#nombre").val()
    if ([nombre].includes("")) {
      return Swal.fire({
        position: "center",
        icon: "error",
        text: "¡Campos Vacios!",
        showConfirmButton: false,
        timer: 1000
      })
    }
    $.post({
      url: '<?php echo base_url('repuestos/insertar') ?>',
      data: {
        idMaterial: id_material,
        nombre: nombre,
      },
      success: function(e) {
        Swal.fire({
          position: "center",
          icon: "success",
          text: 'Se agrego material',
          showConfirmButton: false,
          timer: 1000
        })
        $("#id").val(0)
        setTimeout(() => {
          window.location.reload()
        }, 1000);
      }
    })

  })
</script>