<?php  
require_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['registrar'])){
    $tsql = "INSERT INTO Registros (nome, telefone, email, marca, modelo, peca, vendedor, observacao) VALUES (:nome,:telefone, :email, :marca, :modelo, :peca, :vendedor, :observacao) ";
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $stmt->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $stmt->bindParam(':marca', $dados['marca'], PDO::PARAM_STR);
    $stmt->bindParam(':modelo', $dados['modelo'], PDO::PARAM_STR);
    $stmt->bindParam(':peca', $dados['pecas'], PDO::PARAM_STR);
    $stmt->bindParam(':vendedor', $dados['vendedor'], PDO::PARAM_STR);
    $stmt->bindParam(':observacao', $dados['email'], PDO::PARAM_STR);
     $stmt->execute();
    if ($stmt == true) {
        echo "Registro Concluído.\n";
    } else {
        echo "Erro: Registro não concluído ";
    }
}
header("Refresh: 1; atend_reg.html");

?>  

