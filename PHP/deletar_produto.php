<?php

session_start();

require_once('conexao.php');

$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
// lendo paramentros 

$deletar_produtos="DELETE FROM produtos WHERE idprod=$id"; 
$deletar_precos = "DELETE FROM precos WHERE idpreco=$id"; 

// requisição ao banco de dados 


$delete = mysqli_query($mysqli,$deletar_produtos);
$delete1 = mysqli_query($mysqli,$deletar_precos);

// inserção no banco de dados 

if(mysqli_affected_rows($mysqli)){
	$_SESSION['msg']= "<p style='color:green';>Produto Deletado com sucesso!</p>";
	header("Location:index.php");

}else{
	$_SESSION['msg']= "<p style='color:red';>Não foi possivel deletar seu produto!</p> ";
		header("Location:Editar.php?id=$id");
}