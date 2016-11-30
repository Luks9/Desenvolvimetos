<?php
require ('../php/conectarBD.php');
	
	$id_user_log = $_SESSION['user_id'];
	$tipo = $_SESSION['tipo'];

	if ($_GET['cod']=='ligar') {
	
		$id = $_GET['id'];
		$usuario = $_SESSION['usuario'];
		$stmt = $conexao_pdo->prepare("SELECT status, id_usuario, tempo_atendimento FROM retornos WHERE id = '$id'");
	    $stmt->execute();
	    $result = array();
	    while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
	      $result[] = $r;
	     
	      if ($r['id_usuario'] == $id_user_log || $tipo == 'admin') {
	    		$username = 'acessoAPI';
				$password = '64ORoCQd';
				
				$ramal = $_SESSION['ramal'];
				$tel = $_GET['telefone'];

				$queryString = array(
				    'telefone' => $tel,
				    'ramal' => $ramal
				);
				
				$url = "http://instalacoes.brisanet.com.br/api/discar?".http_build_query($queryString);
				
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				$retorno = (curl_exec($curl));
				curl_close($curl);
				
				if (empty($r['tempo_atendimento'])) {
					$dateNow = date("Y-m-d H:i:s");
				}else{
					$dateNow = $r['tempo_atendimento'];
				}

				$status = "Em atendimento";
				
				$id_user = $_SESSION['user_id'];

				$pdo_insere = $conexao_pdo->prepare("UPDATE retornos SET status = ?, id_usuario =?, tempo_atendimento = ?, usuario = ? WHERE id ='$id'");
		        $pdo_insere->execute( array($status, $id_user, $dateNow, $usuario) );

		    	echo $status;
	    
		    }else{
		    	echo '2';
			}
	    }

   }elseif ($_GET['cod']=='search') {
   	$id =$_GET['id'];

	$sql = $conexao_pdo->prepare("SELECT * FROM retornos WHERE id = $id");
	$sql->execute();
	$result = array();
			while($r = $sql->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $r;
			}
	echo (json_encode($result));
   }else {
   	
	$id = $_GET['id'];

	$status = "Finalizado";
	$dateNow = date("Y-m-d H:i:s");
	$obs ="";
	$stmt = $conexao_pdo->prepare("SELECT id_usuario, observacao FROM retornos WHERE id='$id'");
    $stmt->execute();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $obs2 = $r['observacao'];
        $id_usuario = $r['id_usuario'];
    }

    if ($id_user_log == $id_usuario || $tipo == "admin") {
    	$nomeUsuario = $_SESSION['usuario'];

    	$obs .= $obs2."Finalizado por ".$nomeUsuario." *";
		$pdo_insere = $conexao_pdo->prepare("UPDATE retornos SET status = ?, hora_fim_atendimento = ?, observacao = ? WHERE id='$id'");
        $pdo_insere->execute( array($status, $dateNow, $obs));
        echo true;

    }else{
    	echo '2';
    }

   }
?>