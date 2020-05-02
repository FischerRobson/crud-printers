<?php

include './include/conexao.php';

$id_impressora = isset($_GET['id_impressora']) ? $_GET['id_impressora']: '';
$id_setor = $_POST['setor'];
$id_modelo = $_POST['modelo'];
$nr_serie = $_POST['nr_serie'];
$ip = $_POST['ip'];


if ($id_impressora) {

	$pdo = getPDO();

	
$sql = "UPDATE impressora SET id_setor = :ids, id_modelo = :idm, nr_serie = :nrs, ip = :ip WHERE id_impressora = :idi";

$stmt = $pdo->prepare( $sql );
		$stmt->bindParam( ':ids', $id_setor );
		$stmt->bindParam( ':idm', $id_modelo );
		$stmt->bindParam( ':nrs', $nr_serie );
		$stmt->bindParam( ':ip', $ip );
		$stmt->bindParam( ':idi', $id_impressora);
			$result = $stmt->execute();

	if ( ! $result )
		{
		    var_dump( $stmt->errorInfo() );
		    exit;
		}
	else{
			header('Location: main.php');
		}

}
else{
	echo "id não encontrado";
}




?>