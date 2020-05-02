<?php

include './include/conexao.php';

session_start();
$id_impressora = isset($_GET['id_impressora']) ? $_GET['id_impressora']: '';
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');
$acao = 'delete';
$login = $_SESSION['usuario'];

if($id_impressora){

	$pdo = getPDO();


	$sql = "SELECT *
    FROM impressora a, setor b, modelo c
    where a.id_modelo = c.id_modelo 
    and a.id_setor = b.id_setor
    AND a.id_impressora = '$id_impressora'";

$result_sql = $pdo->query( $sql );
$impressoras = $result_sql->fetchAll();

				$id_impressora = $impressoras[0]["id_impressora"];
				$id_setor = $impressoras[0]["id_setor"];
				$id_modelo = $impressoras[0]["id_modelo"];
				$nr_serie = $impressoras[0]["nr_serie"];
				$ip = $impressoras[0]["ip"];

				
$sql_log = "INSERT INTO log (id_setor, id_modelo, nr_serie, ip, id_impressora, data, acao, login) VALUES (:setor, :modelo, :nrserie, :ip, :id_impressora, :data, :acao, :login )";


$stmt_log = $pdo->prepare( $sql_log );
    $stmt_log->bindParam( ':nrserie', $nr_serie );
    $stmt_log->bindParam( ':modelo', $id_modelo );
    $stmt_log->bindParam( ':setor', $id_setor );
    $stmt_log->bindParam( ':ip', $ip );
    $stmt_log->bindParam( ':id_impressora', $id_impressora );
    $stmt_log->bindParam( ':data', $date );
    $stmt_log->bindParam( ':acao', $acao );
    $stmt_log->bindParam( ':login', $login );
    
 
    $result = $stmt_log->execute();

 if ($result) {
 	$sql = "DELETE FROM impressora WHERE id_impressora = :id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam( ':id', $id_impressora );
	
		$result1 = $stmt->execute();
		
		if ( ! $result1 )
		{
		    var_dump( $stmt->errorInfo() );
		    exit;

		}else{
			header('Location: main.php?pagina=impressoras&msg=Impressora%20excluida%20com%20sucesso!');
		}
 }

 else{
 	echo "$result deu erro";
 }



		 




}
else{
	echo "sem id";
}



?>