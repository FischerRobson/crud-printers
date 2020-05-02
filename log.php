<style type="text/css">
.form-popup .radio{
font-size: 18px;
}

.button2{
 display:inline-block;
 padding:0.5em 3em;
 border:0.16em solid #3393FF;
 /*margin:0 0.3em 0.3em 0;*/
 box-sizing: border-box;
 text-decoration:none;
 text-transform:uppercase;
 font-family:'Roboto',sans-serif;
 font-weight:400;
 color:#3393FF;
 text-align:center;
 transition: all 0.15s;
 background-color: #ffffff;
}
.button2:hover{
 color:#2ECC71;
 border-color:#2ECC71;
}
.button2:active{
 color:#BBBBBB;
 border-color:#BBBBBB;
}
h1{
    text-align: center;
}

    </style>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <!-- TABELA -->

    <h1>Registro de Alterações</h1>

	<?php

	$pdo = getPDO();

	$sql = "SELECT a.id_impressora, a.nr_serie, a.ip, a.data, a.acao, a.login, b.id_setor, b.nm_setor, c.id_modelo, c.nm_modelo
    FROM log a, setor b, modelo c
    where a.id_modelo = c.id_modelo 
    and a.id_setor = b.id_setor
    order by a.id_impressora";

    		
	$result = $pdo->query( $sql );
	$impressoras = $result->fetchAll();

	?>

	<!--tabela--> 
    <div class="container" id="myDIV">
	<div class="table-hover table-responsive-sm" align="center"  style="padding: 15px"> 
		<table class="table" id="tabela">
            <thead>
			<tr>
                <th>ID</th>
				<th>Setor</th>
				<th>Modelo</th>
				<th>N de Serie</th>
				<th>IP</th>
				<th>Data da Modificação</th>
				<th>Ação</th>
				<th>Login</th>
                
                

            </tr>
            </thead>

<?php

 foreach ($impressoras as $impressora) {
    
 ?>
			<tr>
                <td><?php echo $impressora["id_impressora"]; ?></td>
				<td><?php echo $impressora["nm_setor"]; ?></td>
				<td><?php echo $impressora["nm_modelo"]; ?></td>
				<td><?php echo $impressora["nr_serie"]; ?></td>
				<td><a href="http://<?php echo $impressora["ip"]; ?>" target="blank"> <?php echo $impressora["ip"]; ?></a></td> 
				<td><?php echo $impressora["data"]; ?></td>
				<td><?php echo $impressora["acao"]; ?></td>
				<td><?php echo $impressora["login"]; ?></td>
                
               

                


			</tr>

<?php } ?>

		</table>
	</div>
    </div>


    <br>
    <br>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->



