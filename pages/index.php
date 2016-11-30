<?php
include ('_topo.php');
include ('../php/funcoesGerais.php');
include ('modals.php');
?>  

    <style>
      .tamanhoLabel {
          height: 25px;
          width: 120px;
          line-height: 05px;
          text-align: center;
      }
    </style>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content">
            <div class="box box-primary">
              <!-- /.box-header -->
              <div class="box-body">
                <h3 class="box-title">Painel de Agendamento <small>2.0</small></h3>
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_0" data-toggle="tab">Meus Atendimentos</a></li>
                    <li><a href="#tab_1" data-toggle="tab">Recepção</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Suporte</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Suporte 2</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Comercial</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Cobrança</a></li>
                    <li><a href="#tab_6" data-toggle="tab">Ouvidoria</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                      <table id="example0" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  logado();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Agendado</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado0" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  logadoAgendado();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_1">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  recepcao();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Sem Retorno</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  recepcaoSemRetorno();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  suporte();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Agendados</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  suporteAgendado();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>

                    <div class="tab-pane" id="tab_3">
                      <table id="example3" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  suporte2();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Agendados</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado3" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  suporte2Agendado();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>

                    <div class="tab-pane" id="tab_4">
                      <table id="example4" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  comercial();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Agendados</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado4" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  comercialAgendado();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>

                    <div class="tab-pane" id="tab_5">
                      <table id="example5" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  cobranca();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Agendados</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado5" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  cobrancaAgendado();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>

                    <div class="tab-pane" id="tab_6">
                      <table id="example6" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  ouvidoria();   ?>    
                        </tbody>
                      </table>
                      <div class="box box-warning box-solid collapsed-box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Agendados</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <table id="agendado6" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Telefone 2</th>
                            <th>Cidade</th>
                            <th>Usuário</th>
                            <th>Agendado</th>
                            <th>Status</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  ouvidoriaAgendado();   ?>    
                        </tbody>
                      </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
        </section><!-- /.content -->
      </div>
<!-- /.container -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    By: Lucas Alves
  </div>
  <!-- Default to the left -->
  <strong>Agendamento 2.0 &copy; 2016 <a href="#">Brisanet Telecomunicações</a>.</strong>
</footer>
<!-- /.box-footer -->
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

    <script src="../dist/js/functionIndex.js"></script>

    <script src="../dist/js/app.funcoesDinamicas.js"></script>

    <script src="../dist/js/functionUpload.js"></script>

    <script src="../dist/js/jquery.gritter.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="popover"]').popover();

        $("#status").change(function(){
            if ($(this).val()=="Agendado") {
              $('#div_hora').show();
            }else{
               $('#div_hora').hide();
            }
        });
      });
    </script>

  <script type="text/javascript">
      
    </script>


    <script>
      $(function () {
        for(var i=0;i<7;i++){
          $('#example'+i).DataTable();
          $('#agendado'+i).DataTable();
        }
        $(".my-colorpicker2").colorpicker();
      });

    </script>
  


  </body>
</html>

