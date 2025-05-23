<?php
require_once("includes/dbconnect.php");
require_once("includes/functions.php");

if(isset($_POST['txtpname'])){
    $pname = htmlspecialchars($_POST['txtpname']);
    $category = htmlspecialchars($_POST['txtcategory']);
    $id = $_POST['txtid'];
    
    try {
        if($id == 0){
            $sql="INSERT INTO products(pname, category) VALUES(?, ?)";
            $data = array($pname, $category);
        }else{
                $sql="UPDATE products SET pname = ?, category = ? WHERE md5(productID)  = ?";
                $data = array($pname, $category, $id);
        }
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        if($id==0){
            $newName= $con->lastInsertId();
        }else{
            $sqlPic= "SELECT productID FROM products WHERE md5(productID) = ?";
            $dataPic= array($id);
            $stmtpic=$con->prepare($sqlPic);
            $stmtpic->execute($dataPic);
            $rowPic=$stmtpic->fetch();
            $newName=$rowPic[0];
        }
        $filename=$_FILES['picture'];
        if(!(empty($filename['name']))){
            $upload_directory = "uploads/products/";
            uploadOne($filename, $newName, $upload_directory);
        }

        $sqlUpdate= "UPDATE products SET picture=? WHERE productID=?";
        $extName=end(explode(".", $filename['name']));
        $filename="{$newName}.{$extName}";
        $dataUpdate=array($filename,$newName);
        $stmtUpdate=$con->prepare($sqlUpdate);
        $stmtUpdate->execute($dataUpdate);
        header("location:products.php");
        
        
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}



if(isset($_GET['delid'])){
    $delSQL = "DELETE FROM products WHERE md5(productID) = ?";
    $data = array($_GET['delid']);
    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location:products.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


?>