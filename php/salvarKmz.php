<?php
  require ('conectarBD.php');
  
  $id = $_POST['id_chat'];

  // verifica se foi enviado um arquivo
  $stmt = $conexao_pdo->prepare("SELECT id, id_chat FROM t_chamados_chat WHERE id_chat = '$id' ORDER BY id desc LIMIT 1;");
  $stmt->execute();
  $result = array();
      while($r = $stmt->fetch(PDO::FETCH_ASSOC)){

        $result[] = $r;
        $ultimo_ID = $r['id'];

      }
    
  // verifica se foi enviado um arquivo .
  if(isset($_FILES['foto']['name']) && $_FILES["foto"]["error"] == 0){
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $nome = $_FILES['foto']['name'];
    // Pegamos a extensão
    $extensao = strrchr($nome, '.');
    $extensao = strtolower($extensao);
   
    //Verifica o tipo de arquivo
    if(strstr('.kmz;', $extensao)){
        //Renomeia a foto
      $novoNome = md5(microtime()) . $extensao;
      $destino = 'KMZ/' . $novoNome;
          //Salva na pasta Fotos
      if( move_uploaded_file( $foto_tmp, $destino  )){
        try { // Aqui realizamos o try catch
          $pdo_insere = $conexao_pdo->prepare("UPDATE t_chamados_chat SET kmz = :novoNome WHERE id = :id");
          $pdo_insere->bindParam(':novoNome', $novoNome);
          $pdo_insere->bindParam(':id', $ultimo_ID);
          $pdo_insere->execute();
        } catch (Exception $e) {
          print_r($e);
        }       //Retornamos para o ajax True se de certo.
          $return = true;
          echo $return;
      } else {
                //Retornamos para o ajax False se de errado.
          $return1 = false;
          echo $return1;
      }
    } else {
      //erro
    }
  } else {
    //sem imagem
  }
?>
