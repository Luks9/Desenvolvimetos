<?php
        require('conectarBD.php');
        $erro = false;
        $status_chamado = true;
        $data_abertura_chamado = date("Y-m-d H:i:s");
        $aberto_por = $_SESSION['nome_usuario'];
        $foto = $_SESSION['foto'];
        $situacao_do_chamado = 'Aberto';
        $anexo = '.';
        $status_final = 'Aberto';
        $finalizado_por = 'sistema';
        $reaberto_por = 'sistema';
        $data_fechamento = 'Não Finalizado';
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

                if ($relatorio=='sistema') {
                        $stmt = $conexao_pdo->prepare("SELECT id, aberto_por, servidor, cidade, operador_de_rede, situacao_do_chamado, data_abertura_chamado FROM t_chamados WHERE data_abertura_chamado BETWEEN '$data_1' AND '$data_2'");
                        $stmt->execute();
                        $result = array();
                        $TotalRegistros = $stmt->rowCount();
                        while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
                        }
                        echo (json_encode($result));
                }
                elseif ($relatorio=='pessoa') {
                        $stmt = $conexao_pdo->prepare("SELECT id, aberto_por, servidor, cidade, operador_de_rede, situacao_do_chamado, data_abertura_chamado FROM t_chamados WHERE operador_de_rede = '$operador_de_rede' AND data_abertura_chamado BETWEEN '$data_1' AND '$data_2'");
                        $stmt->execute();
                        $result = array();
                        $TotalRegistros = $stmt->rowCount();
                        while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
                        }
                        echo (json_encode($result));
                }
                elseif ($relatorio=='servidor') {
                        $stmt = $conexao_pdo->prepare("SELECT id, aberto_por, servidor, cidade, operador_de_rede, situacao_do_chamado, data_abertura_chamado FROM t_chamados WHERE servidor = '$servidor' AND data_abertura_chamado BETWEEN '$data_1' AND '$data_2'");
                        $stmt->execute();
                        $result = array();
                        $TotalRegistros = $stmt->rowCount();
                        while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
                        }
                        echo (json_encode($result));
                }
                elseif ($relatorio=='cidade') {
                        $stmt = $conexao_pdo->prepare("SELECT id, aberto_por, servidor, cidade, operador_de_rede, situacao_do_chamado, data_abertura_chamado FROM t_chamados WHERE cidade = '$cidade' AND data_abertura_chamado BETWEEN '$data_1' AND '$data_2'");
                        $stmt->execute();
                        $result = array();
                        $TotalRegistros = $stmt->rowCount();
                        while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
                        }
                        echo (json_encode($result));
                }
        }

?>
