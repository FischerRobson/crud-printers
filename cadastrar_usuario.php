<div class="container" style="border: 5px solid grey; padding: 10px; margin-top: 5%">
	<h1 style="text-align: center;">Cadastro de Usuários</h1>
<form action="inserirLogin.php" method="POST">
  <div class="row">
    <div class="col">
    	<label>Nome do Usuário</label>
      <input type="text" name="nome" class="form-control" placeholder="Ex: Joao Silva" required>
    </div>

    <div class="col">
    	<label>Nickname</label>
      <input type="text" name="user" class="form-control" placeholder="Ex: XxjjoaoaaxX" required>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col">
    	<label>Senha de Acesso</label>
      <input type="password" name="password" class="form-control" placeholder="Senha" required>
    </div>

    <div class="col">
    	<label>Repita sua Senha</label>
      <input type="password" name="password2" class="form-control" placeholder="Repita a senha" required>
    </div>
	</div>
	<br>
	<div class="row">
    <div class="col" >
    	<label>Nível de Acesso</label>
    	<select name="nivel" class="form-control">
    		<option value="1">Administrador</option>
    		<option value="2">Basico</option>
    	</select>
    </div>
</div>


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