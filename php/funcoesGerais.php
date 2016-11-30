<?php
  //date_default_timezone_set('America/Fortaleza');

   function logado() {
    $user_id=$_SESSION['user_id'];
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Sem retorno' AND status != 'Agendado') AND id_usuario = '$user_id'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"" .$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    } 

    function logadoAgendado() {
      $user_id=$_SESSION['user_id'];
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Agendado' AND id_usuario = '$user_id'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 
       if ($dateNow > $dateAgendado) {
          $horaLabel = "<span class='pull-right badge bg-red'>".$agendado."</span>";
       }else{
          $horaLabel = "<span class='pull-right badge bg-green'>".$agendado."</span>";
       }

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $horaLabel . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }

  function recepcao() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Sem retorno') AND setor ='Recepção'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"" .$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }

    function recepcaoSemRetorno() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Sem retorno' AND setor ='Recepção'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }

        function suporte() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Agendado') AND setor ='Suporte'");
                              $stmt->execute();
                              $result = array();
                              while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
            
                    echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
        }
    }

    function suporteAgendado() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Agendado' AND setor ='Suporte'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 
       if ($dateNow > $dateAgendado) {
          $horaLabel = "<span class='pull-right badge bg-red'>".$agendado."</span>";
       }else{
          $horaLabel = "<span class='pull-right badge bg-green'>".$agendado."</span>";
       }

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $horaLabel . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }
        function suporte2() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Agendado') AND setor ='Suporte 2'");
                              $stmt->execute();
                              $result = array();
                              while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
            
                    echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }

    function suporte2Agendado() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Agendado' AND setor ='Suporte 2'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 
       if ($dateNow > $dateAgendado) {
          $horaLabel = "<span class='pull-right badge bg-red'>".$agendado."</span>";
       }else{
          $horaLabel = "<span class='pull-right badge bg-green'>".$agendado."</span>";
       }

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $horaLabel . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }

        function comercial() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Agendado') AND setor ='Comercial'");
    $stmt->execute();
    $result = array();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result[] = $r;
            
        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
        }
    }

    function comercialAgendado() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Agendado' AND setor ='Comercial'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 
       if ($dateNow > $dateAgendado) {
          $horaLabel = "<span class='pull-right badge bg-red'>".$agendado."</span>";
       }else{
          $horaLabel = "<span class='pull-right badge bg-green'>".$agendado."</span>";
       }

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $horaLabel . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }
        function cobranca() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Agendado') AND setor ='Cobrança'");
                              $stmt->execute();
                              $result = array();
                              while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
            
                    echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
        }
    }

    function cobrancaAgendado() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Agendado' AND setor ='Cobrança'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 
       if ($dateNow > $dateAgendado) {
          $horaLabel = "<span class='pull-right badge bg-red'>".$agendado."</span>";
       }else{
          $horaLabel = "<span class='pull-right badge bg-green'>".$agendado."</span>";
       }

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $horaLabel . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }
        function ouvidoria() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE (status != 'Finalizado' AND status != 'Agendado') AND setor ='Ouvidoria'");
                              $stmt->execute();
                              $result = array();
                              while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result[] = $r;
            
                    echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $r['data'] . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
      }

      function ouvidoriaAgendado() {
    /* Listamos os tecnicos referentes ao supervisor em questão */
    require ('conectarBD.php');
    $stmt = $conexao_pdo->prepare("SELECT * FROM retornos WHERE status = 'Agendado' AND setor ='Ouvidoria'");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

        $dataHora = explode(" ", $r['hora_agendada']);
        $data = explode("-", $dataHora[0]);
        $hora = substr($dataHora[1], 0,-3);
        $agendado = $data[2]."-".$data[1]."-".$data[0]." ".$hora;

       $dateNow = date_create(date("Y-m-d H:i:s")); 
       $dateAgendado = date_create($r['hora_agendada']); 
       if ($dateNow > $dateAgendado) {
          $horaLabel = "<span class='pull-right badge bg-red'>".$agendado."</span>";
       }else{
          $horaLabel = "<span class='pull-right badge bg-green'>".$agendado."</span>";
       }

        echo "<tr>";
        echo "<td >" .$r['id'] . "</td>";
        echo "<td >" .$r['cliente'] . "</td>";
        echo "<td>" . $r['tel'] . "</td>";
        echo "<td>" . $r['tel2'] . "</td>";
        echo "<td>" . $r['cidade'] . "</td>";
        echo "<td>". $r['usuario']."</td>";
        echo "<td>" . $horaLabel . "</td>";
        echo "<td>" . $r['status'] . "</td>";
        echo "<td><button class='btn btn-danger glyphicon glyphicon-headphones' data-toggle='modal'  
        data-target='#UpdateRetorno' onclick='idfunction(\"" . $r['id'] . "\", 
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
                  \"" . $r['status']. "\",
                  \"".$r['usuario']."\");'></button></td>";
        echo "</tr>";
    
        }
    }

?>