<?php

include 'include/conexao.php';
$pdo = getPDO(); 

$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];


$sql_verifica = "SELECT * FROM modelo WHERE nm_modelo like '%$modelo%'";

$result = $pdo->query( $sql_verifica );
$resultado = $result->fetchAll();


if(sizeof($resultado) == 0){

			$sql_setor = "INSERT INTO modelo (nm_modelo, nm_marca) VALUES (:modelo, :marca)";

			$stmt = $pdo->prepare($sql_setor);
			$stmt->bindParam(':modelo', $modelo);
			$stmt->bindParam(':marca', $fabricante);
			
			$result = $stmt->execute();

			if ($result) {
				header('Location: main.php');
			}
			else{
				echo "Erro";
			}
	

}
else{
	header("Location:main.php?pagina=cadastrar_modelo&msg=Este%20modelo%20ja%20existe!");
}

?>