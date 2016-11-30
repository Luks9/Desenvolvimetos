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

                        $stmt = $conexao_pdo->prepare("SELECT usuario FROM usuarios WHERE usuario = '$usuario'");
                        $stmt->execute();
                        $result = "";
                        while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result = $r['usuario'];
                        }

                        if ($result) {
                                $return2 = false;
                                echo $return2;
                        }else {

                            $foto = 'foto.png';
                            $pdo_insere = $conexao_pdo->prepare('INSERT INTO usuarios (nome,usuario,senha,ramal,setor,foto, email, tipo, ativo) VALUES (?, ?, ?, ?, ?, ?,?,?,?)');
                            $pdo_insere->execute( array($nome,$usuario,md5($senha),$ramal,$setor,$foto, $email, $tipo ,true) );
                            $return = true;
                            echo $return;
                        }
                }

?>