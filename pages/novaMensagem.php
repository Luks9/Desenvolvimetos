<?php
include ('_topo.php');
include ('../php/funcoesGerais.php');
if ($_SESSION['tipo'] == 'admin') {
?>

      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Nova Mensagem</h3>
              </div>

            <div class="box-body" >
                <form method="POST" id="salvarChamado">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                         <!-- Nome -->
                         <label>Titulo</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Titulo da Mensagem" name="t_mensagem" id="t_mensagem" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <!-- <label>Status</label>
                       <div class="form-group has-feedback">
                          <select class="form-control select2" name="status" id="status" required="" style="width: 100%;">
                          <option value="Aguardando retorno">Aguardando Retorno</option>
                          <option value="Agendado">Agendado</option>  
                          <option value="Retornando">Retornando</option>
                          <option value="Sem retorno">Sem retorno</option>
                          <option value="Em atendimento">Em atendimento</option>
                          <option value="Outro">Outro</option>
                        </select>
                        </div>-->
                        <div class="form-group">
                          <label>Mensagem</label>
                          <textarea class="form-control" id="mensagem" required="" maxlength="140" name="mensagem" rows="3" placeholder="Enter ..."></textarea>
                          Restam<b> <span id="contador_char"></span></b> caracteres a serem digitados.
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                    <div class="box-body no-padding">
                      <table id="msg" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Setor</th>
                            <th>Info</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            require ('../php/conectarBD.php');
                            $stmt = $conexao_pdo->prepare("SELECT * FROM mensagens order by id");
                            $stmt->execute();
                            $result = array();
                            while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              $result[] = $r;

                              echo "<tr>";
                              echo "<td>".$r['id']."</td>";
                              echo "<td>".$r['titulo']."</td>";
                              echo "<td>".$r['setor']."</td>";
                              echo "<td data-toggle='modal' data-target='#UpdateMSG'><a href='#' <i class='fa fa-commenting' id='editar' onclick='myFunction(\"".$r['id']."\", \"".$r['mensagem']."\")'></i></a></td>";
                              echo "</tr>"; 
                        
                            }
                             ?>    
                        </tbody>
                      </table>
                    </div>
                      </div>
                    </div><!-- /.row -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-defult">
                        <i class="fa fa-edit"></i> Cadastrar
                      </button>
                    </div>
                  </div><!-- /.box-footer -->
                </form><!-- /#form_cadastro -->
              </div><!-- /.box-body -->
            </div><!-- /.box -->
           </div><!-- /.box -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          By: Lucas Alves
        </div>
        <!-- Default to the left -->
        <strong>Agendamento 2.0 &copy; 2016 <a href="#">Brisanet Telecomunicações</a>.</strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="../plugins/limit/jQuery.limit.js"></script>

    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>

    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>

    <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>

    <script src="../dist/js/jquery.validate.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

     <script src="../dist/js/functionUpload.js"></script>

    <script src="../dist/js/jquery.gritter.min.js"></script>

    <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <script src="../plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript">
        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        $(".select2").select2();
    </script>

 <script>   //Scripts de validação JQUERY
jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#salvarChamado').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/agendamento/php/salvarMensagem.php",
        data: dados,
        success: function( data ) {
          console.log(dados);
          if (data == true) {
            jQuery.gritter.add({
              title: 'Salvo com Sucesso !',
              text: 'Aguarde...',
              class_name: 'growl-success',
              image: '../dist/img/shield-ok-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./novaMensagem.php'",1000);
          }else if(data == false) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./novaMensagem.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
$(document).on("input", "#mensagem", function () {
    var limite = 160;
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    $("#contador_char").text(caracteresRestantes);
});

$(document).on("input", "#msg_edit", function () {
    var limite = 160;
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    $("#contador_char_edit").text(caracteresRestantes);
});

$('#msg').DataTable({
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "info": true
});
function myFunction(id, msg){
  $('#form_edit').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
  });
  $("#msg_edit").val(msg);
  $("#id_2").val(id);
}

</script>
  </body>
</html>

<?php
}
else {
          echo' <div class="alert alert-danger alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erro Permissão!</h4>
                Você não está autorizado a acessar está pagina !
              </div>';
}

?>

<div class="modal fade" id="UpdateMSG" role="dialog">
  <div class="modal-dialog">
    <form method="POST" id="form_edit">
      <div class="box box-primary">
        <div class="modal-content">
          <div class="box-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="box-title">Informações da Mensagem</h3>
          </div>
          <div class="modal-body">
            <div class="box-body">
                <input type="hidden" name="id" id="id_2">
                <input type="hidden" name="user" id="user_2" value="<?=$nomeUsuario; ?>">
                <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label>Mensagem:</label>
                    <textarea id="msg_edit" name="msg_edit" class="form-control" rows="3" cols="10" maxlength="140"></textarea>
                    Restam<b> <span id="contador_char_edit"></span></b> caracteres a serem digitados.
                  </div>
                </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#form_edit').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/agendamento/php/editar_msg.php",
        data: dados,
        success: function( data ) {
          console.log(dados);
          if (data == false) {
            jQuery.gritter.add({
              title: 'Salvo com Sucesso !',
              text: 'Aguarde...',
              class_name: 'growl-success',
              image: '../dist/img/shield-ok-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./novaMensagem.php'",1000);
          }else if(data == true) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./novaMensagem.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
</script>