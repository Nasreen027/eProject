<?php
session_start();
$server = "mysql:host=localhost;dbname=vaccinationbookingsystem";
$user = "root";
$password = "";

$pdo= new PDO($server,$user,$password);

?>