<div class="container" style="border: 5px solid grey; padding: 10px; margin-top: 5%">
	<h1 style="text-align: center;">Alterar Senha</h1>
<form action="validaSenha.php" method="POST">
   <div class="row">
    <div class="col">
    	<label>Senha Antiga</label>
      <input type="password" name="passwordold" class="form-control" placeholder="Senha" required>
    </div>
</div>


	<br>
   <div class="row">
    <div class="col">
    	<label>Digite sua Nova Senha</label>
      <input type="password" name="password" class="form-control" placeholder="A senha deve ser diferente" required>
    </div>

    <div class="col">
    	<label>Repita sua Senha</label>
      <input type="password" name="password2" class="form-control" placeholder="Repita a senha" required>
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
  
    	<a class="btn btn-danger" href="main.php">Cancelar</a>
  </div>

</form>
</div>
</div>