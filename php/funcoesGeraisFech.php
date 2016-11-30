<?php

  function listarChamadosFechados() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Finalizado'");
    $stmt->execute();
    $result = array();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result[] = $r;
        
        $data_inicio = date_create($r['tempo_atendimento']);
        $data_fim = date_create($r['hora_fim_atendimento']);
        $json = json_encode(date_diff($data_inicio,$data_fim));
        $decode = json_decode($json);
        $tempo = " ".$decode->{'d'}." Dias ".$decode->{'h'}." Hrs ".$decode->{'i'}." Min ";

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>" . $r['usuario'] . "</td>";
        echo "<td>" . $tempo . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#finalizado' onclick='finalizado(\"" . $r['id'] . "\", 
                  \"" .$r['cliente']. "\",
                  \"" . $r['tel'] . "\",
                  \"" . $r['tel2'] . "\",
                  \"" . $r['cidade'] . "\",
                  \"" . $r['data'] . "\",
                  \"" . $r['status'] . "\",
                  \"" . $r['observacao'] . "\",
                  \"" . $r['origem']. "\",
                  \"" . $r['setor']. "\",
                  \"" . $r['hora_agendada']. "\",
                  \"" . $tempo. "\");'></button></td>";
        echo "</tr>";
        }
    }

    function listarChamadosAtendimentos() {
      $setor = isset($_GET['setor']) ? $_GET['setor'] : 'Suporte';
      /* Listamos os tecnicos referentes ao supervisor em questão */
      require ('conectarBD.php');
      $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Em atendimento' AND setor = '$setor'");
      $stmt->execute();
      $result = array();
      while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $r;
          
          $data_inicio = date_create($r['tempo_atendimento']);
          $data_fim = date_create(date("Y-m-d H:i:s"));
          $json = json_encode(date_diff($data_inicio,$data_fim));
          $decode = json_decode($json);
          $tempo = " ".$decode->{'d'}." Dias ".$decode->{'h'}." Hrs ".$decode->{'i'}." Min ";

          echo "<tr>";
          echo "<td >" .$r['id'] . "</td>";
          echo "<td >" .$r['cliente'] . "</td>";
          echo "<td>" . $r['tel'] . "</td>";
          echo "<td>" . $r['tel2'] . "</td>";
          echo "<td>" . $r['cidade'] . "</td>";
          echo "<td>" . $r['usuario'] . "</td>";
          echo "<td>" . $tempo . "</td>";
          echo "<td>" . $r['status'] . "</td>";
          echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
          data-target='#finalizado' onclick='finalizado(\"" . $r['id'] . "\", 
                    \"" .$r['cliente']. "\",
                    \"" . $r['tel'] . "\",
                    \"" . $r['tel2'] . "\",
                    \"" . $r['cidade'] . "\",
                    \"" . $r['data'] . "\",
                    \"" . $r['status'] . "\",
                    \"" . $r['observacao'] . "\",
                    \"" . $r['origem']. "\",
                    \"" . $r['setor']. "\",
                    \"" . $r['hora_agendada']. "\",
                    \"" . $tempo. "\");'></button></td>";
          echo "</tr>";
          }
    }

?>