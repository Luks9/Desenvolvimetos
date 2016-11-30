<?php

$usuarioLogado = $_SESSION['nome_usuario'];

function listarCidades() {
            /* Listamos os tecnicos referentes ao supervisor em questão */
require ('conectarBD.php');
$stmt2 = $conexao_pdo->prepare("SELECT * FROM cidades");
$stmt2->execute();
while($r = $stmt2->fetch(PDO::FETCH_ASSOC)) {
       echo '<option>'.$r['nome'].'/'.$r['estado'].'</option>';
      }
}

function listarUsuariosEdit() {


require ('conectarBD.php');
$stmt = $conexao_pdo->prepare("SELECT * FROM usuarios ");
$stmt->execute();
$result = array();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC))   {
      $result[] = $r;
      echo "<tr>";
      echo "<td >" .$r['id'] . "</td>";
      echo "<td>" . $r['nome'] . "</td>";
      echo "<td>" . $r['usuario'] .  "</td>";
      echo "<td>" . $r['ramal'] .  "</td>";
      echo "<td>" . $r['setor'] .  "</td>";
      echo "<td>".'<a href="novoUsuario.php?id='.$r['id'].'&nome='. $r['nome'] .'&usuario='. $r['usuario']. '&ramal='. $r['ramal']. '&setor='. $r['setor'] . '&senha='. $r['senha'] .'&metodo=Editar"><i class="fa fa-fw fa-pencil"></i>'.'</a>'."</td>";
      echo "<td>".'<a href="../php/funcoes.php?id='.$r['id'].'&metodo=DeletarUser"><i class="fa fa-fw fa-eraser"></i>'.'</a>'."</td>";


      echo "</tr>";
    }
  }

function listarCidadesEdit() {


require ('conectarBD.php');
$stmt = $conexao_pdo->prepare("SELECT * FROM t_cidades ");
$stmt->execute();
$result = array();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC))   {
      $result[] = $r;
      echo "<tr>";
      echo "<td >" .$r['id'] . "</td>";
      echo "<td>" . $r['nome'] . "</td>";
      echo "<td>" . $r['estado'] .  "</td>";
      echo "<td>".'<a href="novaCidade.php?id='.$r['id'].'&nome='. $r['nome'] .'&estado='. $r['estado'] .'&metodo=EditarCidade"><i class="fa fa-fw fa-pencil"></i>'.'</a>'."</td>";

      echo "</tr>";
    }
  }


