
<?php
session_start();
ob_start();
include_once 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20,147, 220), rgb(17,54,71));
        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 30px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .Submit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .Submit:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendLogin'])) {
        //var_dump($dados);
        $query_usuario = "SELECT A3_COD, A3_NOME, A3_SENHA 
                FROM SA3010
                WHERE A3_COD =:usuario";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            //var_dump($row_usuario);
            if($dados['senha_usuario'] == $row_usuario['A3_SENHA']){
                $_SESSION['A3_NOME'] = $row_usuario['A3_NOME'];
                header("Location: sistema.php");
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Senha inválida!</p>";
                
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário inválido!</p>";
        }

        
    }

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
       unset($_SESSION['msg']);
       header("Refresh: 1; login.php");
    }
    ?>
        <h1>Login</h1>
        <form method="POST" action="">
        <input type="text"  name="usuario" placeholder="ID"> </label><br><br>

        <input type="password" name="senha_usuario" placeholder="Senha" ></label><br><br>
       
        <input class="Submit" type="submit" value="Acessar" name="SendLogin">
        </form>
    </div>
</body>
</html>












