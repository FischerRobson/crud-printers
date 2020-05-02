<div class="container" style="border: 5px solid grey; padding: 10px; margin-top: 5%">
	<h1 style="text-align: center;">Cadastro de Setores</h1>
<form action="inserirSetor.php" method="POST">
  <div class="row">
    <div class="col">
    	<label>Nome do Setor</label>
      <input type="text" name="nome" class="form-control" placeholder="Ex: Centro Cirúrgico" required>
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
  
    	<button class="btn btn-danger" onclick="window.location='main.php?pagina=cadastrar'">Cancelar</button>
  </div>

</form>
</div>
</div>