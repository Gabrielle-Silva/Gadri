<!-- NAV -->
<?php
include_once(__ABS_DIR__ . 'src/view/includes/nav.php');
?>


<!-- GALERIA -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



<div style="margin-top: 5%; display:flex;" class="row justify-content-center" style="background-color: grey;">
  <div class="col col-sm-6 align-self-center" style="margin-bottom: 160px; ">



    <div class="containerCar">
      <!-- Flickity HTML init -->
      <div class="carousel carousel-main align-self-center" data-flickity='{"pageDots": false }'>


        <?php
        /* define('IMAGEPATH', __ABS_DIR__ . 'assets/img/imoveis/imov' . $arrImoveis[0][0] . '/');
        foreach (glob(IMAGEPATH . '*') as $filename) { basename($filename) ?> */
        $arr_foto = explode(",", $arrImoveis[0][8]);
        foreach ($arr_foto as $filename) { ?>
          <div class="carousel-cell">
            <img class="imagemCar" src="/assets/img/imoveis/imv<?= $arrImoveis[0][0] ?>/<?= $filename ?>" />
          </div>
        <?php
        } ?>
      </div>
      <!-- //THUMBS -->
      <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
        <?php foreach ($arr_foto as $filename) { ?>
          <div class="carousel-cell" style="
						background-image: url('/assets/img/imoveis/imv<?= $arrImoveis[0][0] ?>/<?= $filename ?>');
					"></div>
        <?php
        } ?>

      </div>
    </div>



  </div>









  <div class="col col-sm-4 p-details" style=" height: 700px;">

    <!--  botao de ativar/desativar apenas para admin -->
    <?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') {
      $queryAtivos = "select cod from imovel where desativacao is null";
      $resultAtivos = mysqli_query($conexao, $queryAtivos);
      $rows = [];
      while ($row = mysqli_fetch_array($resultAtivos)) {
        $rows[] = $row[0];
      }
      if (in_array($arrImoveis[0][0], $rows, TRUE)) { ?>
        <button id="btn-ativarIm" class="btn btn-block btn-sm ativo" type="button" style="width: 100%;" onclick="imovelJs.ativarDesativar(this, <?= $arrImoveis[0][0] ?>)">DESATIVAR</button>
      <?php
      } else { ?>
        <button id="btn-ativarIm" class="btn btn-block btn-sm " type="button" style="width: 100%;" onclick="imovelJs.ativarDesativar(this,  <?= $arrImoveis[0][0] ?>)">ATIVAR</button>
    <?php
      }
    } ?>
    <div id="descricaoImovel" class="row">
      <div class="col-12 ">
        <h4><?= $arrImoveis[0][2] ?> para <?= $arrImoveis[0][1] ?></h4><br>
      </div>
      <div class="col-12 ">
        <h4> <?= $arrImoveis[0][12] ?> / <?= $arrImoveis[0][13] ?></h4>
      </div>
      <span class="text-muted">Cód <?= $arrImoveis[0][0] ?></span>
    </div>

    <div class="mx-2" style="height: 30px;">

    </div>
    <hr>
    <div class="row">
      <div class="col-12">
        <div class="d-flex flex-column " style="height: 30px;">
          <h6 class="mb-0"><i class="bi bi-house-fill"></i> Quartos: <?= $arrImoveis[0][4] ?></h6>

        </div>
      </div>
      <hr>
      <div class="w-100"></div>

      <div class="col-12 ">
        <div class="d-flex flex-column" style="height: 30px;">
          <h6 class="mb-0"><i class="bi bi-border"></i> Vagas: <?= $arrImoveis[0][5] ?></h6>

        </div>
      </div>
      <hr>
      <div class="w-100"></div>

      <div class="col-12 ">
        <div class="d-flex flex-column " style="height: 30px;">
          <h6 class="mb-0"><i class="bi bi-car-front-fill"></i> Área: <?= $arrImoveis[0][3] ?>m<sup>2</h6>

        </div>
      </div>
      <hr>
      <div class="w-100"></div>

      <div class="col-12 ">
        <div class="d-flex flex-column " style="height: 30px;">
          <h6 class="mb-0"><i class="bi bi-cash-coin"></i> Valor : <?= $arrImoveis[0][6] ?> </h6>

        </div>
      </div>
      <hr>
    </div>
    <div class="col-12 ">
      <div class="d-flex flex-column " style="height: 200px;">
        <p class="mb-0"><?= $arrImoveis[0][7] ?> </p>

      </div>
    </div>
    <div class="d-flex align-items-center">
      <!-- Button trigger modal -->
      <button type="button" id="btn-agendar" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="agendamentoJs.agendaImovel(<?= $arrImoveis[0][0] ?>);">
        AGENDAR VISITA
      </button>

      <!-- Modal -->
      <div id="modalAgendamento">
        <?php include_once(__ABS_DIR__ . 'src/view/agendamento/realizarAgendamento.php'); ?>
      </div>
      <script>
        setTimeout(function() {
          loadCalendar();
        }, 10000);
      </script>
      <?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') { ?>
        <button id="btn-edit" class="btn btn-block btn-sm btn-edit" type="button"><i class="bi bi-pencil-square" onclick="imovelJs.editarImovel(<?= $dataI[0] ?>)"></i></i></button>
        <?php
      } else if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'u') {
        $queryFavoritos = "select cod_imovel from favorito where cod_usuario = " . $_SESSION['login'];
        $resultFavoritos = mysqli_query($conexao, $queryFavoritos);
        $rows = [];
        while ($row = mysqli_fetch_array($resultFavoritos)) {
          $rows[] = $row[0];
        }
        if (in_array($arrImoveis[0][0], $rows, TRUE)) { ?>
          <button onclick="imovelJs.favoritar(this, <?= $arrImoveis[0][0] ?>, <?= $_SESSION['login'] ?>)" id="btn-like" class=" btn-like btn btn-block btn-sm favorito" type="button"><i class="bi bi-heart"></i></i></button>
        <?php
        } else { ?>
          <button onclick="imovelJs.favoritar(this, <?= $arrImoveis[0][0] ?>, <?= $_SESSION['login'] ?>)" id="btn-like" class=" btn-like btn btn-block btn-sm" type="button"><i class="bi bi-heart-fill"></i></i></button>

        <?php
        }
      } else { ?>
        <button onclick="alert('Faça login para salvar imovel aos favoritos')" id="btn-like" class=" btn-like btn btn-block btn-sm" type="button"><i class="bi bi-heart-fill"></i></i></button>

      <?php
      } ?>

    </div>
  </div>






</div>