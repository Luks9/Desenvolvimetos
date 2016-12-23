<?php
	session_start();
	if ( isset( $_SESSION["timeSession"] ) ) {
		if ($_SESSION["timeSession"] < time() ) {
			header('location: /lucas/agendamento/php/lockscreen.php');
		} else {
			//Seta mais tempo 60 segundos
			$_SESSION["timeSession"] = time() + 10000;
		}
	} else {
		session_destroy();
		header('location: /lucas/agendamento');
	}
?>
