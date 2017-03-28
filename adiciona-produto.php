<?php include("cabecalho.php");
 include("conecta.php");
 include("banco-produto.php");
	 
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	if(array_key_exists('usado', $_POST)){
		$usado = "true";
	} else{
		$usado = "false";
	}
	
	if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)){ ?>
		<p class="text-success">Produto <?= $nome; ?>, No valor de: R$ <?= $preco ?> foi adicionado.</p>
	<?php }else{ 
		$msg = mysqli_error($conexao);
		?>
		<p class="text-danger">O produto <?= $nome; ?> näo foi adicionado: <?= $msg?></p>
		<?php
		}
	#mysqli_close($conexao); # o php fecha a coneçäo depois que terminar de processar a pagina
	
	?>
	
<?php include("rodape.php");?>