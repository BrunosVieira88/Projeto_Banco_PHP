<?php

$hostname = 'localhost';
$bancodedados='produtos';
$usuario="root";
$senha="";
// informaçoes necessarias para estabelecer conexao 
$mysqli = new mysqli($hostname,$usuario,$senha,$bancodedados);
if($mysqli->connect_errno){
	echo "Falha ao conectar: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}
//estabelecendo conexao atraves do objeto mysqli
