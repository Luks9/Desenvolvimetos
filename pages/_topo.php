<?php
  session_start();
  if ($_SESSION['logado'] === true) {
    // Armazenamos alguns valores da sessão a variaveis para serem utilizados no código.
    $usuarioLogado = $_SESSION['nome_usuario'];
    $setorUsuario = $_SESSION['setor'];
    $nomeUsuario = $_SESSION['usuario'];
    $dataCadastro = $_SESSION['datacadastro'];
    $email        = $_SESSION['email'];
    $foto        = $_SESSION['foto'];
    // Chamando o arquivo para realizar o lockscreen
    //include ('_validarSession.php');

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agendamento 2.0</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

   <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../dist/css/ionicons-2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">

    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="../dist/css/jquery.gritter.css">

    <link rel="shortcut icon" href="https://intranet.brisanet.com.br/images/favicon.ico">   

    <meta name="author" content="Lucas - lucasalves.comp@gmail.com">
 
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
            <img src="../dist/img/logoBrisanet.png" width="160px;" height="38px;" style="padding-top: 5px;">
             </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Painel <span class="sr-only">(current)</span></a></li>
                <li><a href="novoChamado.php">Cadastrar Retorno</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções Avançadas <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <?php 
                    if ($_SESSION['tipo'] == 'admin') {
                    echo '
                    <li><a href="emAtendimento.php">Em atendimento</a></li>
                    <li class="divider"></li>
                    <li><a href="novaMensagem.php">Cadastrar Mensagem</a></li>
                    <li><a href="novoUsuario.php">Cadastrar Usuário</a></li>';
                    }
                    echo '<li class="divider"></li>
                    <li><a href="chamadosFechados.php">Chamados Fechados</a></li>';
		                   
                    ?>
                  </ul>
                </li>
                <form class="navbar-form navbar-left" role="search">
                <div class="form-group input-group">
                  <input type="text" class="form-control numbersOnly" id="search" placeholder="ID">
                  <span class="input-group-btn">
                    <button type="button" name="bnt_search" id="bnt_search" class="btn btn-flat btn-info"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form>
              </ul>
              
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
                       <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             <!-- <li class="dropdown messages-menu">
                    <?php include ('../php/funcoesAvisos.php'); ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i><span class="label label-success"><?php totalChamadosFinalizado()?></span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">Você tem  <?php totalChamadosFinalizado()?> Chamados Finalizados</li>
                   <li>
                    <?php ConfirmarChamadoResolvido() ?>


                  <li class="footer"><a href="#">Todas as Mensagems</a></li>
                </ul>
              </li>-->
              <!-- Usuário Logado no Sistema e Menu Lateral -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs" style="font-family:ubuntu;"><i class="fafa-circle-o-notch"></i> Opções do Sistema</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" action="javascript:perfil();">
                    <!-- <img src="../resources/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                    <p><p> <!--??????-->
                    <p>
                    <?php
                      include ('../php/functionFoto.php');
                      function fotoPerfil($foto) {
                        echo  "<img src=\"$foto\"class=\"img-circle\"height=\"125px\"width=\"125px\"\/><br>";
                      }
                      fotoPerfil($image);
                      echo $usuarioLogado
                    ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#alterarFoto">Alterar Foto</button>
                    </div>
                    <div class="pull-right">
                      <a href="_deslogarUser.php" class="btn btn-default btn-flat">Deslogar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

          <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="alterarFoto" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <form method="POST" id="uploadPicture">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Alterar foto do perfil</h4>
                </div>
                <div class="btn btn-default btn-file" style="margin-left:10px;">
                  <i class="fa fa-camera"></i> Selectione a foto
                  <input type="file" id="foto" name="foto">
                </div>
                <div class="modal-footer">
                  <!-- <input type="submit" class="btn btn-default" value="Definir foto"> -->
                  <button type="submit" class="btn btn-default">Definir foto</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div>    
     </div>

<script type="text/javascript">
  $("#bnt_search").click(function () {
      var id = $("#search").val();
      $.getJSON('solicitacoes.ajax.php?search=',{
        cod: 'search',
        id: id }, 
      function(x){
        console.log(x);
        if (x[0]) {
          $("#modal_search").modal('show');
          $('#form_3').on('hidden.bs.modal', function () {
            $(this).find("input,textarea,select").val('').end();
          });
          $('#numeros_3')
            .find('option')
            .remove()
            .end();
          $('#pre_3').empty(); 
          if (x[0].status=="Agendado") {
              horaAgendada = x[0].hora_agendada.slice(0,19).replace(" ","T");
              $('#div_hora_3').show();
              $('#agendado').val(horaAgendada);
            }else{
              console.log("ok");
              $('#agendado').val('');
              $('#div_hora_3').hide();

            }
          var info="", obs_array;
          var div ="<p>";
          var pre ="<p>";
          div = "<b>Cliente: </b> <b class='text-light-blue'>"+x[0].cliente+"</b> &nbsp";
          div += "<b>Cidade: </b> <b class='text-light-blue'>"+x[0].cidade+"</b> &nbsp";
          div += "<b>Data: </b> <b class='text-light-blue'>"+x[0].data+"</b>";
          div += "<p><b>Observação:</b></p>";
          obs_array = x[0].observacao.split('*');
          for(var i=0; i<obs_array.length;i++){
            info += obs_array[i] + '</br>';
          }
          $("#div_3").html(div);
          $('#pre_3').html(info); 
          $('#setor_3').val(x[0].setor);
          $('#id_3').val(x[0].id);
          $('#status_3').val(x[0].status);
          $('#numeros_3')
          .append('<option value="'+x[0].tel+'">'+x[0].tel+'</option>')
          .append('<option value="'+x[0].tel2+'">'+x[0].tel2+'</option>')
        }else{
          jQuery.gritter.add({
              title: 'Agendamento não encontrado.',
              text: 'Verifique se o ID está correto.',
              class_name: 'growl-warning',
              image: '../dist/img/shield-warning-icon.png',
              sticky: false,
              time: '4000',
            });
        }
        });
      });

  jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
</script>


<?php
  } else {
    header('location: /agendamento/');
  }
