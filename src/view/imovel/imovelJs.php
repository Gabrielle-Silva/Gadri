<script>
    $(document).ready(function() {

        if ($('#painelBuscaImoveis').length) {
            imovelJs.pesquisar();
        }
    });


    var imovelJs = ({



        pesquisar: function() {

            $.ajax({
                url: '/src/controller/imovelController.php?action=listar',

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },
        editarImovel: function(id) {

            $.ajax({
                url: '/src/controller/imovelController.php?action=editarImovel',

                'data': {
                    'cod': id
                }
            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },



        exluir: function(id) {
            console.log(id);
            if (confirm("Deseja excluir imóvel?")) {
                $.ajax({
                    url: '/src/controller/imovelController.php?action=exluir',
                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }

        },

        atualizar: function() {
            if (confirm("Deseja atualizar os dados?")) {
                $.ajax({
                    'url': '/src/controller/ImovelController.php?',
                    'data': $(`#imovelFormEdit`).serialize(),
                    'async': true,
                    'cache': false,
                    'contentType': false,
                    'processData': false,
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },

        filtrar: function() {

            $.ajax({
                'url': '/src/Controller/imovelController.php?action=listar',
                'data': $(`#filtros`).serialize(),

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },
        inserirImovel: function() {

            $.ajax({
                'url': '/src/Controller/imovelController.php?',
                'data': $(`#imovelForm`).serialize(),
                'async': true,
                'cache': false,
                'contentType': false,
                'processData': false,
            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');
            });
        },

        favoritos: function(codUsu) {

            $.ajax({
                'url': '/src/Controller/favoritoController.php?action=listar',

                'data': {
                    'cod_usuario': codUsu
                }
            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },

        favoritar: function(e, codIm, codUsu) {


            if (e.classList.contains('favorito')) {
                e.classList.remove('favorito');
                e.innerHTML = '<i class="bi bi-heart-fill"></i>';
                $.ajax({
                    'url': '/src/Controller/favoritoController.php?action=excluir',

                    'data': {
                        'cod_usuario': codUsu,
                        'cod_imovel': codIm
                    }
                })
            } else {
                e.classList.add('favorito');
                e.innerHTML = '<i class="bi bi-heart"></i>';
                $.ajax({
                    'url': '/src/Controller/favoritoController.php?action=inserir',

                    'data': {
                        'cod_usuario': codUsu,
                        'cod_imovel': codIm
                    }
                })
            }

        },

        imovelInfo: function(idImv) {
            $.ajax({
                url: '/src/controller/imovelController.php?action=listarInfo',
                'data': {
                    'cod': idImv
                },



            }).done(function(dados) {
                //window.history.pushState("", "", "/src/view/teste");
                //window.location = '/src/view/agendamento/realizarAgendamento.php';
                //echo dados;
                //alert(dados[0])
                $('body').html(dados);
            });

        },

        imovelform: function() {
            $.ajax({
                url: '/src/controller/imovelController.php?action=imovelform'


            }).done(function(dados) {

                $('#layoutSidenav_content').html(dados);
            });

        },

        ativarDesativar: function(e, codIm) {


            if (e.classList.contains('ativo')) {
                e.classList.remove('ativo');
                e.innerHTML = 'ATIVAR';
                $.ajax({
                    'url': '/src/Controller/imovelController.php?action=desativar',

                    'data': {

                        'cod': codIm
                    }
                })
            } else {
                e.classList.add('ativo');
                e.innerHTML = 'DESATIVAR';
                $.ajax({
                    'url': '/src/Controller/imovelController.php?action=ativar',

                    'data': {

                        'cod': codIm
                    }
                })
            }

        },




    });



    /*   //GALERIA DE IMOVEIS
      let slideIndex = 1;
      showSlides(slideIndex);

      // Next/previous controls
      function plusSlides(n) {
          showSlides((slideIndex += n));
      }

      // Thumbnail image controls
      function currentSlide(n) {
          showSlides((slideIndex = n));
      }

      function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName('mySlides');
          let dots = document.getElementsByClassName('demo');
          let captionText = document.getElementById('caption');
          if (n > slides.length) {
              slideIndex = 1;
          }
          if (n < 1) {
              slideIndex = slides.length;
          }
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = 'none';
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(' active', '');
          }
          slides[slideIndex - 1].style.display = 'block';
          dots[slideIndex - 1].className += ' active';
          captionText.innerHTML = dots[slideIndex - 1].alt;
      } */
</script>