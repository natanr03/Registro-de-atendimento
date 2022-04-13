<?php
session_start();
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <title>Formulário de registros</title>  
	 <link rel="stylesheet" type="text/css" href="atend_reg.css" /> 
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    
  </head>
<body>
  <h1>Registro de Atendimento</h1>
  <p>Por favor, preencha todos os campos deste formulário</p>
  <form method="POST" action="registrar_vendedor.php">
<fieldset>
  <div style="width:500px;">
    <label>Nome<input type="text" id="nome" name="nome" required/></label>
  </div>
  <div style="width:500px;">
    <label>Telefone<input type="text" id="telefone" name="telefone" required/></label>
  </div>
  <div style="width:500px;">
    <label>E-mail<input id="email" type="email" name="email"  required/></label>
  </div>
  <div style="width:500px;">
    <label>Marca<input  type="text" id="marca" name="marca" placeholder="Digite a fabricante do caminhão"  required/></label>
  </div>
  <div  style="width:500px;">
    <label>Modelo<input  type="text" id="modelo" name="modelo" placeholder="Digite o modelo do caminhão" required/></label>
  </div>
  <div class="autocomplete" style="width:500px;">
    <label>Peças<input id="pecas" type="text" name="pecas" required /></label>
  </div>
  <div style="width:500px;">
    <label>Observação<textarea id="observacao" name="observacao" style="width:500px;"></textarea></label>
  </div>
   <div style="width:500px;">
    <label>Resultado<input type="text" id="resultado" name="resultado" style="width:500px;"></input></label>
  </div> 
  <label>

</fieldset>
    <input id="registrar" type="submit" name="registrar" value="Registrar"/> 

    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
      $.getJSON("search.php", function(data){
        //console.log(data);

         var retorno_itens = [];
         $(data).each(function(key,value){
           retorno_itens.push(value.CAM_FABRN);
         })
-
       $("#marca").autocomplete({
         source: retorno_itens
       });
      });
    </script>

    
  </body>
</html>
