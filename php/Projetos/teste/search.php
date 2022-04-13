<?php
session_start();
require_once "conexao.php";
$fabricantes = $conn->prepare("SELECT DISTINCT CAM_FABRN FROM CAM010 WHERE CAM_DTE >='2018'");
$fabricantes->execute();
echo json_encode($fabricantes->fetchAll(PDO::FETCH_ASSOC));
$marca=$_POST['marca'];
$modelo = filter_input(INPUT_GET, "modelo",FILTER_UNSAFE_RAW);
if(!empty($modelo)){
    $pesq_modelo= "%". $modelo. "%";
    $tsql = "SELECT DISTINCT CAM_MOD, CAM_PROD FROM CAM010 WHERE CAM_DTE >='2018' AND CAM_FABRN  = :marca and CAM_MOD LIKE :modelo";
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':modelo', $pesq_modelo);
    $stmt->bindParam(':marca', $marca);
    $stmt->execute();
}
if(($stmt) and ($stmt->rowCount() != 0)){
while($row_modelo = $stmt->fetch(PDO::FETCH_ASSOC)){
$dados [] = [
'CAM_MOD' => $row_modelo['CAM_MOD']
];
}
$retorna = ['erro' => false, 'dados' => $dados ];
}
else{
$retorna = ['erro' => true, 'msg' => "Erro: Nenhuma marca encontrada"]; 
}
?>
