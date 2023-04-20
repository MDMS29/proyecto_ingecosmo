<div class="my-4 container">
    <div class="card">
        <h5 class="card-header text-center">¡Ha ocurrido un error!</h5>
        <div class="card-body d-flex flex-column align-items-center">
            <p class="card-text m-0 text-center fw-semibold text-success-emphasis">
                <?php echo $msgError ?>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    setTimeout(()=>{ window.history.go(-1)},1500)
</script>