<div class="container">
  <br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar Usuários</h5>
        <p class="card-text">Crie novos usuários e determine o nível de acesso.</p>
        <a href="main.php?pagina=cadastrar_usuario" class="btn btn-secondary">Cadastrar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar Setor</h5>
        <p class="card-text">Adicione novos setores no sistema.</p>
        <a href="main.php?pagina=cadastrar_setor" class="btn btn-secondary">Cadastrar</a>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar Modelo</h5>
        <p class="card-text">Adicione novos modelos de impressoras no sistema.</p>
        <a href="main.php?pagina=cadastrar_modelo" class="btn btn-secondary">Cadastrar</a>
      </div>
    </div>
  </div>


<?php


if ($_SESSION['nivel'] == 1) {

?>



  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Altere sua Senha</h5>
        <p class="card-text">Altere sua senha original para sua maior segurança.</p>
        <a href="main.php?pagina=alterar_senha" class="btn btn-info">Alterar</a>
      </div>
    </div>
  </div>


<?php
}
?>
</div>

</div>
  
