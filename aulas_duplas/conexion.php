<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_duplas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>