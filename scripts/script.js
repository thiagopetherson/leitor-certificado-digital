$(document).ready(function()
{

	// Evento que ocorre quando submitamos o formulário
	$('#formulario-certificado-digital').submit(function(e)
	{			
		e.preventDefault();
		
		// Chamando a função para ler o certificado
		lerCertificado();	
		
	});


	// Função que faz a leitura do certificado
	function lerCertificado()
	{	

		// Pegando o formulário
		let formulario = $('#formulario-certificado-digital')[0];
		// Passando os dados dos campos do formulário para a variável "data"
		let data = new FormData(formulario);

		// Esse ajax faz o envio dos dados do certificado para o arquivo php
		$.ajax
		({		
			url:"php/salvar-certificado.php",		
			type:"POST",
			data: data,
			processData: false,
			contentType: false	
			
		}).done(function(data)
		{	
			// Promisse do ajax do jquery com o retorno (em caso de sucesso) vindo do arquivo PHP
			console.log(data);	

			// Dando alerts com os dados vindos do certificado
			// Nesse momento, você verá na tela três alerts com a razão social, cnpj e validade do certificado		
			alert(data.razaosocial);
			alert(data.cnpj);
			alert(data.validade);
			
			// Limpando os campos do formulário
			$('#senha-certificado').val("");
			$('#certificado-digital').val("");
		
		}).fail(function()
		{
			
		}).always(function()
		{

		});		
		
	}



});
	
