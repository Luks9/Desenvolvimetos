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
                <h3 class="box-title">Enviar SMS</h3>
              </div>

            <div class="box-body" >
                <form method="POST" id="enviar_sms">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
		                	<label>Selecione uma mensagem</label>
							<select class="form-control" id="msg" name="msg" required="">
								<option selected="" disabled="">Selecione uma Mensagem</option>
							</select>
	              		</div>
	              		<div class="form-group has-feedback">
                        	<label>Celular</label>
                          	<input type="text" class="form-control" name="tel" id="tel" required="">
                          	<span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                    <div class="box-body no-padding">
                      	<div class="form-group has-feedback">
							<label>Mensagem</label>
							<textarea id="ver_msg" name="ver_msg" readonly="" class="form-control" rows="4"></textarea>
						</div>
                    </div>
                      </div>
                    </div><!-- /.row -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-defult">
                      <i class="fa fa-refresh fa-spin" style="display: none"></i>
                        <i class="fa fa-edit"></i> Enviar
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
        $("#tel").inputmask("(###)#####-####");
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        $(".select2").select2();
    </script>

 <script>   //Scripts de validação JQUERY
jQuery(document).ready(function () {
  //Script para enviar sms
  $('#enviar_sms').validate({
    submitHandler: function( form ){
      var dados = JSON.parse(JSON.stringify(jQuery('#enviar_sms').serializeArray()));
      tel = "55"+dados[1].value.replace(/[^0-9]/g,'').slice(1);
      json = '{"celular": "'+tel+'","mensagem": "'+dados[2].value+'"}';
      console.log('<?=$URL?>');
      $('.fa-spin').show();
      $.ajax({
        type: "POST",
        url: '<?=$URL?>',
        data: json,
        success: function( data ) {
        	$('.fa-spin').hide();	
          console.log(data);
          if (data.enviasmsResult == "OK 1") {
            jQuery.gritter.add({
              title: 'Mensagem enviada com Sucesso!',
              text: 'Aguarde...',
              class_name: 'growl-success',
              image: '../dist/img/shield-ok-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./sms.php'",3000);
          }else{
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Verifique se foi selecionado uma mensagem.',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '3000',
            });
            window.setTimeout("location.href='./sms.php'",5000);
          }
        }
      });
      return false;
    }
  });
});

jQuery(document).ready(function () {
 $.getJSON('solicitacoes.ajax.php?search=',{
        cod: 'msg'}, 
  function(x){
    for(var i = 0; i < x.length; i++){
      $('#msg').append('<option value="'+x[i].id+'">'+x[i].titulo+'</option>');
    }
    $('#msg').change(function(){
      var id = $('#msg').val();
      for(var i = 0; i < x.length; i++){
        if (x[i].id == id) {
          $('#ver_msg').val('');
          $('#ver_msg').val(x[i].mensagem);
        }
      }
    });
  });
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