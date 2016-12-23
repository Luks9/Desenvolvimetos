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

?>
