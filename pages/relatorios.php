<?php
include ('_topo.php');
include ('../php/funcoes.php');
?>
      <!-- Full Width Column -->
      <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Total de Instalações</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool">
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            <form id="form_relatorio" method="POST">
              <form method="POST" id="salvarChamado">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                         <!-- Nome -->
                         <label>Tipo de Relatório</label>
                        <div class="form-group has-feedback">
                          <input type="radio" required="" name="relatorio" id="sistema" value="sistema">Sistema<br>
                          <input type="radio" name="relatorio" id="pessoa" value="pessoa">Funcionario<br>
                          <input type="radio" name="relatorio" id="servidor" value="servidor">Servidor<br>
                          <input type="radio" name="relatorio" id="cidade" value="cidade">Cidade
                        </div>

                        <div class="col-md-5">
                        <div class="form-group">
                          <label>Data Intervalo</label>
                          <input type="date" class="form-control pull-right" id="data_1" name="data_1" required="">
                        </div>
                         <div class="form-group">
                          <input type="date" class="form-control pull-right" id="data_2" name="data_2" required="">
                        </div>
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                      <div id="div_sistema" style="display:none">
                        <!--     <label>Sub Categoria por Sistema</label>
                            <div class="form-group has-feedback">
                              <input type="radio" name="sub_sistema" id="sistema" value="total">Total de chamados<br>
                              <input type="radio" name="sub_sistema" id="abertos" value="Aberto">Chamados Abertos<br>
                              <input type="radio" name="sub_sistema" id="resolvidos" value="Resolvido">Chamados Resolvidos
                            </div>-->
                        </div>
                       <div class="form-group has-feedback" id="div_pessoa" style="display:none">
                        <label>Operador de rede</label>
                           <select class="form-control select2" name="operador_de_rede" id="operador_de_rede" required="" style="width: 100%;">
                         <option selected="selected" value="Sem Atribuição">Sem Atribuição</option>
                            <?php listarOperadorRede() ?>
                        </select>
                        </div>
                        <div class="form-group" id="div_servidor" style="display:none">
                          <label>Servidor</label>
                          <select class="form-control select2" name="servidor" id="servidor" required="" style="width: 100%;">
                            <option selected="selected" disabled="">Selecione um Servidor</option>
                          <?php listarServidor() ?>
                          </select>
                        </div><!-- /.form-group -->
                        <div class="form-group has-feedback" id="div_cidade" style="display:none">
                          <label>Cidade</label>
                          <select class="form-control select2" name="cidade" id="cidade" required="" style="width: 100%;">
                          <option value="" disabled selected>Selecione uma Cidade</option>
                            <?php listarCidades() ?>
                        </select>
                        </div>
                        <!-- Observação -->
                      </div>
                      <div class="col-md-12">
                      </div>
                    </div><!-- /.row -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-defult">
                        <i class="fa fa-edit"></i> Buscar
                      </button>
                    </div>
                  </div><!-- /.box-footer -->
            </form>

            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Grafico 1</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body" id="div_donut">
                  <div id="donut-chart" style="height: 300px;"></div>
                </div><!-- /.box-body-->
              </div><!-- /.box -->
            </div>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafico 2</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive" id="div_area">
                  <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
              <table id="tabelaFTTH" class="table table-bordered table-hover">
                <!-- Cabeçalho da tabela -->
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Aberto Por</th>
                    <th>Servidor</th>
                    <th>Cidade</th>
                    <th>Op Redes</th>
                    <th>Situação</th>
                    <th>Abertura</th>
                  </tr>
                </thead>
                <!-- Itens da tabela -->
                <tbody>
                  
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          
      </section><!-- /.content -->
    </div><!-- ./resources/wrapper -->
  </div>
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>SAS Chamados</b> 2.0
          </div>
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- SlimScroll -->
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

     <!-- FLOT CHARTS -->
    <script src="../plugins/flot/jquery.flot.min.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="../plugins/flot/jquery.flot.resize.min.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="../plugins/flot/jquery.flot.pie.min.js"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="../plugins/flot/jquery.flot.categories.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <div class="modal fade" id="info_chamado" role="dialog">
      <div class="modal-dialog modal-lg">
        <form method="POST" id="apagar">
          <div class="box box-danger">
            <div class="modal-content">
              <div class="box-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="box-title">Informações do Chamado</h3>
              </div>
              <div class="modal-body">
                <div class="box-body">
                  <div class="row">
                    <pre id="pre">
                      
                    </pre>
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script>

    $("input[type=radio][name=relatorio]").click(function(){
        var valor = $("input[type=radio][name=relatorio]:checked").val();
        if(valor == "sistema"){
          $("#div_sistema").show();

          $("#div_pessoa").hide();
          $("#div_servidor").hide();
          $("#div_cidade").hide();
        }else if(valor == "pessoa"){
          $("#div_pessoa").show();

          $("#div_sistema").hide();
          $("#div_servidor").hide();
          $("#div_cidade").hide();
        }else if (valor == "servidor") {
          $("#div_servidor").show();

          $("#div_pessoa").hide();
          $("#div_sistema").hide();
          $("#div_cidade").hide();
        }else if(valor == "cidade"){
          $("#div_cidade").show();

          $("#div_pessoa").hide();
          $("#div_servidor").hide();
          $("#div_sistema").hide();
        }

    });

    function myFunction(id){

        $("#pre").empty();
        $.getJSON('solicitacoes.ajax.php?search=',{
            valor: id,
            ajax: 'relatorio'}, 
          function(chamado){
            console.log(chamado);
            var texto ="";
            for (var i = 0; i < chamado.length; i++) {
              texto +="<p><b>"+chamado[i].usuario +": </b></p><p>\""+ chamado[i].mensagem+"\"</p><p>"+chamado[i].data_da_mensagem+"</p>";
              texto +="------------------------------------------------------------------------------------";
            }
            $("#pre").append(texto);
            $('#info_chamado').modal('show');
          });

    }


    $('#form_relatorio').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/chamados/php/relatorioConsulta.php",
        data: dados,
        success: function( data ) {
          var obj = jQuery.parseJSON(data);
          var tam = obj.length;
          if (obj == null || obj == undefined || obj.length == 0) {
              jQuery.gritter.add({
              title: 'Não Existe dados para essa consulta.',
              text: 'Erro !',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '3000',
            });

          }
          var valor = $("input[type=radio][name=relatorio]:checked").val();

          var linhas = $("#tabelaFTTH tr").length;

          for(j=0; j<linhas;j++){
            $('#tabelaFTTH tr').remove();
          }

          var head = '<tr> <th>ID</th> <th>Aberto Por</th> <th>Servidor</th> <th>Cidade</th> <th>Op Redes</th> <th>Situação</th> <th>Abertura</th> </tr>';
          $('#tabelaFTTH').append(head);
          var status = [0,0,0];

          if (valor == "sistema") {

             var dataJson = new Array();
              var label1 = 0;
              var label2 = 0;
              var label3 = 0;
              var cont;
              var data1 = new Date($("#data_1").val());
              var data2 = new Date($("#data_2").val());
              var dias = (data2.getTime() - data1.getTime());
              dias = Math.round(Math.abs(dias/(1000*60*60*24)));
              var data3 = data1;
              var vv = data3.getDate();
              data3.setDate(vv+1);
              for (var i = 0; i < dias+1; i++) {
                cont = false;
                for (var x = 0; x < obj.length; x++) {
                  var data4 = new Date(obj[x].data_abertura_chamado);
                  if(data3.getDate() == data4.getDate() && data3.getMonth() == data4.getMonth() && data3.getFullYear() == data4.getFullYear()){
                    cont = true;
                    switch (obj[x].situacao_do_chamado){
                      case "Resolvido":
                        label1++;
                        break;
                      case "Aberto":
                        label2++;
                        break;
                      case "Verificando":
                        label3++;
                        break;
                    }
                  }
                }
                if (cont) {
                  dataJson.push({ y: data3.getFullYear()+"-"+(data3.getMonth()+1)+"-"+data3.getDate(), Resolvido: label1, Aberto: label2, Verificando: label3});
                  label1 = 0;
                  label2 = 0;
                  label3 = 0;
                }
                 data3.setDate(data3.getDate()+1);
              }

              //console.log(matrizgrafico);
              var row="";
              for(var i = 0; i<tam; i++){
                row += "<tr onclick='myFunction("+obj[i].id+")' >" ;
                row += "<td >" +obj[i].id + "</td>";
                row += "<td >" +obj[i].aberto_por + "</td>";
                row += "<td >" +obj[i].servidor + "</td>";
                row += "<td >" +obj[i].cidade + "</td>";
                row += "<td >" +obj[i].operador_de_rede + "</td>";
                row += "<td >" +obj[i].situacao_do_chamado + "</td>";
                row += "<td >" +obj[i].data_abertura_chamado + "</td>";
                row += "</tr>";
                if (obj[i].situacao_do_chamado == "Verificando"){status[0]++;}
                else if (obj[i].situacao_do_chamado == "Aberto"){status[1]++;}
                else if (obj[i].situacao_do_chamado == "Resolvido"){status[2]++;}
              }
              $('#tabelaFTTH').append(row);
              $('#donut-chart').remove();
              $('#div_donut').append('<div id="donut-chart"></div>');
              var donut = new Morris.Donut({
                element: 'donut-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [
                  {label: "Verificando", value: status[0]},
                  {label: "Aberto", value: status[1]},
                  {label: "Resolvido", value: status[2]}
                ],
                hideHover: 'auto'
             });


              $('#revenue-chart').remove();
              $('#div_area').append('<div id="revenue-chart"></div>');
              var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: dataJson,
                xkey: 'y',
                ykeys: ['Resolvido', 'Aberto', 'Verificando'],
                labels: ['Resolvido', 'Aberto', 'Verificando'],
                lineColors: ['#a0d0e0', '#3c8dbc', '#8c0dbc'],
                hideHover: 'auto'
              });
          }

          else{

            var dataJson = new Array();
              var label1 = 0;
              var label2 = 0;
              var label3 = 0;
              var cont;
              var data1 = new Date($("#data_1").val());
              var data2 = new Date($("#data_2").val());
              var dias = (data2.getTime() - data1.getTime());
              dias = Math.round(Math.abs(dias/(1000*60*60*24)));
              var data3 = data1;
              var vv = data3.getDate();
              data3.setDate(vv+1);
              for (var i = 0; i < dias+1; i++) {
                cont = false;
                for (var x = 0; x < obj.length; x++) {
                  var data4 = new Date(obj[x].data_abertura_chamado);
                  if(data3.getDate() == data4.getDate() && data3.getMonth() == data4.getMonth() && data3.getFullYear() == data4.getFullYear()){
                    cont = true;
                    switch (obj[x].situacao_do_chamado){
                      case "Resolvido":
                        label1++;
                        break;
                      case "Aberto":
                        label2++;
                        break;
                      case "Verificando":
                        label3++;
                        break;
                    }
                  }
                }
                if (cont) {
                  dataJson.push({ y: data3.getFullYear()+"-"+(data3.getMonth()+1)+"-"+data3.getDate(), Resolvido: label1, Aberto: label2, Verificando: label3});
                  label1 = 0;
                  label2 = 0;
                  label3 = 0;
                }
                 data3.setDate(data3.getDate()+1);
              }

            $('#revenue-chart').remove();
            $('#div_area').append('<div id="revenue-chart"></div>');
              var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: dataJson,
                xkey: 'y',
                ykeys: ['Resolvido', 'Verificando'],
                labels: ['Resolvido', 'Verificando'],
                lineColors: ['#a0d0e0', '#3c8dbc'],
                hideHover: 'auto'
              });
              var row="";
              for(var i = 0; i<tam; i++){
                  row += "<tr onclick='myFunction("+obj[i].id+")'>" ;
                  row += "<td >" +obj[i].id + "</td>";
                  row += "<td >" +obj[i].aberto_por + "</td>";
                  row += "<td >" +obj[i].servidor + "</td>";
                  row += "<td >" +obj[i].cidade + "</td>";
                  row += "<td >" +obj[i].operador_de_rede + "</td>";
                  row += "<td >" +obj[i].situacao_do_chamado + "</td>";
                  row += "<td >" +obj[i].data_abertura_chamado + "</td>";
                  row += "</tr>";
                  if (obj[i].situacao_do_chamado == "Verificando"){status[0]++;}
                  else if (obj[i].situacao_do_chamado == "Aberto"){status[1]++;}
                  else if (obj[i].situacao_do_chamado == "Resolvido"){status[2]++;}
              }
              $('#donut-chart').remove();
              $('#div_donut').append('<div id="donut-chart"></div>');
              var donut = new Morris.Donut({
                element: 'donut-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [
                  {label: "Verificando", value: status[0]},
                  {label: "Aberto", value: status[1]},
                  {label: "Resolvido", value: status[2]}
                ],
                hideHover: 'auto'
             });
            $('#tabelaFTTH').append(row);
          }
        }
      });
      return false;
    }
  });
      $(function () {
        $("#tabelaFTTH").DataTable();
        $(".select2").select2();
      });

    </script>
    
  </body>
</html>
