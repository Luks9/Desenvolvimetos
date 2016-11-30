<?php
        require('conectarBD.php');
        $erro = false;
        $data_da_mensagem = date("Y-m-d H:i:s");
        $usuario = $_SESSION['nome_usuario'];
        $foto_usuario_chat = $_SESSION['foto'];
        $anexo = '.';
        $kmz = '.';
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


                        if (!$_POST['id_chat']) {
                                $return2 = false;
                                echo $return2;

                        }

            else {
                                $pdo_insere = $conexao_pdo->prepare('INSERT INTO t_chamados_chat (mensagem,data_da_mensagem,usuario,foto_usuario_chat,id_chat,anexo,kmz) VALUES (?, ?, ?, ?, ?, ?, ?)');
                                $pdo_insere->execute( array($mensagem,$data_da_mensagem,$usuario,$foto_usuario_chat,$id_chat,$anexo,$kmz) );
                                $return = true;
                                echo $return;
                        }
                }

?>
