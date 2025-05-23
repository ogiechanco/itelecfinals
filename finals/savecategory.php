<?php
require_once("includes/dbconnect.php");
require_once("includes/functions.php");



if(isset($_POST['txtcategory'])){
    
    $category = cleanText($_POST['txtcategory']);
    $id = $_POST['txtid'] ?? null;
    try {
        if($id == 0){
            $sql="INSERT INTO category(cname) VALUES(?)";
            $data = array($category);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            header("location:category.php");
            exit;
        }
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
?>