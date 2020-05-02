<?php


session_start();
 if(!isset($_SESSION['usuario'])){
header("Location:index.php?msgRetorno=Login%20invalido");
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Impressoras</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img\icon.png">
	<script src="C:/xampp/htdocs/anime/anime-master/lib/anime.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  
  <style>
        #box {
            width: 20px;
            height: 20px;
            background: black;
        }
    </style>
	
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">IMPRESSORAS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="main.php" >Lista de Impressoras<span class="sr-only">(página atual)</span></a>
      </li>
     

       <li class="nav-item">
        <a class="nav-link" href="main.php?pagina=duvidas">Dúvidas</a>
      </li>

      <?php

      if ($_SESSION['nivel'] == 1) {
        
      ?>

       <li class="nav-item">
        <a class="nav-link" href="main.php?pagina=log">Registro</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="main.php?pagina=cadastrar">Cadastro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="main.php?pagina=listar_usuarios">Usuários</a>
      </li>
     
    
  <?php
  }
    ?>
    
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="main.php?pagina=search">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Ex: Administração" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>&nbsp;
      <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </form>
  </div>
</nav>


