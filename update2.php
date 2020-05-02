<?php

include './include/conexao.php';
include './topo.php';


$id_impressora = isset($_GET['id_impressora']) ? $_GET['id_impressora']: '';
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');
$acao = 'update';
$login = $_SESSION['usuario'];


if($id_impressora){

	$pdo = getPDO();

$sql = "SELECT *
    FROM impressora a, setor b, modelo c
    where a.id_modelo = c.id_modelo 
    and a.id_setor = b.id_setor
    AND a.id_impressora = '$id_impressora'";

  $result = $pdo->query( $sql );
	$impressoras = $result->fetchAll();

		if ( ! $impressoras ){
		    var_dump( $stmt->errorInfo() );
		    exit;

		}
		else{
			
			
				$id_impressora = $impressoras[0]["id_impressora"];
				$id_setor = $impressoras[0]["id_setor"];
				$id_modelo = $impressoras[0]["id_modelo"];
				$nr_serie = $impressoras[0]["nr_serie"];
				$ip = $impressoras[0]["ip"];

				?>

<div class="container" style="margin-top: 15px">
<table class="table table-dark table-sm table-responsive-xl">
  <form action="atualizar2.php?id_impressora=<?php echo $id_impressora; ?>" method="POST">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Setor</th>
      <th scope="col">Modelo</th>
      <th scope="col">Nr de Serie</th>
      <th scope="col">IP</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="color: white; font-size: 40px; width: 2%"><?php  echo $id_impressora; ?></td>


<!-- LOG -->
<?php

$sql_log = "INSERT INTO log (id_setor, id_modelo, nr_serie, ip, id_impressora, data, acao, login) VALUES (:setor, :modelo, :nrserie, :ip, :id_impressora, :data, :acao, :login )";


$stmt_log = $pdo->prepare( $sql_log );
    $stmt_log->bindParam( ':nrserie', $nr_serie );
    $stmt_log->bindParam( ':modelo', $id_modelo );
    $stmt_log->bindParam( ':setor', $id_setor );
    $stmt_log->bindParam( ':ip', $ip );
    $stmt_log->bindParam( ':id_impressora', $id_impressora );
    $stmt_log->bindParam( ':data', $date );
     $stmt_log->bindParam( ':acao', $acao );
     $stmt_log->bindParam( ':login', $login );
 
    $result1 = $stmt_log->execute();


if ($_SESSION['nivel'] == 1) {


?>






      <!-- SETOR -->
      <td style="color: white; width: 15%">
      	<?php

        $pdo = getPDO();

        $sql = "SELECT * FROM setor";

        $result = $pdo->query($sql);
        $setores = $result->fetchAll();

        ?>

        <select id="setor" name="setor" >
            <?php
            foreach ($setores as $setor ){
            ?>
            <option <?php if ( $id_setor == $setor['id_setor'] ) echo 'selected' ; ?> value="<?php echo $setor['id_setor']; ?>"><?php echo $setor['nm_setor']?></option>
            <?php 
            }
            ?>
        </select></td>




      <td style="color: white; width: 20%">
        <?php 

        $pdo = getPDO();

        $sql = "SELECT * FROM modelo";

        $result = $pdo->query($sql);
        $modelos = $result->fetchAll();

        ?>

        <select id="modelo" name="modelo" style="width: 80%">
            <?php
            foreach ($modelos as $modelo ) {
            ?>
            <option  <?php if ( $id_modelo == $modelo['id_modelo'] ) echo 'selected' ; ?> value="<?php echo $modelo['id_modelo']?>"><?php echo $modelo['nm_modelo']?></option>
            <?php
            }
            ?>
        </select>
      </td>



      <td style="color: white; padding-top: 15px; width: 20% "> <input type="text" class="form-control" id="nr_serie" name="nr_serie" value="<?php echo $nr_serie; ?>"> </td>



      <td style="color: white; padding-top: 15px; width: 15%">  <input type="text" class="form-control" id="ip" name="ip" value="<?php echo $ip; ?>"></td>
    </tr>
  </tbody>
  
  
</table>
<button class="btn btn-outline-success" type="submit" value="Submit">Confirmar</button>
</form>
</div>

				<?php 
			
		}

    else{
      ?>

        <td style="color: white; width: 15%">
        <?php

        $pdo = getPDO();

        $sql = "SELECT * FROM setor";

        $result = $pdo->query($sql);
        $setores = $result->fetchAll();

        ?>

        <select id="setor" name="setor" >
            <?php
            foreach ($setores as $setor ){
            ?>
            <option <?php if ( $id_setor == $setor['id_setor'] ) echo 'selected' ; ?> value="<?php echo $setor['id_setor']; ?>"><?php echo $setor['nm_setor']?></option>
            <?php 
            }
            ?>
        </select></td>




      <td style="color: white; width: 20%; text-align: center; font-size: 35px">
        <?php 

        $pdo = getPDO();

        $sql = "SELECT * FROM modelo WHERE id_modelo = '$id_modelo' ";

        $result = $pdo->query($sql);
        $modelo = $result->fetchAll();

        echo $modelo[0]['nm_modelo'];
        ?>

        
      </td>



      <td style="color: white; padding-top: 15px; width: 20% "> <input type="text" class="form-control" id="nr_serie" name="nr_serie" value="<?php echo $nr_serie; ?>" disabled> </td>



      <td style="color: white; padding-top: 15px; width: 15%">  <input type="text" class="form-control" id="ip" name="ip" value="<?php echo $ip; ?>" disabled></td>
    </tr>
  </tbody>
  
  
</table>
<button class="btn btn-outline-success" type="submit" value="Submit">Confirmar</button>
</form>
</div>
     










<?php



    }
}//else - acao

}//if $impressora





else{
	echo "id não encontrado";
}

 


?>