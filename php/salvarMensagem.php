<?php
    require('conectarBD.php');
    $erro = true;
    $data_abertura_chamado = date("Y-m-d H:i:s");

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
                    
                    $pdo_insere = $conexao_pdo->prepare('INSERT INTO mensagens (mensagem, status, titulo) VALUES (?, ?, ?)');
                    $pdo_insere->execute( array($t_mensagem, $status, $mensagem) );
                    echo true;
               
            }

?>