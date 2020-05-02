<div class="container" style="border: 5px solid grey; padding: 10px; margin-top: 5%">
	<h1 style="text-align: center;">Cadastro de Modelos</h1>
<form action="inserirModelo.php" method="POST">
  <div class="row">
    <div class="col">
    	<label>Nome do Modelo</label>
      <input type="text" name="modelo" class="form-control" placeholder="Ex: SL-M4020ND" required>
    </div>
    <div class="col">
      <label>Nome do Fabricante</label>
      <input type="text" name="fabricante" class="form-control" placeholder="Ex: Samsung" required>
    </div>
</div>
<br>

    <!-- MSG DE RETORNO-->
    <?php $msg = isset($_GET['msg']) ? $_GET['msg']: ''; 
    if ($msg) {
      ?>
   
    <div class="alert alert-danger" role="alert">
             <?php

               echo $msg;

              ?>
          </div>
        <?php 
           }

    ?>


<div style="text-align: right;">
    <div >
    	<button type="submit" class="btn btn-success">Confirmar</button>
  
    	<button class="btn btn-danger" onclick="window.location='main.php?pagina=cadastrar'" href="main.php">Cancelar</button>
  </div>

</form>
</div>
</div>