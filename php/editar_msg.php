<?php
    require('conectarBD.php');
    $erro = false;

    // Verifica se algo foi postado para publicar ou editar
    if ( isset( $_POST ) && ! empty( $_POST ) ) {
            // Cria as variáveis
            foreach ( $_POST as $chave => $valor ) {
                    $$chave = $valor;
                    // Verifica se existe algum campo em branco
            }

                    if (empty($agendado)) {
                        $agendado = $data_abertura_chamado;
                    }
                    
                    $pdo_insere = $conexao_pdo->prepare("UPDATE mensagens SET mensagem = ? WHERE id ='$id'");
            		$pdo_insere->execute( array($msg_edit) );
               
            }

?>