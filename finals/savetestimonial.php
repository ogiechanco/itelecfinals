<?php
require_once("includes/dbconnect.php");
require_once("includes/functions.php");

if(isset($_POST['txtauthor'])){
    $author = htmlspecialchars($_POST['txtauthor']);
    $position = htmlspecialchars($_POST['txtposition']);
    $id = $_POST['txtid'];
    $quote = htmlspecialchars($_POST['txtquote']);
    
    try {
        if($id == 0){
            $sql="INSERT INTO testimonials(author_name, author_title, quote) VALUES(?, ?, ?)";
            $data = array($author, $position, $quote);
        }else{
                $sql="UPDATE testimonials SET author_name = ?, author_title = ?, quote = ? WHERE md5(testimonialID)= ?";
                $data = array($author, $position, $quote, $id);
        }
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        if($id==0){
            $newName= $con->lastInsertId();
        }else{
            $sqlPic= "SELECT testimonialID FROM testimonials WHERE md5(testimonialID) = ?";
            $dataPic= array($id);
            $stmtpic=$con->prepare($sqlPic);
            $stmtpic->execute($dataPic);
            $rowPic=$stmtpic->fetch();
            $newName=$rowPic[0];
        }
        $filename=$_FILES['picture'];
        if(!(empty($filename['name']))){
            $upload_directory = "uploads/testimonials/";
            uploadOne($filename, $newName, $upload_directory);
        }

        $sqlUpdate= "UPDATE testimonials SET picture=? WHERE testimonialID=?";
        $extName=end(explode(".", $filename['name']));
        $filename="{$newName}.{$extName}";
        $dataUpdate=array($filename,$newName);
        $stmtUpdate=$con->prepare($sqlUpdate);
        $stmtUpdate->execute($dataUpdate);
        header("location:testimonial.php");
        
        
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}



if(isset($_GET['delid'])){
    $delSQL = "DELETE FROM testimonials WHERE md5(testimonialID) = ?";
    $data = array($_GET['delid']);
    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location:testimonial.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


?>