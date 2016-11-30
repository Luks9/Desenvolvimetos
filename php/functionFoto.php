<?php
	require ('conectarBD.php');
	$usuario = $_SESSION['usuario'];
	$stmt = $conexao_pdo->prepare("SELECT foto FROM usuarios WHERE usuario = :name LIMIT 1;");
	$stmt->bindParam(':name', $usuario, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$image = '../php/Fotos/' . "" . implode("", $result[0]) . "";
?>


