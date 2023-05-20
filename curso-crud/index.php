<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Cadastro de Produtos</title>
</head>
<body>
	
<div class="container">
	<br>
	<h1 align="center">Cadastro de Produtos</h1>
	<br>
	<form action="" method="POST" id="formulario">

		<div class="form-group">
			<div class="col-md-6 offset-md-3">
				<label>Nome do Produto</label>
				<input type="text" name="prod_nome" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 offset-md-3">
				<label>Quantidade do Produto</label>
				<input type="text" name="qtd_prod" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 offset-md-3">
				<label>Valor do Produto</label>
				<input type="text" name="valor_prod" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 offset-md-3">
				<label>Categoria do Produto</label>
				<input type="text" name="cate_prod" class="form-control">
			</div>
		</div>
		<br>

		

		<div class="form-group">
			<div class="col-md-6 offset-md-3">
				<input type="submit" value="Cadastrar" class="btn btn-success">
				<a href="tabela.php" value="Cadastrar" class="btn btn-primary float-right">Visualisar Produtos</a>
				
			</div>
		</div>


	</form>

	<div id="linkResultado">
		

	</div>





</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
	jQuery("#formulario").submit(function(){
		event.preventDefault();
		var dados = jQuery(this).serialize();

		jQuery.ajax({
			type: "POST",
			url: "CRUD/cad_prod.php",
			data: dados,
			success: function (data)
			{
				$("#linkResultado").html(data);

			}
		});

		return false;

	});





</script>



</body>
</html>