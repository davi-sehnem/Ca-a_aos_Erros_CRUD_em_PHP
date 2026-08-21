<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "caça_erros_davi_sehnem";
$conn = new mysqli($host,$user,$pass,$db);
$port = 6608;

if($conn->connect_error){
    die("Erro na conexão");
}