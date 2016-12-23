<?php
	// Inicia a sessão
	session_start();
	date_default_timezone_set('America/Fortaleza');
	// Variável que verifica se o usuário está logado
	if ( ! isset( $_SESSION['logado'] ) ) {
		$_SESSION['logado'] = false;
	}
	// Erro do login
	$_SESSION['login_erro'] = false;
	// Variáveis da conexão com o banco de dados
	$base_dados  = 'agendamento';
	$usuario_bd  = 'postgres';
	$senha_bd    = '#shippuudenmateus#';
	$host_db     = '187.19.196.9';
	$charset_db  = 'UTF8';
	$conexao_pdo = null;
	// Concatenação das variáveis para detalhes da classe PDO
	$detalhes_pdo  = 'pgsql:host=' . $host_db . ';';
	$detalhes_pdo .= 'dbname='. $base_dados . ';';
	//$detalhes_pdo .= 'charset=' . $charset_db . ';';
	// Tenta conectar
	try {
		// Cria a conexão PDO com a base de dados
		$conexao_pdo = new PDO($detalhes_pdo, $usuario_bd, $senha_bd);
	} catch (PDOException $e) {
		// Se der algo errado, mostra o erro PDO
		print "Erro: " . $e->getMessage() . "<br/>";
		// Mata o script
		die();
	}
?> 


