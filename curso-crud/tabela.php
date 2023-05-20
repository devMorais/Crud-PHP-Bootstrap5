		<?php


		require("con.php");
		$tabela = $pdo->prepare("SELECT * FROM cad_produtos ORDER BY nome_prod ASC");
		$tabela->execute();
		$restabela = $tabela->rowCount();
		$rowtabela = $tabela->fetchAll();




		?>




		<!DOCTYPE html>
		<html lang="pt-br">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

			<title>Cadastro de Produtos</title>
		</head>
		<body>
			
			<div class="container">
				<br>
				<h1 align="center">Tabela de Produtos</h1>
				<br>

				<?php if($restabela > 0 ) {  ?>

					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID do produto</th>
								<th scope="col">Nome do produto</th>
								<th scope="col">Quantidade do produto</th>
								<th scope="col">Valor do produto</th>
								<th scope="col">Categoria do produto</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$num = 1;
							foreach($rowtabela as $linha) {








								?>





								<tr>
									<th> <?= $linha['id'] ?></th>
									<td><?= $linha['nome_prod'] ?></td>
									<td><?= $linha['qnt_prod'] ?></td>
									<td><?= $linha['valor_prod'] ?></td>
									<td><?= $linha['cate_prod'] ?></td>
									<td>
										<a href="editar_tabela.php?produto=<?= $linha['id'] ?>" class="material-icons text-warning">edit</a>
										<a id="<?= $linha['id'] ?>" class="material-icons text-danger deletar">delete</a>

									</td>


									<?php 

									$num++;



								} ?>


							</tr>
						</tbody>
					</table>

				<?php } else {?>

					<div class="alert alert-primary" role="alert">

						Nenhum produto cadastrado 😕 

					</div>







				<?php } ?>

				<div class="form-group">
					<div class="container">
						
						<a href="index.php" class="btn btn-primary float-left">Cadastrar Produtos</a>
						
					</div>
				</div>
				<div id="linkResultado"></div>
			</div>

			<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



			<script>
				$(document).on('click', '.deletar', function() {
					var prod = $(this).attr('id');


					Swal.fire({
						title: 'Você deseja deletar o produto?',
						text: 'Você não poderá recuperar após a esclusão.',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Sim, deletar!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
							type: "POST",
							url: "CRUD/delet_prod.php",
							data: { prod: prod },
							success: function(data) {
								$("#linkResultado").html(data);
						}
					});

							Swal.fire(
								'Deletado',
								'Atualizando...',
								'success'





								)


						}


					});


					
				});
			</script>

		</body>
		</html>