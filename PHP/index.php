<?php


//inclui arquivo conexao.php
include("conexao.php");
// inclui arquivo de regras de negocios desconto1 
include("desconto1.php");
session_start();






?>
<!DOCTYPE html>
<html>
<head>
	<title>produtos</title>
	<meta charset="utf-8">
	<!-- add folhas de estilo --> 
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/tabela.css">
	
</head>
<body>
<header>

	<!-- id primeirobloco engloba tudo até produtos dando Background e espaçamentos 

					class= insercao stylo dos inputs 


					id = alinhamento  alinha itens dentro de primerio bloco

					id= inserir estilo do botao inserir 

	 -->
	<div id="primeirobloco">
		<div id="alinhamento">
			<h2>ADD um produto:</h2>
			<?php

				//mensagens de retorno

					if(isset($_SESSION['msg']))
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);

			?>
			<form method="POST" action="processa.php">


				<label>Produto:</label>
				<input type="text" name="nome" class="insercao" placeholder="digite o produto">
			
				<label>Cor:</label>
				<input type="text" name="cor" class="insercao" placeholder="digite a cor">


				<label>Preço:</label>
				<input type="text" name="preco" class="insercao" placeholder="digite o valor">

			</div>

				<div>
				<BUTTON type="submit" id="inserir" >INSERIR</BUTTON>
				</div>

			</form>	
						<!-- Stylo_filtro cuida do select 

								
							filtro_pesquisa devera pesquisar informaçoes atraves da class=produtos 
							nas <tr> 

						-->
				
					    <select  id="stylo_filtro">

				    	<option style="background-color: blue" selected>Azul</option>
				    	<option style="background-color: yellow">Amarelo</option>
				    	<option style="background-color: red">Vermelho</option>

				   		 </select>
		
		

			<div id="filtro_pesquisa">

				<label for="filtro">Filtro:</label>
				<input type="text" name="filtro" id="filtro" placeholder="Selecione o produto">

			</div>

		</div>
	
		</ol>
	</div>
</header>
	<div>
		<h1>Produtos</h1>
	</div>

	<div id="segundobloco">

		<!--segundo bloco puramente estetico para engloabar o terceiro que add a tabela ao nosso codigo -->

		<div id= "terceirobloco">
			
			<?php

			//receber a pagina atual 

				$pagina_atual=filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
			 	$pagina =(!empty($pagina_atual)) ? $pagina_atual:1;


			//setar quantidade de intes por pagina

			$quantidade_paginas = 9;

			
			// calcular itens por pagina 

			$inicio = ($quantidade_paginas * $pagina)-$quantidade_paginas;

			$produtos = "select idprod, nome ,cor ,  e.preco from produtos p 
							join precos e 
							on  e.idpreco= p.idprod LIMIT $inicio,$quantidade_paginas";
			//produtos possui a requisição ao banco de dados 

		$resultado = mysqli_query($mysqli,$produtos);

		//chamada ao banco de dados 
	

		while ($row_usuario=mysqli_fetch_assoc($resultado)){

			// leitura e criação da tabela 
			echo "<table  id='tabela'>";
				
				echo "<tr class='produto'>";
			       echo "<td class='nomes'>".$row_usuario['nome']."</td>";
			    echo "</tr>";
			    echo "<tr class='produto'>";
			       echo "<td class='cor'>".$row_usuario['cor']."</td>";
			    echo "</tr>";
					$row_usuario['preco']=desconto($row_usuario['cor'],$row_usuario['preco']);
					// chamada do metodo de metodo de negocio fiz procedural, criando objeto chamado produto , podia ser uma chamada de metodo 
			    echo "<tr class='produto'>";

			       echo "<td class='nomes'> R$ ".number_format($row_usuario['preco'], 2, '.', '')."</td>";

			       //mostrando o preço formatado ao usuario 

			 	echo "<div id='alinhamento_editar'>";
			   	 	echo "<BUTTON id='atualizar'><a href='editar.php?id=".$row_usuario['idprod']."'>Editar</a></BUTTON>'";
			   	 	// enviando o id para editar.php para que ele saiba qual dado editar no banco de dados atraves do id 

			   	 	echo "<BUTTON id='deletar'><a href='deletar_produto.php?id=".$row_usuario['idprod']."'>DELETAR</a></BUTTON>'";

			   	 	//botao que leva ao deletar_usuario
			   	 	
			  
			   	 echo "</div>";
			      
			      
			    echo "</tr>";
			
			echo "</table>";

		
				}
			?>
		</div>
			
	</div>

	

</body>
		<script src="js/filtra.js"></script>
</html>