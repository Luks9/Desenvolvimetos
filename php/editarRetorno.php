<?php
    require('conectarBD.php');
    $erro = false;
    $id_user_log = $_SESSION['user_id'];
    $dateNow = date("Y-m-d H:i:s");
    $obs="";
    //echo $s_id;
    //Verifica se algo foi postado para publicar ou editar
    if ( isset( $_POST ) && ! empty( $_POST ) ) {
        // Cria as variáveis
        foreach ( $_POST as $chave => $valor ) {
            $$chave = $valor;
        }
        if ( $erro == false ) {
            // Se o usuário não existir, return false pro ajax
            //} else {
            $stmt = $conexao_pdo->prepare("SELECT observacao, id_usuario, tempo_atendimento FROM retornos WHERE id='$id'");
            $stmt->execute();
            while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $obs2 = $r['observacao'];
                $id_usuario = $r['id_usuario'];
                $inicio = $r['tempo_atendimento'];
            }

            if ($obs) {
                $obs2 .= $user." - ".$dateNow ." - ".$obs. " *";
            }else{$obs = "";}

            if (empty($agendado)) {
                $agendado = $dateNow;
            }

            $pdo_insere = $conexao_pdo->prepare("UPDATE retornos SET setor = ?, observacao = ?, hora_agendada = ?, status = ?, usuario = ? WHERE id ='$id'");
            $pdo_insere->execute( array($setor, $obs2, $agendado, $status, $usuario) );
            
        }
        echo $erro;
    }
?>