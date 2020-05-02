<?php

//RECEBE OS DADOS DO FOMRMULÁRIO DE LOGIN

include 'include/conexao.php';

session_start();

$pdo = getPDO();

$usuario = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE;
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE; 

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*Valida os dados e inicia sessao*/
$sql = "SELECT * FROM login WHERE user = '$usuario' AND password = md5('$senha') ";

$result = $pdo->query( $sql );
$resultado = $result->fetchAll();


if(sizeof($resultado) > 0){
	$_SESSION['id'] = $resultado[0]['id_lg'];
    $_SESSION['usuario'] = $resultado[0]['nm_user'];
    $_SESSION['nivel'] = $resultado[0]['nivel'];

    header("Location:main.php");
}

else{
	header("Location:index.php?msgRetorno=Login%20invalido");
}


?>