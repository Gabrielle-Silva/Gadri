<script>
    var agendamentoJs = ({
        agendaImovel: function(id) {
            $('#cod_imovel').val(id);



        },

        inserirAgendamento: function() {

            $.ajax({

                url: '/src/controller/agendamentoController.php?action=inserir',
                'data': {
                    'cod_imovel': $('#cod_imovel').val(),
                    'cod_usuario': $('#cod_usuario').val(),
                    'data': $('#data').val(),
                    'cod_horario': $('#cod_horario').val(),
                    'obs': $('#obs').val(),
                }
            }).done(function(dados) {
                $('htmlayoutSidenav_contentl').html(dados);
                $('#myModal').modal('show');
                alert('Pedido de agendamento realizado!\nVerifique seu email ou em "Agendamentos" no seu perfil');
                //window.location.href = `/src/view/painel/painelBuscaImoveis.php?`
            });

        },
        emailAgendamento: function() {
            $.ajax({
                url: '/src/controller/agendamentoController.php?action=inserir',
                'data': {
                    'cod_imovel': $('#cod_imovel').val(),
                    'cod_usuario': $('#cod_usuario').val(),
                    'data': $('#data').val(),
                    'cod_horario': $('#cod_horario').val(),
                    'obs': $('#obs').val(),
                }

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });

        },


        listarAgendamento: function() {

            $.ajax({
                url: '/src/controller/agendamentoController.php?action=listar',

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },
        listarAgendamentoUsu: function(idUsu) {

            $.ajax({
                url: '/src/controller/agendamentoController.php?action=listar',
                'data': {
                    'cod_usuario': idUsu
                }

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },


        excluirAgendamento: function(id) {
            if (confirm("Deseja excluir o agendamento?")) {
                $.ajax({
                    url: '/src/controller/agendamentoController.php?action=excluir',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
        cancelarAgendamento: function(id) {
            if (confirm("Deseja excluir o agendamento?")) {
                $.ajax({
                    url: '/src/controller/agendamentoController.php?action=cancelar',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
    });
</script>