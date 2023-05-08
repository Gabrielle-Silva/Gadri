<div class="glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <?php $queryImoveis = "select * from imovel where desativacao is null";
            $resultImovel = mysqli_query($conexao, $queryImoveis);
            while ($imovel = mysqli_fetch_array($resultImovel)) {
                $arr_foto = explode(",", $imovel['foto']);
            ?>
                <li class="glide__slide"><img src="/assets/img/imoveis/imv<?= $imovel[0] ?>/<?= $arr_foto[0] ?>" onclick="imovelJs.imovelInfo(<?= $imovel[0] ?>)"></li>
            <?php
            } ?>
        </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">←</button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">→</button>
    </div>
</div>

<!--SCRIPTS-->
<?php include_once(__ABS_DIR__ . 'js.php');
include_once(__ABS_DIR__ . 'src/view/imovel/imovelJs.php');
?>