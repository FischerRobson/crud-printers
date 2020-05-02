<?php 

$pdo = getPDO();

$sql = "SELECT * FROM login";

$result = $pdo->query( $sql );
	$logins = $result->fetchAll();
?>

<!--tabela--> 
    <div class="container" id="myDIV">
	<div class="table-hover table-responsive-sm" align="center"  style="padding: 15px"> 
		<h3>Lista de Usuários</h3>
		<table class="table" id="tabela">
            <thead>
			<tr>
                <th>ID</th>
				<th>Usuario</th>
				<th>Nome</th>
				<th>Nível</th>
            </tr>
            </thead>



<?php
foreach ($logins as $login) {
	?>
	<tr>
		<td><?php echo $login["id_lg"]; ?></td>
		<td><?php echo $login["user"]; ?></td>
		<td><?php echo $login["nm_user"]; ?></td>
		<td><?php echo $login["nivel"]; ?></td>
	</tr>

<?php
	
}

?>
</table>
</div>
</div>
