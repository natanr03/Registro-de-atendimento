<?php
session_start();
ob_start();
unset($_SESSION['A3_NOME'], $_SESSION['id']);
header ("Location: index.php");