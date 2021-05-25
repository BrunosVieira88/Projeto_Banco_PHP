<?php

session_start();
include_once('conexao.php');



$id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
$cor = filter_input(INPUT_POST, 'cor',FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco',FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);

$resultado_primeira="UPDATE produtos,precos set nome='$nome', cor='$cor',preco='$preco' where idprod='$id'";
$resultado=mysqli_query($mysqli,$resultado_primeira);


if(mysqli_affected_rows($mysqli)){
	$_SESSION['msg']= "<p style='color:green';>Produto Editado com sucesso!</p>";
	header("Location:index.php");

}else{
	$_SESSION['msg']= "<p style='color:red';>Produto não Editado!</p> ";
		header("Location:Editar.php?id=$id");
}





