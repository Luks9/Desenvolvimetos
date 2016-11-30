<?php
        require('conectarBD.php');
        $erro = true;
        $data_abertura_chamado = date("Y-m-d H:i:s");
        $obs2 = '';


        // Verifica se algo foi postado para publicar ou editar
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
                // Cria as variáveis
                foreach ( $_POST as $chave => $valor ) {
                        $$chave = $valor;
                        // Verifica se existe algum campo em branco
                }
                        $obs2 .= $origem." - ".$data_abertura_chamado . " - ".$obs. " *";

                        if (empty($agendado)) {
                            $agendado = $data_abertura_chamado;
                        }
                        
                        $pdo_insere = $conexao_pdo->prepare('INSERT INTO retornos (cliente, tel, tel2, cidade, origem, setor, observacao, data, status, hora_agendada) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                        $pdo_insere->execute( array($cliente, $tel, $tel2, $cidade, $origem, $setor, $obs2, $data_abertura_chamado, $status, $agendado) );
                        echo true;
                   
                }

?>

