<?php if ((isset($arrMsgErro)) && (count($arrMsgErro) > 0)) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Erro</h4>
        <?php foreach ($arrMsgErro as $value) { ?>
            <hr>
            <p class="mb-0"><?= $value ?></p>
        <?php } ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>