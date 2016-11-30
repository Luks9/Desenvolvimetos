//Scripts de validação JQUERY
jQuery(document).ready(function () {
	jQuery('#growl-primary').click(function(){
		jQuery.gritter.add({
			title: 'This is a regular notice!',
			text: 'This will fade out after a certain amount of time.',
			class_name: 'growl-primary',
			image: 'images/screen.png',
			sticky: false,
			time: ''
		});
		return false;
	});
	$('#salvarKmz').submit(function() {
		// Configurações para a requisição Ajax
		var dados = new FormData(this);
		$('#kmz').change(function (event) {
			dados.append('kmz', event.target.files[0]); // para apenas 1 arquivo
		})
		$.ajax({
			type: "POST",
			url: "/chamados/php/salvarKmz.php",
			processData: false,
			contentType: false,
			data: dados,
			success: function( data ) {
				if (data == true) {
					console.log(dados);
					jQuery.gritter.add({
						title: 'KMZ Salvo com sucesso!',
						text: 'KMZ salvo com Sucesso !',
						class_name: 'growl-success',
						image: '../dist/img/shield-ok-icon.png',
						sticky: false,
						time: '2000',
					});
					window.setTimeout("location.href=''",500);
				}else if(data == false) {
					console.log(data);
					jQuery.gritter.add({
						title: 'Erro ao enviar KMZ',
						text: 'Selecione o KMZ',
						class_name: 'growl-warning',
						image: '../dist/img/shield-warning-icon.png',
						sticky: false,
						time: '1000',
					});
					window.setTimeout("location.href=''",500);
				}
			}
		});
		return false;
	});
});
