<?php

require_once "conexao.php";
$marca = $conn->query("SELECT DISTINCT CAM_FABRN FROM CAM010 WHERE CAM_DTE >='2018'");
echo json_encode($marca->fetchAll(PDO::FETCH_ASSOC));

?>
