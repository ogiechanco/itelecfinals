<?php
require_once("includes/dbconnect.php");
require_once("includes/functions.php");



if(isset($_POST['txtname'])){
    
    $name = cleanText($_POST['txtname']);
    $email = cleanText($_POST['txtemail']);
    $cpnum = cleanText($_POST['txtpnum']);
    $message = cleanText($_POST['txtmessage']);
    $id = $_POST['txtid'] ?? null;
    try {
        if($id == 0){
            $sql="INSERT INTO messages(fname,email, cpnum, msg) VALUES(?,?,?,?)";
            $data = array($name, $email, $cpnum, $message);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            header("location:contact.php");
            exit;
        }
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
?>