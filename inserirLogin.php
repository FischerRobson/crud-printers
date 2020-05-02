<?php

include 'include/conexao.php';
include 'script/password.php';
$pdo = getPDO(); 

$nome = $_POST['nome'];
$user = $_POST['user'];
$senha = $_POST['password'];
$senha2 = $_POST['password2'];
$nivel = $_POST['nivel'];


$sql_verifica = "SELECT * FROM login WHERE user like '$user'";

$result = $pdo->query( $sql_verifica );
$resultado = $result->fetchAll();


if(sizeof($resultado) == 0){

	if ($senha != $senha2) {
		header("Location:main.php?pagina=cadastrar_usuario&msg=As%20senhas%20nao%20correspondem!");
	}

	else{
			$sql_login = "INSERT INTO login (user, password, nm_user, nivel) VALUES (:user, :psw, :nm, :nvl)";

			$stmt = $pdo->prepare($sql_login);
			$stmt->bindParam(':user', $user);
			$stmt->bindParam(':psw', md5($senha));
			$stmt->bindParam(':nm', $nome);
			$stmt->bindParam(':nvl', $nivel);

			$result = $stmt->execute();

			if ($result) {
				header('Location: main.php');
			}
			else{
				echo "Erro";
			}
	}

}
else{
	header("Location:main.php?pagina=cadastrar_usuario&msg=Este%20usuario%20ja%20existe!");
}

?>