function listarLabelsEdit() {

require ('conectarBD.php');
$stmt = $conexao_pdo->prepare("SELECT * FROM t_labels ");
$stmt->execute();
$result = array();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC))   {
      $result[] = $r;
      $cor = $r['cor'];
      echo "<tr>";
      echo "<td >" .$r['id_label'] . "</td>";
      echo "<td>" . $r['nome'] . "</td>";
      echo "<td>" . '<div class="bg-'.$cor.'-active color-palette"></div>'."</td>";

      echo "<td>".'<a href="novoLabels.php?id_label='.$r['id_label'].'&nome='. $r['nome'] .'&cor='. $r['cor'] .'&metodo=EditarLabel"><i class="fa fa-fw fa-pencil"></i>'.'</a>'."</td>";

      echo "</tr>";
    }
  }




      // Reabrir Chamado
    if($_GET['metodo'] == 'reabrir')
    {
      try
      {
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET status_chamado = true , situacao_do_chamado = 'Aberto', reaberto_por = :usuario WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':usuario', $_SESSION['usuario'], PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Chamado Reaberto')</script>";
    echo "<script>location.href = '/chamados/pages/'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }
 
  // Editar Servidor
    if($_GET['editar'] == 'ok')
    {
      try
      {
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("UPDATE t_servidores SET nome_servidor = :nome_servidor, configuracao = :configuracao WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome_servidor', $_GET['nome_servidor'], PDO::PARAM_STR);
    $stmt->bindParam(':configuracao', $_GET['configuracao'], PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Servidor Foi Alterado !')</script>";
    echo "<script>location.href = '/agendamento/pages/novoServidor.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }

      // Editar Cidade
    if($_GET['editarCidade'] == 'ok')
    {
      try
      {
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("UPDATE t_cidades SET nome = :nome, estado = :estado WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $_GET['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':estado', $_GET['estado'], PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Cidade Foi Alterada !')</script>";
    echo "<script>location.href = '/chamados/pages/novaCidade.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }



         // Editar Cidade
    if($_GET['editarUsuario'] == 'ok')
    {
      try
      {
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("UPDATE usuarios SET nome = :nome, usuario = :usuario,
    ramal = :ramal, setor = :setor, senha = :senha WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $_GET['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $_GET['usuario'], PDO::PARAM_STR);
    $stmt->bindParam(':ramal', $_GET['ramal'], PDO::PARAM_STR);
    $stmt->bindParam(':setor', $_GET['setor'], PDO::PARAM_STR);
    $stmt->bindParam(':senha', md5($_GET['senha']), PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Usuário Foi Atualizado !')</script>";
    echo "<script>location.href = '/agendamento/pages/novoUsuario.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    } 


          // Editar Label
    if($_GET['editarLabel'] == 'ok')
    {
      try
      {
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("UPDATE t_labels SET nome = :nome, cor = :cor WHERE id_label = :id");
    $stmt->bindParam(':id', $_GET['id_label'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $_GET['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':cor', $_GET['cor'], PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Label Foi Alterado !')</script>";
    echo "<script>location.href = '/chamados/pages/novoLabels.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }


   // Deletar User
    if($_GET['metodo'] == 'DeletarUser')
    {
      try
      {
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    echo "<script>alert('Usuário Deletado')</script>";
    echo "<script>location.href = '/agendamento/pages/novoUsuario.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }



   /*  FUNCOES RESPONSAVEIS PELO CHAT E PRINT, ANEXO ETC */

          
    if($_GET['chamado'] == 'atribuir')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $situacao = 'Verificando';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET operador_de_rede = :nome, situacao_do_chamado = :situacao  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $_SESSION['nome_usuario'], PDO::PARAM_STR);
    $stmt->bindParam(':situacao', $situacao, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Atribuido com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/chamados_chat.php?id=$id_pagina'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }


  if($_GET['chamado'] == 'desativar')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $valor = 'Sem Atribuição';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET operador_de_rede = :nome  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Desatribuido com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/chamados_chat.php?id=$id_pagina'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }


    if($_GET['chamado'] == 'Resolvido')
    {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $data_fechou = date("Y-m-d H:i:s"); 

    $stmt = $conexao_pdo->prepare("SELECT operador_de_rede FROM t_chamados WHERE id = '$id_pagina'");
    $stmt->execute();
    $result = array();
      while($r = $stmt->fetch(PDO::FETCH_ASSOC)){

        $result[] = $r;
        $valor = $r['operador_de_rede'];

      }


      if ($valor === "Sem Atribuição") {
      echo "<script>alert('Chamado sem Atribuição, Não pode ser Resolvido !')</script>";
      echo "<script>location.href = '/chamados/pages/'</script>";
    
      }

      else {

    $valor = 'Resolvido';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET situacao_do_chamado = :nome, status_chamado = false, finalizado_por = :usuario,  
     data_fechamento = :fechou WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $_SESSION['usuario'], PDO::PARAM_STR);
     $stmt->bindParam(':fechou', $data_fechou, PDO::PARAM_STR);
    
    $stmt->execute();
    echo "<script>alert('Resolvido com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/'</script>";

      }
  }


    if($_GET['chamado'] == 'Verificando')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $valor = 'Verificando';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET situacao_do_chamado = :nome  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Alterado com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/chamados_chat.php?id=$id_pagina'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }


    if($_GET['chamado'] == 'Infraestrutura')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $valor = 'Infraestrutura';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET situacao_do_chamado = :nome  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Alterado com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/chamados_chat.php?id=$id_pagina'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }


    if($_GET['chamado'] == 'Gerencia')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $valor = 'Gerência de Redes';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET situacao_do_chamado = :nome  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Alterado com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/chamados_chat.php?id=$id_pagina'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }



    if($_GET['chamado'] == 'Sem Solução')
    {
      try
      {
    require ('conectarBD.php');
    $id_pagina = $_GET['id'];
    $valor = 'Sem Solução';
    $stmt = $conexao_pdo->prepare("UPDATE t_chamados SET situacao_do_chamado = :nome  WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindParam(':nome', $valor, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('Alterado com Sucesso!')</script>";
    echo "<script>location.href = '/chamados/pages/chamados_chat.php?id=$id_pagina'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }


   



?>