?>

<!-- MODAL PARA EDIÇÃO DE INSTALAÇÃO FTTH-->
<div class="modal fade" id="modal_search" role="dialog">
  <div class="modal-dialog modal-lg">
    <form method="POST" id="form_3">
      <div class="box box-primary">
        <div class="modal-content">
          <div class="box-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="box-title">Informações do retorno</h3>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                <div id="div_3">
                </div>
                        <pre id="pre_3">
                        </pre>
              </div><!-- /.row -->
              <div class="col-md-13">
                <input type="hidden" name="id" id="id_3">
                <input type="hidden" name="user" id="user_3" value="<?=$nomeUsuario; ?>">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label>Transferir Setor</label>
                    <select class="form-control" id="setor_3" name="setor">
                      <option selected="" disabled="">Setores</option>
                      <option value="Suporte">Suporte</option>
                                    <option value="Suporte 2">Suporte 2</option>
                                    <option value="Comercial">Comercial</option>  
                                    <option value="Recepção">Recepção</option>
                                    <option value="Cobrança">Cobrança</option> 
                                    <option value="Ouvidoria">Ouvidoria</option>
                    </select>
                  </div>
                  <div class="form-group has-feedback">
                    <label>Status</label>
                    <select class="form-control" id="status_3" name="status">
                      <option value="Aguardando retorno">Aguardando Retorno</option>
                                    <option value="Agendado">Agendado</option>  
                                    <option value="Retornando">Retornando</option>
                                    <option value="Sem retorno">Sem retorno</option>
                                    <option value="Em atendimento">Em atendimento</option>
                                    <option value="Finalizado">Finalizado</option>
                    </select>
                  </div>
                  <div class="form-group has-feedback" style="display: none" id="div_hora_3">
                        <label>Data Agendada</label>
                        <input type="datetime-local" name="agendado" id="agendado_3" class="form-control">
                      </div>
                </div>
                <div class="col-md-6">
                  <label>Fazer ligação</label>
                  <div class="input-group">
                    <i class="fa fa-refresh fa-spin" style="display: none"></i>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" onclick="ligar()" type="button">Ligar!</button>
                      </span>
                      <select class="form-control" id="numeros_3">
                        <option>Selecione um Número</option>
                      </select><br>
                      </div>
                      <div class="form-group has-feedback">
                    <label>Observação</label>
                    <textarea id="obs_3" name="obs" class="form-control" rows="3" cols="10"></textarea>
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>