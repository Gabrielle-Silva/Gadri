<html>

<head>
  <?php
  include_once('lib/config.php'); ?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?= __TITULO__ ?></title>

  <!-- script com função sticky para o menu (apenas index) -->
  <script src="/src/view/home/home.js"></script>
  <!-- LINKS CSS -->
  <?php include_once('css.php'); ?>


</head>



<body id="inicio">
  <!-- =================== MODAL =================-->



  <!-- MENU NAVEGAÇÃO (NAV BAR)-->
  <?php include_once(__ABS_DIR__ . 'src/view/includes/nav.php'); ?>


  <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
  ?>



  <!-- BANNER ---FUNDO TELA INICIAL -->
  <!--   FIXME: arrumarsessão gambiarra criada para tentar ajeitar a imagem de fundo do banner -->
  <section id="gambiarra"></section>
  <section class="banner">
    <div class="encontre">
      <h1 id="slogan">ENCONTRE SEU IMÓVEL</h1>
      <button class="botão-inicial" onclick="window.location.href = '/src/view/painel/painelBuscaImoveis.php'">Buscar</button>
    </div>
  </section>




  <!-- BUSCA -------- busca prévia que leva até a busca avançada TODO: configurar melhor com back end e front -->
  <section id="busca">
    <?php include_once('src/view/home/buscaIndex.php'); ?>
  </section>


  <!-- CARROSSEL DE IMAGENS ----------------- TODO: configurar com banco de dados-->
  <section id="carrossel">
    <?php include_once('src/view/home/carrosselIndex.php'); ?>
  </section>


  <!-- SESSÃO DE CARACTERISTICAS DA EMPRESA-->
  <section id="caracteristicas">
    <?php include_once('src/view/home/caracteristicasIndex.php'); ?>
  </section>

  <!-- SESSÃO DE QUEM SOMOS-->
  <section>
    <?php include_once('src/view/home/sobreIndex.php'); ?>
  </section>

  <!-- SESSÃO DE FALE CONOSCO--------- TODO: Fazer com que envie email -->
  <section id="faleconosco-Box">
    <?php include_once('src/view/home/faleConoscoIndex.php'); ?>
  </section>

  </div>
  </div>

  <!-- FOOTER COM CONTATO--------- -->
  <?php include_once('src/view/home/contato.php'); ?>


  <!-- JavaScript--------- -->
  <?php include_once('js.php'); ?>

</body>



</html>