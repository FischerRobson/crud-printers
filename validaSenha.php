<?php
session_start();
include 'include/conexao.php';
$pdo = getPDO();

$user = $_SESSION['usuario'];
$senhaold = $_POST['passwordold'];
$senha = $_POST['password'];
$senha2 = $_POST['password2'];


$sql = "SELECT * FROM login WHERE nm_user like '$user' and password like md5('$senhaold') ";

$result = $pdo->query( $sql );
$resultado = $result->fetchAll();

if (sizeof($resultado) > 0) {
	
	if($senha == $senha2){

		$sql_senha = "UPDATE login SET password = :senha WHERE nm_user like '$user' ";
		$stmt = $pdo->prepare($sql_senha);
			$stmt->bindParam(':senha', md5($senha));
			$result = $stmt->execute();
			header("Location:main.php?msg=Senha%20alterada%20com%20sucesso");
	}

	else{
		header("Location:main.php?pagina=alterar_senha&msg=As%20senhas%20nao%20correspondem");
	}

}

else{
	header("Location:main.php?pagina=alterar_senha&msg=Senha%20invalida");
}

?>