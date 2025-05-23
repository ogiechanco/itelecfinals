<?php
$host = "localhost";
$dbase= "dbtest";
$username = "root";
$password ="";
$dsn = "mysql:host={$host};dbname={$dbase}";

try {
    $con =new PDO($dsn, $username, $password);
    if($con){
    }
} catch (PDOException $th) {
    echo "Error: ".$th->getMessage();
}
?>