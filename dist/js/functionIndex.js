function idfunction(id, cliente, tel, tel2, cidade, data, status,obs, origem, setor, horaAgendada, status, usuario){
            $('#form_geral').on('hidden.bs.modal', function () {
              $(this).find("input,textarea,select").val('').end();
            });
            $('#numeros, #usuario')
              .find('option')
              .remove()
              .end();
            $('#pre').empty(); 
            if (status=="Agendado") {
              horaAgendada = horaAgendada.slice(0,19).replace(" ","T");
              $('#div_hora').show();
              $('#agendado').val(horaAgendada);
            }else{
              console.log("ok");
              $('#agendado').val('');
              $('#div_hora').hide();

            }
            var tipo = $('#tipo').val();
            console.log(tipo);
            var info="", obs_array;
            var div ="<p>";
            var pre ="<p>";
            div = "<b>Cliente: </b> <b class='text-light-blue'>"+cliente+"</b> &nbsp";
            div += "<b>Cidade: </b> <b class='text-light-blue'>"+cidade+"</b> &nbsp";
            div += "<b>Data: </b> <b class='text-light-blue'>"+data+"</b></p>";
            div += "<p><b>Observação:</b></p>";
            obs_array = obs.split('*');
            for(var i=0; i<obs_array.length;i++){
              info += obs_array[i] + '</br>';
            }
            $("#div").html(div);
            $('#pre').html(info); 
            $('#setor').val(setor);
            $('#id').val(id);
            $('#status').val(status);
            $('#numeros')
            .append('<option value="'+tel+'">'+tel+'</option>')
            .append('<option value="'+tel2+'">'+tel2+'</option>');
            if (usuario != "Sem atribuição") {
              $('#usuario').append('<option selected value="'+usuario+'">'+usuario+'</option>');
              if (tipo == 'admin') {
                $('#usuario').append('<option value="Sem atribuição">Sem atribuição</option>');
              }
            }else{$('#usuario').append('<option readonly value="Sem atribuição">Sem atribuição</option>');}

}

$('#form_geral').submit(function() {
        // Convertemos os dados do formulário para Objeto
  var dados = {};
  $('#form_geral').serializeArray().map(function(x){dados[x.name] = x.value;}); 
  // Configurações para a requisição Ajax
  console.log(dados);
  $.ajax({
    type: "POST",
    url: "/agendamento/php/editarRetorno.php",
    data: dados,
    success: function( data ) {
      if (data == false) {
        jQuery.gritter.add({
          title: 'Cadastrada com Sucesso!',
          text: 'Você será redirecionado',
          class_name: 'growl-success',
          image: '../dist/img/shield-ok-icon.png',
          sticky: false,
          time: '2000',
        });
        window.setTimeout("location.href='./index.php'",2000); 
      }else if(data == true) {
        jQuery.gritter.add({
          title: 'Esse atendimento não esta atribuido a você.',
          text: 'Você será redirecionado',
          class_name: 'growl-warning',
          image: '../dist/img/shield-warning-icon.png',
          sticky: false,
          time: '2000',
        });
        window.setTimeout("location.href='./index.php'",2000);
      }
    }
  });
  return false;
});

  function ligar(){
    tel = $("#numeros").val().replace(/[^0-9]/g,'');
    id = $("#id").val();
    $("#status").val("Em atendimento");
    var usuario = $("#user").val();
    $('#usuario')
      .append('<option selected value="'+usuario+'">'+usuario+'</option>');

    $.getJSON('solicitacoes.ajax.php?search=',{
        cod: 'ligar',
        id: id,
        telefone: tel }, 
      function(retorno){
        console.log(retorno);
        if (retorno == true) {
          $('#ligar').modal('show');
          $('.fa-spin').show();
          setTimeout("$('.fa-spin').hide();", 8000);

        }else if(retorno == '2'){
          jQuery.gritter.add({
            title: 'Retorno já em atendimento!',
            text: 'Você será redirecionado',
            class_name: 'growl-warning',
            image: '../dist/img/shield-warning-icon.png',
            sticky: false,
            time: '4000',
          });
          window.setTimeout("location.href='./index.php'",3000);
        }
      });

  }

  $("#finalizar").click(function(){
      decisao = confirm("Deseja realmente finalizar esse retorno?");
      if (decisao) {
        id = $("#id").val();
        $.getJSON('solicitacoes.ajax.php?search=',{
          id: id }, 
        function(retorno){
          if (retorno == true) {
            jQuery.gritter.add({
            title: 'Finalizado com Sucesso!',
            text: 'Você será redirecionado',
            class_name: 'growl-success',
            image: '../dist/img/shield-ok-icon.png',
            sticky: false,
            time: '2000',
          });
          window.setTimeout("location.href='./index.php'",2000);
          }else if(retorno == '2'){
            jQuery.gritter.add({
              title: 'Esse atendimento não esta atribuido a você.',
              text: 'Você será redirecionado',
              class_name: 'growl-warning',
              image: '../dist/img/shield-warning-icon.png',
              sticky: false,
              time: '4000',
            });
          }
        });
      }
  });

  function finalizado(id, cliente, tel, tel2, cidade, data, status,obs, origem, setor, tempo, tempo_atendimeto){
      $('#form_2').on('hidden.bs.modal', function () {
        $(this).find("input,textarea,select").val('').end();
      });
      $('#numeros_2')
        .find('option')
        .remove()
        .end();
      $('#pre_2').empty(); 
      var info="", obs_array;
      var div ="<p>";
      var pre ="<p>";
      div = "<b>Cliente: </b> <b class='text-light-blue'>"+cliente+"</b> &nbsp";
      div += "<b>Cidade: </b> <b class='text-light-blue'>"+cidade+"</b> &nbsp";
      div += "<b>Data: </b> <b class='text-light-blue'>"+data+"</b> <b> Tempo de atendimento:</b> <b class='text-light-blue'>"+tempo_atendimeto+"</b></p>";
      div += "<p><b>Observação:</b></p>";
      obs_array = obs.split('*');
      for(var i=0; i<obs_array.length;i++){
        info += obs_array[i] + '</br>';
      }
      $("#div_2").html(div);
      $('#pre_2').html(info); 
      $('#setor_2').val(setor);
      $('#id_2').val(id);
      $('#status_2').val(status);
      $('#numeros_2')
      .append('<option value="'+tel+'">'+tel+'</option>')
      .append('<option value="'+tel2+'">'+tel2+'</option>')
  }

  function enviarSMS(tel, tel2){
    $('#msg')
        .find('option')
        .remove()
        .end();
    $('#enviar_sms').on('hidden.bs.modal', function () {
        $(this).find("input,textarea,select").val('').end();
      });
    $('#ver_msg').val('');
    $('#tel_sms')
        .find('option')
        .remove()
        .end();
   $.getJSON('solicitacoes.ajax.php?search=',{
        cod: 'msg'}, 
      function(x){
        console.log(x);
        $('#msg').append('<option selected disabled>Mensagens</option>');
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
    $('#tel_sms')
      .append('<option value="'+tel+'">'+tel+'</option>')
      .append('<option value="'+tel2+'">'+tel2+'</option>');
  }

  $(function(){
    linhas = new Array();
        for(var j=0;j<7;j++){
          linhas[j] = $("#agendado"+j+" tr").length-1;
          $('#number'+j).attr('data-original-title', 'Agendamentos');
          $('#number'+j).text(linhas[j]); 
        }

        //$('#number0').text('21');
  })