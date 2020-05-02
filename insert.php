<?php

include 'include/conexao.php';

$nrserie = $_POST['nserie'];
$idmodelo = $_POST['modelo'];
$idsetor = $_POST['setor'];
$ip = $_POST['ip'];
$bkp = $_POST['bkp'];


if ($nrserie != null && $idmodelo != null && $idsetor != null && $ip != null) {
		
		$pdo = getPDO();

		$sql1 = "INSERT INTO impressora (nr_serie, id_modelo, id_setor, ip, e_bkp) VALUES (:nrserie, :idmodelo, :idsetor, :ip, :bkp)";
		
		$stmt = $pdo->prepare( $sql1 );
		$stmt->bindParam( ':nrserie', $nrserie );
		$stmt->bindParam( ':idmodelo', $idmodelo );
		$stmt->bindParam( ':idsetor', $idsetor );
		$stmt->bindParam( ':ip', $ip );
		$stmt->bindParam( ':bkp', $bkp);
 
		$result1 = $stmt->execute();
		
 		if ( ! $result1 )
		{
		    var_dump( $stmt->errorInfo() );
		    exit;
		}else{
			header('Location: main.php?pagina=impressoras&msg=Impressora%20adicionada%20com%20sucesso!');
		}
		 

}

else{
	echo "Variavel nula!";
}






?>