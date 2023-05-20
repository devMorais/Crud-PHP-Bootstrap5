<?php

require("../con.php");

$nome_produto = $_POST['prod_nome'];
$quantidade = $_POST['qtd_prod'];
$valor = $_POST['valor_prod'];
$categoria = $_POST['cate_prod'];

if(empty($nome_produto) || empty($quantidade) || empty($valor) || empty($categoria) ){


	echo "<h5 style='color:red'><center>Você precisa preencher todos os campos</center></h5>";

	die;
}else{
	$cad_produto = $pdo->prepare("INSERT INTO cad_produtos(nome_prod, qnt_prod, cate_prod, valor_prod) VALUES(:prod_nome, :qtd_prod, :cate_prod, :valor_prod) ");
	$cad_produto -> execute(array(
		':prod_nome' => $nome_produto,
		':qtd_prod' => $quantidade,
		':cate_prod' => $categoria,
		':valor_prod' => $valor,
		




	));

	echo "<script>

			Swal.fire(
			'Bom trabalho',
			'Produto cadastrado com sucesso!',
			'success'
			)
		 
		</script>";
}






?>