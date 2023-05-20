<script>
    var ferramentasJs = ({

        //========================LISTAR=======================================

        listarBairro: function() {

            $.ajax({
                url: '/src/controller/bairroController.php?action=listar',

            }).done(function(dados) {

                $('#layoutSidenav_content').html(dados);


            });
        },

        listarCidade: function() {

            $.ajax({
                url: '/src/controller/cidadeController.php?action=listar',

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },

        listarHorario: function() {

            $.ajax({
                url: '/src/controller/horarioController.php?action=listar',

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);

            });
        },

        listarFinalidade: function() {

$.ajax({
    url: '/src/controller/finalidadeController.php?action=listar',

}).done(function(dados) {
    $('#layoutSidenav_content').html(dados);

});
},

listarTipo: function() {

$.ajax({
    url: '/src/controller/tipoController.php?action=listar',

}).done(function(dados) {
    $('#layoutSidenav_content').html(dados);

});
},

        //========================CRIAR=======================================

        criarBairro: function() {
            var bairro = $('#bairro').val();
            var reg = $('#regiao').val();
            var cidcOD = $('#cod_cidade').val();
            $.ajax({
                url: '/src/controller/bairroController.php?action=inserir',
                'method': 'post',
                'data': {

                    'bairro': bairro,
                    'regiao': reg,
                    'cod_cidade': cidcOD
                }

            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');
            });
        },

        criarCidade: function() {
            var uf = $('#uf').val();
            var cid = $('#cidade').val();
            $.ajax({
                url: '/src/controller/cidadeController.php?action=inserir',
                'method': 'post',
                'data': {

                    'uf': uf,
                    'cidade': cid
                }



            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');

            });
        },

        criarHorario: function() {
            var descricao = $('#descricao').val();
            var horario = $('#horario').val();
            var ativo = $('#ativo').val();
            $.ajax({
                url: '/src/controller/horarioController.php?action=inserir',
                'method': 'post',
                'data': {

                    'descricao': descricao,
                    'horario': horario,
                    'ativo': ativo
                }



            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');

            });
        },

        criarHorario: function() {
            var descricao = $('#descricao').val();
            var horario = $('#horario').val();
            var ativo = $('#ativo').val();
            $.ajax({
                url: '/src/controller/horarioController.php?action=inserir',
                'method': 'post',
                'data': {

                    'descricao': descricao,
                    'horario': horario,
                    'ativo': ativo
                }



            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');

            });
        },

        criarFinalidade: function() {
            var descricao = $('#descricao').val();
        
            $.ajax({
                url: '/src/controller/finalidadeController.php?action=inserir',
                'method': 'post',
                'data': {

                    'descricao': descricao,
                    
                }



            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');

            });
        },

        
        criarTipo: function() {
            var descricao = $('#descricao').val();
        
            $.ajax({
                url: '/src/controller/tipoController.php?action=inserir',
                'method': 'post',
                'data': {

                    'descricao': descricao,
                    
                }



            }).done(function(dados) {
                $('#layoutSidenav_content').html(dados);
                $('#myModal').modal('show');

            });
        },

        //========================ATUALIZAR=======================================

        atualizarBairro: function(id) {
            var bairro = $(`#bairro${id}`).val();
            var reg = $(`#regiao${id}`).val();
            var cidcOD = $(`#cod_cidade${id}`).val();
            if (confirm("Deseja atualizar bairro?")) {
                $.ajax({
                    url: '/src/controller/bairroController.php?action=atualizar',

                    'data': {
                        'cod': id,
                        'bairro': bairro,
                        'regiao': reg,
                        'cod_cidade': cidcOD

                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },

        atualizarCidade: function(id) {
            var uf = $(`#uf${id}`).val();
            var cid = $(`#cidade${id}`).val();
            if (confirm("Deseja atualizar a cidade?")) {
                $.ajax({
                    url: '/src/controller/cidadeController.php?action=atualizar',

                    'data': {
                        'cod': id,
                        'uf': uf,
                        'cidade': cid
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },

       
        atualizarHorario: function(id) {
            var descricao = $(`#descricao${id}`).val();
            var horario = $(`#horario${id}`).val();
            var ativo = $(`#ativo${id}`).val();
            if (confirm("Deseja atualizar a cidade?")) {
                $.ajax({
                    url: '/src/controller/horarioController.php?action=atualizar',

                    'data': {
                        'cod': id,
                        'descricao': descricao,
                        'horario': horario,
                        'ativo': ativo
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
        atualizarFinalidade: function(id) {
            var descricao = $(`#descricao${id}`).val();
            if (confirm("Deseja atualizar a finalidade?")) {
                $.ajax({
                    url: '/src/controller/finalidadeController.php?action=atualizar',

                    'data': {
                        'cod': id,
                        'descricao': descricao,
                        
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },

        atualizarTipo: function(id) {
            var descricao = $(`#descricao${id}`).val();
            if (confirm("Deseja atualizar o tipo de imovel?")) {
                $.ajax({
                    url: '/src/controller/tipoController.php?action=atualizar',

                    'data': {
                        'cod': id,
                        'descricao': descricao,
                        
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },

        //========================EXCLUIR=======================================

        excluirBairro: function(id) {
            if (confirm("Deseja excluir o bairro?")) {
                $.ajax({
                    url: '/src/controller/bairroController.php?action=excluir',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
        excluirCidade: function(id) {
            if (confirm("Deseja excluir a cidade?")) {
                $.ajax({
                    url: '/src/controller/cidadeController.php?action=excluir',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },

    
        excluirHorario: function(id) {
            if (confirm("Deseja excluir este horario?")) {
                $.ajax({
                    url: '/src/controller/horarioController.php?action=excluir',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
        excluirFinalidade: function(id) {
            if (confirm("Deseja excluir a finalidade?")) {
                $.ajax({
                    url: '/src/controller/finalidadeController.php?action=excluir',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
        excluirTipo: function(id) {
            if (confirm("Deseja excluir o tipo de imóvel?")) {
                $.ajax({
                    url: '/src/controller/tipoController.php?action=excluir',

                    'data': {
                        'cod': id
                    }
                }).done(function(dados) {
                    $('#layoutSidenav_content').html(dados);
                    $('#myModal').modal('show');
                });
            }
        },
        //========================BOTÃO EDITAR/CANCELAR CIDADE=======================================
        editarCidade: function(id, uf, cid) {


            $("#cidadeList" + id).html(`<td><input id="uf${id}" type="text" value="${uf}"></td> <td><input id="cidade${id}" type="text" value="${cid}"></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.atualizarCidade(${id})">SALVAR</button></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.cancelaEditarCidade(${id}, '${uf}','${cid}')" >CANCELAR</button></td>`);

        },
        cancelaEditarCidade: function(id, uf, cid) {

            $("#cidadeList" + id).html(`<td>${uf}</td> <td>${cid}</td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarCidade(${id}, '${uf}','${cid}')">EDITAR</button></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirCidade(${id})">EXCLUIR</button></td>`);

        },
        limparCidade: function() {
            $('#uf').val('');
            $('#cidade').val('');

        },
        //========================BOTÃO EDITAR/CANCELAR BAIRRO=======================================
        //FIXME: SELECT NA CIDADE
        editarBairro: function(id, bairro, reg, cid) {


            $("#bairroList" + id).html(`<td><input id="bairro${id}" type="text" value="${bairro}"></td>	
            <td><input id="regiao${id}" type="text" value="${reg}"></td>
            <td><input id="cod_cidade${id}" type="text" value="${cid}" ></td>
            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.atualizarBairro(${id})">SALVAR</button></td> 
            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.cancelaEditarBairro(${id}, '${bairro}','${reg}','${cid}')" >CANCELAR</button></td>`);


        },

        cancelaEditarBairro: function(id, bairro, reg, cid) {

            $("#bairroList" + id).html(`<td>${bairro}</td> <td>${reg}</td> <td>${cid}</td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarBairro(${id}, '${bairro}','${reg}','${cid}')">EDITAR</button></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirBairro(${id})">EXCLUIR</button></td>`);


        },
        limparBairro: function() {
            $('#bairro').val('');
            $('#regiao').val('');
            $('#cod_cidade').val('');

        },

        //========================BOTÃO EDITAR/CANCELAR HORARIO=======================================

        editarHorario: function(id, descricao, horario, ativo) {
            var s, n, uteis, excepcionais, domingosFeriados;
            ativo == 's' ? s = 'checked' : n = 'checked';
            if (descricao == 'Úteis') {
                uteis = 'selected';
            } else if (descricao == 'Excepcionais') {
                excepcionais = 'selected';
            } else if (descricao == 'Domingos-Feriados') {
                domingosFeriados = 'selected';
            }
            $(document).ready(function() {
                $('.horario').mask('00:00:00');
            });
            $(`#horarioList${id}`).html(`<td><select name="descricao" id="descricao${id}">
                                <option value="">Descrição</option>
                                <option value="Úteis" ${uteis}>Úteis</option>
                                <option value="Domingos-Feriados" ${domingosFeriados}>Domingos-Feriados</option>
                                <option value="Excepcionais" ${excepcionais}>Excepcionais</option>
                            </select></td>
                        <td><input name="horario" id="horario${id}" class="horario" type="text" value="${horario}"></td>
                        <td><input class="form-check-input" type="radio" name="ativo" id="ativo${id}" value="s" ${s}>Ativo
                            <input class="form-check-input" type="radio" name="ativo" id="ativo${id}" value="n" ${n}>Inativo
                        </td>
                        <td><button type="button" class="btn btn-primary btn-block" onclick="ferramentasJs.atualizarHorario(${id})">SALVAR</button></td>
                        <td><button class="btn btn-primary btn-block" type="button" onclick="ferramentasJs.cancelaEditarHorario(${id}, '${descricao}','${horario}','${ativo}')">CANCELAR</button></td>`);


        },

        cancelaEditarHorario: function(id, descricao, horario, ativo) {
            var a;
            ativo == 's' ? a = 'Ativo' : a = 'Inativo';

            $("#horarioList" + id).html(`<td>${descricao}</td> <td>${horario}</td> <td>${a}</td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarHorario(${id}, '${descricao}','${horario}','${ativo}')">EDITAR</button></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirHorario(${id})">EXCLUIR</button></td>`);


        },

        limparHorario: function() {
            $('#descricao').val('');
            $('#horario').val('');
            $('#ativo').val('');

        },

        //========================BOTÃO EDITAR/CANCELAR FINALIDADE=======================================
        
        editarFinalidade: function(id, descricao) {


$("#finalidadeList" + id).html(`	
<td><input id="descricao${id}" name="descricao" type="text" value="${descricao}"></td>
<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.atualizarFinalidade(${id})">SALVAR</button></td> 
<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.cancelaEditarFinalidade(${id}, '${descricao}')" >CANCELAR</button></td>`);


},

cancelaEditarFinalidade: function(id, descricao) {

$("#finalidadeList" + id).html(`<td>${descricao}</td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarFinalidade(${id}, '${descricao}')">EDITAR</button></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirFinalidade(${id})">EXCLUIR</button></td>`);


},
limparFinalidade: function() {
$('#descricao').val('');

},
//========================BOTÃO EDITAR/CANCELAR TIPO=======================================
        
editarTipo: function(id, descricao) {


$("#tipoList" + id).html(`	
<td><input id="descricao${id}" name="descricao" type="text" value="${descricao}"></td>
<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.atualizarTipo(${id})">SALVAR</button></td> 
<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.cancelaEditarTipo(${id}, '${descricao}')" >CANCELAR</button></td>`);


},

cancelaEditarTipo: function(id, descricao) {

$("#tipoList" + id).html(`<td>${descricao}</td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarTipo(${id}, '${descricao}')">EDITAR</button></td> <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirTipo(${id})">EXCLUIR</button></td>`);


},
limparTipo: function() {
$('#descricao').val('');

},

    });

</script>