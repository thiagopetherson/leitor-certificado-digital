# leitor-certificado-digital
Leitor de Certificado Digital (Arquivos no formato .pfx)

- Foi feito um formulário simples com dois campos.
- Em um dos campos você insere a senha do certificado e no outro você insere o seu Certificado Digital no formato .pfx
- O envio do form é feito via POST e utilizamos JavaScript(jQuery) com AJAX para envio do form para o arquivo PHP. 
- No arquivo PHP, nós recebemos o arquivo e fazemos a leitura do mesmo. Depois, extraímos as informações que nos serão necessárias. 
- A parte comentada tem mais um lista de informações sobre os dados que o Certificado Digital possui. 
- Por último, pegamos a razão social, CNPJ e validade do certificado e retornamos para o 'done' do AJAX. 
- No retorno do AJAX, nós damos um console.log e 3 alerts com as informações que extraímos do Certificado Digital.

- Logicamente o código PHP pode ser bem melhor elaborado, como por exemplo, com validação de extensão, tamanho, etc ... 
- Poderíamos até mesmo pegar esses dados extraídos e inserirmos os mesmos em uma tabela do banco de dados. (Poderíamos fazer um controle de vencimentos, por exemplo). 
- Basicamente é isso.

- Abraços!

- Esse foi feito por mim, na raça. Rs


