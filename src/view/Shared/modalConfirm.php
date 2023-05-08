<script>
    function hideModal() {
        $('#myModal').hide();
        $('.modal-backdrop').hide();

    }
</script>
<?php if (isset($msgResultNegative)) { ?>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-error">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title">Erro!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><?= $msgResultNegative ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" type="button" data-dismiss="modal" onclick=" hideModal()">OK</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
if (isset($msgResultPositive)) { ?>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-success">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <h4 class="modal-title">Sucesso!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center"><?= $msgResultPositive ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" data-dismiss="modal" onclick=" hideModal()">OK</button>
                </div>
            </div>
        </div>
    </div>



<?php
}

?>