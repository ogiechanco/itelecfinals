<?php
require_once("includes/dbconnect.php");
require_once("includes/functions.php");

if(isset($_POST['txttitle'])){
    $title = htmlspecialchars($_POST['txttitle']);
    $author = htmlspecialchars($_POST['txtauthor']);
    $id = $_POST['txtid'];
    $dposted = htmlspecialchars($_POST['dposted']);
    $story = htmlspecialchars($_POST['txtstory']);
    
    try {
        if($id == 0){
            $sql="INSERT INTO news(title, author, datePosted, story) VALUES(?, ?, ?, ?)";
            $data = array($title, $author, $dposted, $story);
        }else{
                $sql="UPDATE news SET title = ?, author = ?, datePosted = ?, story = ? WHERE md5(newsID)  = ?";
                $data = array($title, $author, $dposted, $story, $id);
        }
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        if($id==0){
            $newName= $con->lastInsertId();
        }else{
            $sqlPic= "SELECT newsID FROM news WHERE md5(newsID) = ?";
            $dataPic= array($id);
            $stmtpic=$con->prepare($sqlPic);
            $stmtpic->execute($dataPic);
            $rowPic=$stmtpic->fetch();
            $newName=$rowPic[0];
        }
        $filename=$_FILES['picture'];
        if(!(empty($filename['name']))){
            $upload_directory = "uploads/news/";
            uploadOne($filename, $newName, $upload_directory);
        }

        $sqlUpdate= "UPDATE news SET picture=? WHERE newsID=?";
        $extName=end(explode(".", $filename['name']));
        $filename="{$newName}.{$extName}";
        $dataUpdate=array($filename,$newName);
        $stmtUpdate=$con->prepare($sqlUpdate);
        $stmtUpdate->execute($dataUpdate);
        header("location:news.php");
        
        
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}



if(isset($_GET['delid'])){
    $delSQL = "DELETE FROM news WHERE md5(newsID) = ?";
    $data = array($_GET['delid']);
    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location:news.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}


?>