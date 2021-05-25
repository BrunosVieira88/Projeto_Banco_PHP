<?php




include("conexao.php");

session_start();

$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
//recebendo id; 


//requisição ao banco de dados produtos e precos 
$resultado_produto="SELECT * from produtos join precos on idprod = idpreco where idprod='$id'";
$resultado=mysqli_query($mysqli,$resultado_produto);
$row_produto=mysqli_fetch_assoc($resultado);




?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/tabela.css">
	
</head>
<body>
<header>
	<div id="primeirobloco">
		<div id="alinhamento">
			<h2>ADD atualize ou delete um produto:</h2>
			<?php

					//mensagens de retorno

					if(isset($_SESSION['msg']))
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
			?>

			<!--enviando form para o editar produto que vai receber as informaçoes e add ao banco de dados e retornar ao index -->
			<form method="POST" action="editar_produto.php">

					<input type="hidden" name="id" class="insercao"  value="<?php echo $row_produto['idprod'];?>">

					<label>Produto:</label>
					<input type="text" name="nome" class="insercao" placeholder="digite o produto" value="<?php echo $row_produto['nome'];?>">
				
					<label>Cor:</label>
					<input type="text" name="cor" class="insercao" placeholder="digite a cor" value="<?php echo $row_produto['cor'];?>">


					<label>Preço:</label>
					<input type="text" name="preco" class="insercao" placeholder="digite o valor" value="<?php echo $row_produto['preco'];?>">

			
					<BUTTON type="submit" id="inserir" >Editar</BUTTON>

			</form>

					<a href="index.php">Pagina inicial</a>
		</div>		
			
</html>
