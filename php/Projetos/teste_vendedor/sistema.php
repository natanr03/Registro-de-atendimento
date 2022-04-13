<?php
session_start();
include_once 'conexao.php';
$nome = $_SESSION['A3_NOME'];
if(!isset($_SESSION['id']) AND !isset($_SESSION['A3_NOME'])){
echo "Erro: Usuário não logado";
header("Location:login.php");


}


?>

<!DOCTYPE html>
<html>
  <head> 
  <link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Sistema de Login</title>  
  </head>
<body> 
    <?php
   //print_r($nome);
   
$tsql = "SELECT *FROM Registros WHERE vendedor = '$nome' AND resultado IS NULL ";
$stmt = $conn->prepare($tsql);
$stmt->bindParam(1,$nome);
$stmt->execute();
?>
	<nav>
		<input type="checkbox" id="check">
		<label for="check" class="checkbtn">
			<i class="fas fa-bars"></i>
		</label>
		
    <img src="logo.jpeg" class="smaller-image"> 
    
		 <ul>
      <li><p class="nome-usuario">Bem vindo, <?php echo" $nome" ?></p></li>
			<li><a class="btn btn-danger btn-sm"  href="sair.php">Sair</a></li>
			<li><a class="btn btn-primary" href="atend_reg.php">Novo Registro</a></li>
			<li><a class="btn btn-primary" data-toggle="collapse" href="#fila_geral" role="button" aria-expanded="false" aria-controls="fila_geral">Fila Geral</a></li>
			<li><a class="btn btn-primary" data-toggle="collapse" href="#fila_especifica" role="button" aria-expanded="false" aria-controls="fila_especifica">Minha Fila</a></li>
		</ul>
	</nav>
	<div class="collapse m-5 table-color" id="fila_geral">
  <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Peça</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Observação</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT *FROM Registros WHERE vendedor IS NULL AND resultado IS NULL ";
                    $stmt2 = $conn->prepare($sql);
                    $stmt2->execute();

                    while ($user_data = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['marca']."</td>";
                        echo "<td>".$user_data['modelo']."</td>";
                        echo "<td>".$user_data['peca']."</td>";
                        echo "<td>".$user_data['vendedor']."</td>";
                        echo "<td>".$user_data['observacao']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>

    <div class="collapse m-5 table-color" id="fila_especifica">
  <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Peça</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Observação</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['marca']."</td>";
                        echo "<td>".$user_data['modelo']."</td>";
                        echo "<td>".$user_data['peca']."</td>";
                        echo "<td>".$user_data['vendedor']."</td>";
                        echo "<td>".$user_data['observacao']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>