<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'escola';

$conn = new mysqli ($host,$username,$password,$dbname);

if($conn->connect_error){
    die('conexão falhou:' . $conn->connect_error);
}

?>