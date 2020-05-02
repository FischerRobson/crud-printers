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



<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Impressora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="insert.php" method="POST" class="form-container">

        <input type="hidden" name="acao" value="adicionar">

        <!-- SETOR -->
        <div class="Setor">
        <label for="setor">Setor</label><br>

        <?php

        $pdo = getPDO();

        $sql = "SELECT * FROM setor";

        $result = $pdo->query($sql);
        $setores = $result->fetchAll();

        ?>

        <select id="setor" name="setor">
            <?php
            foreach ($setores as $setor ){
            ?>
            <option value="<?php echo $setor['id_setor']?>"><?php echo $setor['nm_setor']?></option>
            <?php 
            }
            ?>
        </select>
        </div>


        <!-- MODELO -->
        <div class="Modelo">
        <label for="modelo">Modelo</label><br>
        
        <?php 

        $pdo = getPDO();

        $sql = "SELECT * FROM modelo";

        $result = $pdo->query($sql);
        $modelos = $result->fetchAll();

        ?>

        <select id="modelo" name="modelo">
            <?php
            foreach ($modelos as $modelo ) {
            ?>
            <option value="<?php echo $modelo['id_modelo']?>"><?php echo $modelo['nm_modelo']?></option>
            <?php
            }
            ?>
        </select>



        </div>

        <!-- NR SERIE -->
        <div class="Nserie">
            <label for="nserie">N de Serie</label><br>
            <input type="text" id="nserie" name="nserie" onchange="myFunc()" placeholder="XxxxXXXxxxXXxXxXX" required>
        </div>

        <!-- IP -->
        <div class="IP">
            <label for="ip">IP</label><br>
            <input type="text" name="ip" id="ipCad" onchange="ipSet()" placeholder="10.10.0.0" required>
        </div>


        <!-- BKP -->
        <div class="radio"> 
            <label for="bkp">BKP</label><br>
            <input type="radio" class="check" name="bkp" value="N" checked>Não<br>
            <input type="radio" name="bkp" value="S">Sim<br>
            <br>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>

      </div>
    </div>
  </div>
</div>






    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->
    <!-- TABELA -->

   <div class="container btn-toolbar container-fluid" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 5px; max-width: 50%">
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
                 <?php

                if ($_SESSION['nivel'] == 1) {
        
                ?>

                <th></th>

                   <?php
                    }
                    ?>               
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


                 <?php

                if ($_SESSION['nivel'] == 1) {
        
                ?>

                <td><a href="delete.php?id_impressora=<?php echo $impressora["id_impressora"]; ?>"  style="color: red">Deletar</a></td>

                  <?php
                    }
                    ?>



                <td><a href="update2.php?id_impressora=<?php echo $impressora["id_impressora"]; ?>" style="color: green">Alterar</a></td>

                


			</tr>

<?php } ?>

		</table>
	</div>
    </div>
    
  <div class="container">
    <p>Contador:
        <?php echo $num; ?>
    </p>
  </div>




    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->

 <?php

      if ($_SESSION['nivel'] == 1) {
        
      ?>

<nav class="navbar navbar-light  fixed-bottom " style="position: fixed-bottom">
  <ul class="navbar-nav">
      <li class="nav-item">
        <button type="button" class="btn btn-secondary navbar-brand" data-toggle="modal" data-target="#modalExemplo">Adicionar Impressora</button>
      </li>
      
        
    </ul>
    
      
</nav>

  <?php
  }
    ?>
