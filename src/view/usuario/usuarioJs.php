<script>
	$(document).ready(function() {

		if ($('#painelLogin').length) {
			usuarioJs.login();
		}
	});

	var usuarioJs = ({

		pesquisar: function() {
			$.ajax({
				url: '/src/controller/usuarioController.php?action=listar',

			}).done(function(dados) {
				$('#layoutSidenav_content').html(dados);

			});
		},

		sessao: function() {
			$.ajax({
				url: '/src/controller/usuarioController.php?',
				'method': 'post',
				'data': $(`#loginForm`).serialize()
			}).done(function(dados) {



			});
		},

		inserir: function() {

			$.ajax({
				url: '/src/controller/usuarioController.php?action=inserir',
				'method': 'post',
				'data': $(`#criaContaForm`).serialize()
			}).done(function(dados) {

				$('#layoutSidenav_content').html(dados);
				$('#myModal').modal('show');

			});
		},

		atualizar: function(id) {

			$.ajax({
				'url': '/src/controller/usuarioController.php?action=atualizar',

				'data': {
					'cod': id
				}
			}).done(function(dados) {
				$('#layoutSidenav_content').html(dados);

			});

		},

		editar: function(id) {
			if (confirm("Deseja atualizar os dados?")) {
				$.ajax({
					url: '/src/Controller/usuarioController.php?',

					'cod': id,
					'data': $(`#usuarioForm`).serialize(),
					'async': true,
					'cache': false,
					'contentType': false,
					'processData': false
				}).done(function(dados) {
					$('#layoutSidenav_content').html(dados);
					$('#myModal').modal('show');

				});
				return false;
			}

		},
		apagar: function(id) {

			if (confirm('Deseja excluir a conta?')) {
				$.ajax({
					'url': '/src/controller/usuarioController.php?action=apagar',
					'data': {
						'cod': id
					}

				}).done(function(dados) {

					$('#layoutSidenav_content').html(dados);


				});
			}
		},


		salvar: function() {
			$.ajax({
				url: '/src/controller/usuarioController.php?',
				'method': 'post',
				'data': $(`#cadastroForm`).serialize()
			}).done(function(dados) {

				$('#layoutSidenav_content').html(dados);


			});

		},

		criar: function() {

			$.ajax({
				url: '/src/controller/usuarioController.php?action=criar',

			}).done(function(dados) {

				$('#layoutSidenav_content').html(dados);


			});
		},
		login: function() {

			$.ajax({
				url: '/src/controller/usuarioController.php?action=login',

			}).done(function(dados) {

				$('#layoutSidenav_content').html(dados);


			});
		},
		esqueciS: function() {

			$.ajax({
				url: '/src/controller/usuarioController.php?action=esqueciS',

			}).done(function(dados) {

				$('#layoutSidenav_content').html(dados);


			});
		},

	});
</script>