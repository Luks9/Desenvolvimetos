<?php
include ('_topo.php');
include ('../php/funcoesGeraisFech.php');
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
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Finalizados</h3>
              </div>              
              <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Cliente</th>
                      <th>Telefone</th>
                      <th>Telefone 2</th>
                      <th>Cidade</th>
                      <th>Usuário</th>
                      <th>Tempo Atendimento</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  listarChamadosFechados();   ?>    
                  </tbody>
                </table>
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

    <script src="../dist/js/app.funcoesDinamicas.js"></script>

    <script src="../dist/js/functionUpload.js"></script>

    <script src="../dist/js/functionIndex.js"></script>

    <script src="../dist/js/jquery.gritter.min.js"></script>
    <script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>


    <script>
      $(function () {
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,

        });
       $("#mac").inputmask("##:##:##:##:##:##");
        $(".my-colorpicker2").colorpicker();
      });
    </script>

    <script type="text/javascript"></script>

  </body>
</html>
