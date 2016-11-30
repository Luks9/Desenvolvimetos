  <?php


  /* METODO CONCLUIR CHAMADO DE VEZ COM CONFIRMAÇÃO DO SUPORTE */

      if($_GET['metodo'] == 'finalizarChamado')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $valor = 'Resolvido';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET status_final = :nome  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Confirmado com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/index.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }

    /* FIM DO METODO GET */



    /* TOTAL DE REGISTROS ENCONTRADOS */

    function totalChamadosFinalizado() {
    require ('conectarBD.php');     
    $usuarioLogado = $_SESSION['nome_usuario'];   
    $stmt = $conexao_pdo->prepare("SELECT * FROM t_chamados WHERE (situacao_do_chamado = 'Resolvido') AND (status_final = 'Aberto') AND (aberto_por = '$usuarioLogado')");
    $stmt->execute();
    $total = $stmt->rowCount();
    echo $total;
    } 

   /* FIM FUNCAO */

  function ConfirmarChamadoResolvido() {

          require ('conectarBD.php');     
          $usuarioLogado = $_SESSION['nome_usuario'];     
          $stmt = $conexao_pdo->prepare("SELECT * FROM t_chamados WHERE (situacao_do_chamado = 'Resolvido') AND (status_final = 'Aberto') AND (aberto_por = '$usuarioLogado')");
          $stmt->execute();
          $result = array();
              while($r = $stmt->fetch(PDO::FETCH_ASSOC))   {
                $result[] = $r;
              echo' <ul class="menu">
                 <li><!-- start message -->
                     <a href="chamados_chat.php?id='.$r['id'].'">
                       <div class="pull-left">
                       <img src="../dist/img/shield-ok-icon.png" class="img-circle" alt="User Image">
                        </div>
                         <h4>
                           '.$r['operador_de_rede'].'
                        </h4>
                        <p>Ver a solução do problema !</p>
                      </a>
                      <a href="../php/funcoesAvisos.php?id='.$r['id'].'&metodo=finalizarChamado"><span class="label label-danger" style="font-size:12px;">Confirmar Solução</span></a>
                   </li>
                </ul>';
             }
        }
?>