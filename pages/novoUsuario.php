<?php
include ('_topo.php');
include ('../php/funcoes.php');


if ($_SESSION['tipo'] == 'admin') {
  
?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Novo Usuário</h3>
              </div>

            <?php 
            
            if ($_GET['metodo'] == 'Editar') {
              $id = $_GET['id'];
              $nome = $_GET['nome'];
              $usuario = $_GET['usuario'];
              $ramal = $_GET['ramal'];
              $setor = $_GET['setor'];
              $senha = $_GET['senha'];
              
             echo '<div class="box-body" >
                <form method="get" action="../php/funcoes.php">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                         <input type="hidden" value="ok" name="editarUsuario"/>
                         <input type="hidden" value="'.$id.'" name="id"/>
                         <!-- Nome -->
                         <label>Nome</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Nome" name="nome" id="nome" value="'.$nome.'" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                         <label>Senha</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Senha" name="senha" id="senha" value="'.$senha.'" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>                        
                        <label>Nome do Usuário</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Usuário" name="usuario" id="usuario" value="'.$usuario.'" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <label>Ramal</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" name="ramal" id="ramal" value="'.$ramal.'" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                        <label>Setor:</label>
                        <div class="form-group has-feedback">
                           <select class="form-control select2" name="setor" id="setor" value="'.$setor.'" required="" style="width: 100%;">
                         <option selected="selected">'.$setor.'</option>
                          <option selected="selected">Setor</option>
                          <option value="Redes">Redes</option>
                          <option value="Suporte">Suporte</option>
                          <option value="Suporte">Suporte 2</option>
                          <option value="Comercial">Comercial</option>  
                          <option value="Recepção">Recepção</option>
                          <option value="Cobrança">Cobrança</option> 
                          <option value="Ouvidoria">Ouvidoria</option>
                        </select>                     
                        </select>
                        </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Cadastrar
                      </button>
                    </div>
                  </div><!-- /.box-footer -->
                </form><!-- /#form_cadastro -->
              </div><!-- /.box-body -->
            </div><!-- /.box -->';

          }
          else {          

          echo '<div class="box-body" >
                <form method="POST" id="salvarUsuario">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                         <!-- Nome -->
                         <label>Nome</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Nome" name="nome" id="nome" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <label>Nome do Usuário</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Usuário" name="usuario" id="usuario" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <label>Senha</label>
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" autofocus placeholder="Senha" name="senha" id="senha" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <label>Ramal</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" maxlength="4" placeholder="Ramal" name="ramal" id="ramal" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                        <label>Setor:</label>
                        <div class="form-group has-feedback">
                           <select class="form-control select2" name="setor" id="setor" required="" style="width: 100%;">
                         <option selected="selected">Setor</option>
                          <option value="Redes">Redes</option>
                          <option value="Suporte">Suporte</option>
                          <option value="Suporte">Suporte 2</option>
                          <option value="Comercial">Comercial</option>  
                          <option value="Recepção">Recepção</option>
                          <option value="Cobrança">Cobrança</option> 
                          <option value="Ouvidoria">Ouvidoria</option>
                        </select>
                        </div>
                        <label>E-mail</label>
                        <div class="form-group has-feedback">
                          <input type="email" class="form-control" placeholder="E-mail" name="email" id="email">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <label>Administrador:</label>
                        <div class="form-group has-feedback">
                           <select class="form-control select2" name="tipo" id="tipo" required="" style="width: 100%;">
                         <option value="usuario" selected="selected">Não</option>
                          <option value="admin">Sim</option>
                        </select>
                        </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Cadastrar
                      </button>
                    </div>
                  </div><!-- /.box-footer -->
                </form><!-- /#form_cadastro -->
              </div><!-- /.box-body -->
            </div><!-- /.box -->';

          }

          ?>

              <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Usuário Cadastrados</h3>
              </div>
            <div class="box-body">
              <div class="box-body">
                <table id="tabelaServidores" class="table table-bordered table-hover">
                  <!-- Cabeçalho da tabela -->
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nome</th>
                      <th>Usuario</th>
                      <th>Ramal</th>
                      <th>Setor</th>
                      <th>Editar</th>
                      <th>Deletar</th>
                    </tr>
                  </thead>
                  <!-- Itens da tabela -->
                  <tbody>
                    <?php listarUsuariosEdit(); ?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
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

    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="../plugins/select2/select2.full.min.js"></script>



 <script>   //Scripts de validação JQUERY
jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#salvarUsuario').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/agendamento/php/salvarUsuario.php",
        data: dados,
        success: function( data ) {
          console.log(data);
          if (data == true) {
            jQuery.gritter.add({
              title: 'Usuário Salvo com Sucesso !',
              text: 'Aguarde...',
              class_name: 'growl-success',
              image: '../dist/img/shield-ok-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='/agendamento/pages/novoUsuario.php'",1000);
          } else if(data == false) {
            jQuery.gritter.add({
              title: 'Usuário já Cadastrado',
              text: 'Erro !',
              class_name: 'growl-warning',
              image: '../dist/img/shield-warning-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='/agendamento/pages/novoUsuario.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
</script>

    <script>
      $(function () {
        $("#tabelaServidores").DataTable();
        $(".select2").select2();
      });
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
