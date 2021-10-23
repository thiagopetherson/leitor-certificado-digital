<html>
<head>
    <title>Leitor Certificado Digital</title>
    <link rel="stylesheet" href="_bootstrap/bootstrap.min.css">  
</head>
<body style="background-color: rgba(220,220,220, 0.3)">


<div class="container">
 
	<div class="row" style="margin-top:10%">
	
		<div class="col-lg-6 offset-lg-3 mt-3">
			  <h3>Leitor de Certificado Digital</h3>
		</div>
		
		<div class="col-lg-6 offset-lg-3">
		
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
							Ler Certificado
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
