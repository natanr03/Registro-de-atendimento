<?php


$conn = new PDO( "sqlsrv:Server=(local) ; Database = Portal_Registro ", "", "", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true));
//$conn = new PDO( "sqlsrv:Server=(local) ; Database = Portal_Registro ", "protheus", "protheus", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true));


?>