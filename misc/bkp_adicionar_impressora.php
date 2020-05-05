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





    <div name="search">
        
    </div>




    <button class="open-button" type="button" class="btn btn-primary open-button" data-toggle="modal" data-target="#modalExemplo">Adicionar Impressora</button>



	<div class="form-popup" id="myForm">
  		<form action="insert.php" method="POST" class="form-container">
    	<h1>Adicionar impressora</h1>

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
    		<input type="text" name="nserie" placeholder="XxxxXXXxxxXXxXxXX" required>
    	</div>

        <!-- IP -->
    	<div class="IP">
    		<label for="ip">IP</label><br>
    		<input type="text" name="ip" placeholder="10.10.0.0" required>
    	</div>

        <div class="radio"> 
            <label for="bkp">BKP</label><br>
            <input type="radio" class="check" name="bkp" value="N" checked>Não<br>
            <input type="radio" name="bkp" value="S">Sim<br>
            <br>
        </div>

    	<button type="submit" class="btn">Confirmar</button>
    	<button type="button" class="btn cancel" onclick="closeForm()">Cancelar</button>
  		</form>
	</div>


    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->


	<?php

	$pdo = getPDO();

	$sql = "SELECT a.id_impressora, a.nr_serie, a.ip, b.id_setor, b.nm_setor, c.id_modelo, c.nm_modelo
    FROM impressora a, setor b, modelo c
    where a.id_modelo = c.id_modelo 
    and a.id_setor = b.id_setor";
		
	$result = $pdo->query( $sql );
	$impressoras = $result->fetchAll();

	?>

	<!--tabela-->
	<div class="table table-hover" align="center" id="tabela" style="padding: 15px"> 
		<table>
            <thead>
			<tr>
				<th>Setor</th>
				<th>Modelo</th>
				<th>N de Serie</th>
				<th>IP</th>
			</tr>
            </thead>

<?php

 foreach ($impressoras as $impressora) {
    
 ?>
			<tr>
				<td><?php echo $impressora["nm_setor"]; ?></td>
				<td><?php echo $impressora["nm_modelo"]; ?></td>
				<td><?php echo $impressora["nr_serie"]; ?></td>
				<td><?php echo $impressora["ip"]; ?></td>
			</tr>

<?php } ?>

		</table>
	</div>

    <!--<div class="js">
        <button onclick="aumentar()" class="button2">aumentar</button>
        <button onclick="diminuir()" class="button2">diminuir</button>
    </div>-->


    

    <!--<div style="float: right">
      <p>Desenvolvido por Rony!</p>
        <img src="img/rony.jpg" width="25%">
    </div>-->

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function aumentar(){
    document.getElementById("tabela").style.fontSize = "35px";
}

function diminuir(){
    document.getElementById("tabela").style.fontSize = "12px";
}

</script>
