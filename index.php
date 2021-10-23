<html>
<head>
    <title>Vision - Certificado Digital</title>
    <link rel="stylesheet" href="_bootstrap/bootstrap.min.css">  
</head>
<body>


<div class="container">
 
	<div class="row" style="margin-top:10%">
	
		<div class="col-lg-4 offset-lg-4 mt-3">
			  <h3>Certificado Digital</h3>
		</div>
		
		<div class="col-lg-4 offset-lg-4">
		
			<form id="formulario-certificado-digital" enctype="multipart/form-data">  
					
					<!-- Nesse campo senha, inserimos uma senha que todo certificado digital possui -->
					<!-- Sem essa senha, não conseguimos abrir o certificado -->
					<div class="form-group">
						<label for="senha-certificado">Senha do Certificado</label>
						<input type="text" class="form-control" id="senha-certificado" name="senha-certificado">
					</div>

					<div class="form-group">
						<label for="certificado-digital">Inserir o Certificado</label>
						<input type="file" class="form-control" id="certificado-digital" name="certificado-digital">
					</div>
						
					<div class="pt-3 pb-3 text-right">
						<button class="btn btn-primary btn-sm" type="submit">
							Salvar Alterações
						</button> 
					</div>
			 </form> 
		
		</div>
		
	</div>
	
</div>

<script src="//code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="_bootstrap/bootstrap.min.js"></script>
<script src="scripts/script.js"></script>
		

</body>
</html>
