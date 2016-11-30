//Scripts de validação JQUERY
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
					if (data == true) {
						jQuery.gritter.add({
							title: 'Salvo com Sucesso !',
							text: 'Aguarde...',
							class_name: 'growl-success',
							image: 'dist/img/shield-ok-icon.png',
							sticky: false,
							time: '2000',
						});
						window.setTimeout("location.href='/chamados/pages/index.php'",1001110);
					}else if(data == false) {
						jQuery.gritter.add({
							title: 'Erro no Formulario',
							text: 'Erro !',
							class_name: 'growl-danger',
							image: 'dist/img/shield-error-icon.png',
							sticky: false,
							time: '2000',
						});
						window.setTimeout("location.href='/chamados/pages/index.php'",1011100);
					}
				}
			});
			return false;
		}
	});






});