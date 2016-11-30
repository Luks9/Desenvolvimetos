<?php
include ('_topo.php');
include ('../php/funcoes.php');
?>

      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content">
            <div class="box box-warning">
              <div class="box-header with-border">
                <button type="button" class="close btn" data-toggle="popover" data-placement="left" title="Agendar Retorno" data-content="Olá você sabia que temos a opção Status na qual você pode estar agendando o cliente para um horário específico? É só selecionar a opção agendado e colocar a data e a hora desejada.">?</button>
                <h3 class="box-title">Novo Chamado</h3>
              </div>

            <div class="box-body" >
                <form method="POST" id="salvarChamado">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                         <!-- Nome -->
                         <label>Nome do Cliente</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" autofocus placeholder="Nome do Cliente" name="cliente" id="cliente" required="">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <label>Telefone</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Telefone" id="tel" name="tel" >
                          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                        <label>Telefone 2</label>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Telefone 2" id="tel2" name="tel2" >
                          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                      <label>Cidade</label>
                        <div class="form-group has-feedback">
                          <select class="form-control select2" name="cidade" id="cidade" required="" style="width: 100%;">
                          <option value="" disabled selected>Cidade/UF</option>
                            <?php listarCidades() ?>                       
                        </select>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="hidden" class="form-control" id="origem" name="origem" value=<?php echo $usuarioLogado; ?> >
                        </div>
                        <label>Setor</label>
                        <div class="form-group has-feedback">
                           <select class="form-control" id="setor" name="setor">
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
                              <select class="form-control" id="status" name="status">
                                <option value="Aguardando retorno">Aguardando Retorno</option>
                                <option value="Agendado">Agendado</option>
                                <option value="Retornando">Retornando</option>
                                <option value="Sem retorno">Sem retorno</option>
                              </select>
                        </div>
                        <div class="form-group has-feedback" style="display: none" id="div_hora">
                          <label>Data Agendada</label>
                          <input type="datetime-local" name="agendado" id="agendado" class="form-control">
                        </div>
                        <!-- Observação -->
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                          <label>Descrição do Chamado</label>
                          <textarea class="form-control" id="obs" required="" name="obs" rows="3" placeholder="Enter ..."></textarea>
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
        $("#tel").inputmask("(###)#####-####");
        $("#tel2").inputmask("(###)#####-####");
            //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        $(".select2").select2();

        $("#status").change(function(){
          if ($(this).val()=="Agendado") {
              $('#div_hora').show();
            }else{
              $('#div_hora').hide();
            }
        });

        $(function () {
          $('[data-toggle="popover"]').popover();
        })
        
    </script>

 <script>   //Scripts de validação JQUERY
jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#salvarChamado').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/agendamento/php/salvarChamado.php",
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
            window.setTimeout("location.href='/agendamento/pages/index.php'",1000);
          }else if(data == false) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='/agendamento/pages/index.php'",1000);
          }
          else {
            console.log(data);
            jQuery.gritter.add({
              title: 'Cliente já Cadastrado',
              text: 'Erro !',
              class_name: 'growl-warning',
              image: '../dist/img/shield-warning-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='/agendamento/pages/index.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
</script>
  </body>
</html>
