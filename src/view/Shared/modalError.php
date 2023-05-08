<!-- Modal HTML -->
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
                <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="function teste(){$('#myModal').modal('toggle');}">OK</button>
            </div>
        </div>
    </div>
</div>