<?php

include 'include/conexao.php';
$pdo = getPDO(); 

$nome = $_POST['nome'];


$sql_verifica = "SELECT * FROM setor WHERE nm_setor like '%$nome%'";

$result = $pdo->query( $sql_verifica );
$resultado = $result->fetchAll();


if(sizeof($resultado) == 0){

			$sql_setor = "INSERT INTO setor (nm_setor) VALUES (:setor)";

			$stmt = $pdo->prepare($sql_setor);
			$stmt->bindParam(':setor', $nome);
			
			$result = $stmt->execute();

			if ($result) {
				header('Location: main.php');
			}
			else{
				echo "Erro";
			}
	

}
else{
	header("Location:main.php?pagina=cadastrar_setor&msg=Este%20setor%20ja%20existe!");
}

?>