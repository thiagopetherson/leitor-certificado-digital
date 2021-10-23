<?php

				
	date_default_timezone_set('Etc/GMT+3');
	setlocale(LC_ALL, "", "pt_BR.utf-8");
	header("Content-Type: application/json; charset=utf-8");
	
	//Pegando a senha que veio do formulário 	
	$senha = filter_input(INPUT_POST, 'senha-certificado', FILTER_SANITIZE_STRING); 
	
	//Validação que só prossegue com o código se o arquivo vier do formulário
	if(!empty($_FILES['certificado-digital']['name']))
	{
		//Pegando o arquivo que veio do formulário
		$file = $_FILES["certificado-digital"]["tmp_name"];		
		
		// Nessa condicional, estamos verificando que se não houve erro (erro == 4 significa erro)		
		if($_FILES["certificado-digital"]["error"][0] != 4)
		{				
			// Criando um array
			$certs = array ();

			// Lê todo o conteúdo do arquivo e passa para uma string
			$pkcs12 = file_get_contents($file);

			
			/** 
			 	Nessa condicional abaixo, pegamos os dados do certificado 
			    que estão em '$pkcs12' e passamos para para o array '$certs'.
			    Isso só acontece se o terceiro parâmetro da função, que é a senha que veio do formulário,
			    estiver batendo com a senha do certificado.
			    A função nativa do php, openssl_pkcs12_read, faz isso.
			**/


			if( openssl_pkcs12_read($pkcs12, $certs, $senha) )
			{				
				// Criando um array
				$dados = array ();

				/** 
			 		Abaixo, na função nativa do PHP, openssl_x509_read, 
			 		estamos lendo o certificado e retornando um objeto.

			 		Com o openssl_x509_parse, estamos analizando o certificado e
			 		passando o retorno das informações, em forma da array, para a variável $dados
				**/

				$dados = openssl_x509_parse( openssl_x509_read($certs['cert']) );
				
				// Passando todo o contexto da chave privada do certificado digital para a variável $privatekey
				$privatekey = $certs['pkey'];
				
				// Pegando a chave pública do certificado e passando para a variável $pub_key (evite usar underline em nome de variáveis. O correto seria $pubKey)
				$pub_key = openssl_pkey_get_public($certs['cert']);

				// Retorna um array com os detalhes principais da chave pública do certificado
				$keyData = openssl_pkey_get_details($pub_key);

				// Armazenando a chave privada em uma variável
				$publickey = $keyData['key'];
							
				
			   // Dados mais importantes que temos no certificado digital
			  
			   /*			   
			   echo '<br>'.'<br>'.'--- Dados do Certificado ---'.'<br>'.'<br>';
			   echo $dados['name'].'<br><br>';                           //Nome
			   echo $dados['hash'].'<br><br>';                           //hash
			   echo $dados['subject']['C'].'<br><br>';                   //País
			   echo $dados['subject']['ST'].'<br><br>';                  //Estado
			   echo $dados['subject']['L'].'<br><br>';                   //Município
			   echo $dados['subject']['CN'].'<br><br>';                  //Razão Social e CNPJ / CPF
			   echo date('d/m/Y', $dados['validTo_time_t'] ).'<br><br>'; //Validade
			   echo $dados['extensions']['subjectAltName'].'<br><br>';   //Emails Cadastrados separado por ,
			   echo $dados['extensions']['authorityKeyIdentifier'].'<br><br>'; 
			   echo $dados['issuer']['OU'].'<br><br>';                   //Emissor 
			   echo '<br>'.'<br>'.'--- Chave Pública ---'.'<br>'.'<br><br>';
			   print_r($publickey);
			   echo '<br>'.'<br>'.'--- Chave Privada ---'.'<br>'.'<br><br>';
			   print_r($privatekey);
			   */
			   
			   // Criando um array que terá o retorno das informações do certificado
			   $retorno = []; 

			   // Preenchendo o array de retorno com os dados principais do certificado digital
			   $razao_cnpj = explode(":", $dados['subject']['CN']);
			   $retorno['razaosocial'] =  $razao_cnpj[0];
			   $retorno['cnpj'] = $razao_cnpj[1];
			   $retorno['validade'] = date('d/m/Y', $dados['validTo_time_t']);
			   
			   // Retornando, em forma de JSON, os dados que pegamos do certificado
			   echo json_encode($retorno);
			   
			}
			
		}	
	}	

?>