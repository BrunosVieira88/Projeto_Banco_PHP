<?php

session_start();

require_once('conexao.php');
//recebendo parametros 

$cor = filter_input(INPUT_POST, 'cor',FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco',FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);



$nomecor  = "INSERT INTO produtos(nome,cor) VALUES('$nome','$cor')" ;
$precocor  = "INSERT INTO precos(preco) VALUES('$preco')";
// requisição ao banco de dados 

$resultado1 = mysqli_query($mysqli,$nomecor);
$resultado2 = mysqli_query($mysqli,$precocor);

// inserção no banco de dados 

if(mysqli_insert_id($mysqli)){
	$_SESSION['msg']= "<p style='color:green';>Produto cadastrado com sucesso!</p>";
	header("Location:index.php");

}else{
	$_SESSION['msg']= "<p style='color:red';>Produto não cadastrado!</p> ";
		header("Location:index.php");
}
