<?php  
$serverName = "(local)";  
$connectionInfo = array("Database"=>"Carros");  
$conn = sqlsrv_connect($serverName, $connectionInfo);  
if ($conn === false) {  
    echo "Erro de Conexão.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  
  

$tsql = "INSERT INTO Registro  
        (nome,   
         telefone,   
         marca,   
         modelo,      
         observacao)  
        VALUES   
        (?, ?, ?, ?, ?)";  
  

$params = array (&$_POST['nome'],  &$_POST['telefone'],  &$_POST['marca'],  &$_POST['modelo'],  &$_POST['observacao'] );

$stmt = sqlsrv_query($conn, $tsql, $params);  
if ($stmt) {  
    echo "Registro Concluído.\n";  
} else {  
    echo "Registro não concluído.\n";  
    die(print_r(sqlsrv_errors(), true));  
}  
  
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn); 
header("Refresh: 1; atend_reg.html")

?>  

