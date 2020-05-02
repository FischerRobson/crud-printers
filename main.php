

<?php

	$paginaInicial = 'impressoras';

	include './include/conexao.php';

	include './topo.php';

	$pagina = isset($_GET['pagina']) ? $_GET['pagina']: '';

	if($pagina){		
		include './'.$pagina.'.php';
	}else{
		include './'.$paginaInicial.'.php';
	}

		include './footer.php';



?>


