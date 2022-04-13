<?php
require_once "conexao.php";


$marca = filter_input(INPUT_GET, "marca",FILTER_UNSAFE_RAW);
if(!empty($marca)){
    $pesq_marcas = "%". $marca. "%";

    $tsql = "SELECT DISTINCT CAM_FABRN FROM CAM010 WHERE CAM_DTE >='2018' AND CAM_FABRN LIKE :marca";
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':marca', $pesq_marcas);
    $stmt->execute();

    if(($stmt) and ($stmt->rowCount() != 0)){

        while($row_marca = $stmt->fetch(PDO::FETCH_ASSOC)){
            $dados [] = [
                'CAM_FABRN' => $row_marca['CAM_FABRN']
            ];
        }
    $retorna = ['erro' => false, 'dados' => $dados ];

    }else{
        $retorna = ['erro' => true, 'msg' => "Erro: Nenhuma marca encontrada"]; 
    }
 
}else{
 $retorna = ['erro' => true, 'msg' => "Erro: Nenhuma marca encontrada"];
}


echo json_encode($retorna);



?>
