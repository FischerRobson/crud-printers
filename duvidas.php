	<div class="container">
		<h3> Dúvidas </h3>	
		<p>Caso tenha encontrado algum erro ou falha de execução por favor contatar o Estágiario!</p>
		<!-- <img src="img/rony.jpg" width="25%">  -->



		<?php 

		if ($_SESSION['nivel'] == 2 ) {
		
		?>

		<div style="">
		<p>Deseja alterar sua senha?<p>
		<a href="main.php?pagina=alterar_senha" class="btn btn-info">Clique aqui!</a>
		</div>

		<?php
		}
		?>


		</div>
	