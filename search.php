<?php
session_start();
require_once "conexao.php";
//$marca = $_POST['marca'];

$fabricantes = $conn->prepare("SELECT DISTINCT CAM_FABRN FROM CAM010 WHERE CAM_DTE >='2018'");
$fabricantes->execute();
echo json_encode($fabricantes->fetchAll(PDO::FETCH_ASSOC));





//$modelo =
?>
