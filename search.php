<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->


	<?php

    $busca = $_POST['search'];

	$pdo = getPDO();

    $sql = "SELECT *
    FROM impressora a
    INNER JOIN setor b ON a.id_setor = b.id_setor
    INNER JOIN modelo c ON a.id_modelo = c.id_modelo
    WHERE a.nr_serie LIKE '%".$busca."%' OR a.ip LIKE '%".$busca."%' OR b.nm_setor LIKE '%".$busca."%' OR c.nm_modelo LIKE '%".$busca."%'";

	
    $result = $pdo->query( $sql );
    $impressoras = $result->fetchAll();

	?>

	<!--tabela--> 
    <div class="container">
	<div class="table-hover table-responsive-sm" align="center"  style="padding: 15px"> 
		<table class="table">
            <thead>
			<tr>
				<th>Setor</th>
				<th>Modelo</th>
				<th>N de Serie</th>
				<th>IP</th>
				<th>BKP</th>
				<th></th>
				<th></th>
			</tr>
            </thead>

<?php

 foreach ($impressoras as $impressora) {
    
 ?>
			<tr>
				<td><?php echo $impressora["nm_setor"]; ?></td>
				<td><?php echo $impressora["nm_modelo"]; ?></td>
				<td><?php echo $impressora["nr_serie"]; ?></td>
				<td><a href="http://<?php echo $impressora["ip"]; ?>" target="blank"> <?php echo $impressora["ip"]; ?></a></td> 
				<td><?php echo $impressora["e_bkp"]; ?></td>
                <td><a href="delete.php?id_impressora=<?php echo $impressora["id_impressora"]; ?>"  style="color: red">Deletar</a></td>
                <td><a href="update2.php?id_impressora=<?php echo $impressora["id_impressora"]; ?>" style="color: green">Alterar</a></td>
			</tr>

<?php }  ?>

		</table>
	</div>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->

