<?php
	require('conectarBD.php');
	$erro = false;
	// Verifica se algo foi postado para publicar ou editar
	if ( isset( $_POST ) && ! empty( $_POST ) ) {
		// Cria as variáveis
		foreach ( $_POST as $chave => $valor ) {
			$$chave = $valor;
			// Verifica se existe algum campo em branco
			if ( empty ( $valor ) ) {
				// Preenche o erro
				$erro = 'Existem campos em branco.';
			}
		}
			
			$stmt = $conexao_pdo->prepare("SELECT id, nome_servidor FROM t_servidores order by id desc LIMIT 1");
			$stmt->execute();
			$result = array();
			while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$result = $r['nome_servidor'];
			}
			
			if ($result == $_POST['nome_servidor']) {
				$return2 = false;
				echo $return2;
			}
            else {
				$pdo_insere = $conexao_pdo->prepare('INSERT INTO t_servidores (nome_servidor,configuracao) VALUES (?, ?)');
				$pdo_insere->execute( array($nome_servidor,$configuracao) );
				$return = true;
				echo $return;
			}
		}
	
?>