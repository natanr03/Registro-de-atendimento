<?php

    session_start();
    require_once "conexao.php";

    $fabricantes = $conn->prepare("SELECT DISTINCT CAM_FABRN FROM CAM010 WHERE CAM_DTE >='2018'");
    $fabricantes->execute();
    $fabricantes = $fabricantes->fetchAll(PDO::FETCH_ASSOC);

    foreach($fabricantes as $fabs){
        echo($fabs["CAM_FABRN"] . " | ");
    }

    foreach ($fabricantes as $fab){

        $peca = $conn->prepare("select Distinct B1_DESC from SB1010 where B1_DMONT = '". trim($fab["CAM_FABRN"]) ."'");
        $peca->execute();
        $json = json_encode($peca->fetchAll(PDO::FETCH_ASSOC));
    
        if(file_exists("cachePecas/cache". trim($fab["CAM_FABRN"]) .".txt")){
            if(!unlink("cachePecas/cache". trim($fab["CAM_FABRN"]) .".txt")){
                continue;
            }
        }

        $arquivo = fopen("cachePecas/cache". trim($fab["CAM_FABRN"]) .".txt","w+");
    
        if($arquivo == null){
            continue;
        }
    
        fwrite($arquivo, $json);
        fclose($arquivo);

        echo $fab["CAM_FABRN"] . "  OK <br>";
    }

?>
