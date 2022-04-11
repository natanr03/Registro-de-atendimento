<?php  
session_start();
$vendedor = $_SESSION['A3_NOME'];
$id = $_SESSION['id'];
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['update'])){
    $tsql = "UPDATE Registros SET nome=:nome, telefone=:telefone, email=:email, marca=:marca, modelo=:modelo, peca=:peca, vendedor=:vendedor, observacao=:observacao, resultado=:resultado WHERE id = '$id' ";
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $stmt->bindParam(':marca', $dados['marca'], PDO::PARAM_STR);
    $stmt->bindParam(':modelo', $dados['modelo'], PDO::PARAM_STR);
    $stmt->bindParam(':peca', $dados['pecas'], PDO::PARAM_STR);
    $stmt->bindParam(':vendedor', $vendedor, PDO::PARAM_STR);
    $stmt->bindParam(':observacao', $dados['observacao'], PDO::PARAM_STR);
    $stmt->bindParam(':resultado', $dados['resultado'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt == true) {
        echo "Registro editado com sucesso.\n";
    } else {
        echo "Erro: Falha na edição do registro";
    }
}
header("Refresh: 1; sistema.php");

?>









