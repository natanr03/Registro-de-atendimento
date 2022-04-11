<?php  
session_start();
$nome = $_SESSION['A3_NOME'];
require_once "conexao.php";

//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($user_data['registrar'])){
    $tsql = "UPDATE Registros nome=:nome, telefone=:telefone, email=:email, marca=:marca, modelo=:modelo, peca=:peca, vendedor=:vendedor, observacao=:observacao, resultado=:resultado"; 
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':nome',$user_data['nome']);
    $stmt->bindParam(':telefone', $user_data['telefone']);
    $stmt->bindParam(':email', $user_data['email']);
    $stmt->bindParam(':marca',$user_data['marca']);
    $stmt->bindParam(':modelo', $user_data['modelo']);
    $stmt->bindParam(':peca',$user_data['pecas']);
    $stmt->bindParam(':vendedor', $nome);
    $stmt->bindParam(':observacao',$user_data['observacao']);
    $stmt->bindParam(':resultado', $user_data['resultado']);
    $stmt->execute();
    if ($stmt == true) {
        echo "Registro editado com sucesso.\n";
    } else {
        echo "Erro: Falha na edição do registro ";
    }
}
header("Refresh: 1; sistema.php");

?>  