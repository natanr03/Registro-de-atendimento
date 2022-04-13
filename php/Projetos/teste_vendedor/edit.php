<?php
session_start();
ob_start();
include_once 'conexao.php';

if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM Registros WHERE id=$id";
        $result = $conn->prepare($sqlSelect);
        $result->execute();
        if(($result) AND ($result->rowCount() != 0))
        {
            while($user_data = $result->fetch(PDO::FETCH_ASSOC))
            { $_SESSION['id'] = $user_data['id'];
                $nome = $user_data['nome'];
                $telefone = $user_data['telefone'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $marca = $user_data['marca'];
                $modelo = $user_data['modelo'];
                $peca = $user_data['peca'];
                $observacao = $user_data['observacao'];
                
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: sistema.php');
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <title>Formulário de registros</title>  
	 <link rel="stylesheet" type="text/css" href="atend_reg.css" /> 
  </head>
<body>
  <h1>Registro de Atendimento</h1>
  <p>Por favor, preencha todos os campos deste formulário</p>
  <form method="POST" action="registrar_edit.php">
<fieldset>
  <div style="width:500px;">
    <label>Nome<input type="text" id="nome" name="nome" required value=<?php echo $nome;?>></label>
  </div>
  <div style="width:500px;">
    <label>Telefone<input type="text" id="telefone" name="telefone" value=<?php echo $telefone;?> required ></label>
  </div>
  <div style="width:500px;">
    <label>E-mail<input id="email" type="email" name="email"  required value=<?php echo $email;?>></label>
  </div>
  <div style="width:500px;">
    <label>Marca<input  type="text" id="marca" name="marca" placeholder="Digite a fabricante do caminhão"  required value=<?php echo $marca;?>></label>
  </div>
  <div  style="width:500px;">
    <label>Modelo<input  type="text" id="modelo" name="modelo" placeholder="Digite o modelo do caminhão" required value=<?php echo $modelo;?>></label>
  </div>
  <div class="autocomplete" style="width:500px;">
    <label>Peças<input id="pecas" type="text" name="pecas" required  value=<?php echo $peca; ?>></label>
  </div>
  <div style="width:500px;">
    <label>Observação<input type="text" id="observacao" name="observacao" style="width:500px;" value=<?php echo $observacao;?>></label>
  </div>
   <div style="width:500px;">
    <label>Resultado<input type="text" id="resultado" name="resultado" style="width:500px;"/></label>
  </div> 
  <label>

</fieldset>
    <input id="update" type="submit" name="update" value="Registrar"/> 

    </form> 
  </body>
</html>
