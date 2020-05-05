<?php

function getPDO(){

try
{
    $PDO = new PDO( 'mysql:host=localhost;dbname=impressoras', 'root', null );
    return $PDO;
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

}



?>