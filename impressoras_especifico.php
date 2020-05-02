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
    </style>



<?php

$imp = isset($_GET['imp']) ? $_GET['imp']: '';

?>





    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <!-- TABELA -->
<div class="container btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 5px; max-width: 50% ">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    
    <h4>Modelos:&nbsp;</h4>
    <a href="main.php?pagina=impressoras_especifico&imp=SL-M4020ND" class="btn btn-primary">SL-M4020ND</a>
    <a href="main.php?pagina=impressoras_especifico&imp=SL-M4070FR" class="btn btn-primary">SL-M4070FR</a>
    <a href="main.php?pagina=impressoras_especifico&imp=GC420T" class="btn btn-primary">GC420T</a>
    <a href="main.php?pagina=impressoras_especifico&imp=ZT410" class="btn btn-primary">ZT410</a>
    <a href="main.php?pagina=impressoras_especifico&imp=Ricoh" class="btn btn-primary">Ricoh</a>
    <a href="main.php?pagina=impressoras_especifico&imp=GT800" class="btn btn-primary">GT800</a>
</div>
</div>

	<?php

	$pdo = getPDO();

	$sql = "SELECT a.id_impressora, a.nr_serie, a.ip, a.e_bkp, b.id_setor, b.nm_setor, c.id_modelo, c.nm_modelo
    FROM impressora a, setor b, modelo c
    where a.id_modelo = c.id_modelo 
    and a.id_setor = b.id_setor
    and c.nm_modelo = '$imp'
    order by b.nm_setor";

    		
	$result = $pdo->query( $sql );
	$impressoras = $result->fetchAll();
    $num = sizeof($impressoras);


	?>

	<!--tabela-->  
    <!-- MSG DE RETORNO-->
    <?php $msg = isset($_GET['msg']) ? $_GET['msg']: ''; 
    if ($msg) {
      ?>
   
   <div class="container" style="margin-top: 5px">
    <div class="alert alert-success" role="alert">
             <?php

               echo $msg;

              ?>
          </div>
        <?php 
           }

    ?>
</div>

    <div class="container" id="myDIV">
	<div class="table-hover table-responsive-sm" align="center"  style="padding: 5px"> 
		<table class="table" id="tabela">
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

<?php } ?>

		</table>
	</div>
   
    </div>
     <div class="container">
    <p>Contador:
 <?php echo $num; ?> </p>
    </div>
    <br>
    <br>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->

