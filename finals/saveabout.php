<?php
require_once("includes/dbconnect.php");



if(isset($_GET['udid'])){
    $id = $_GET['udid'];
    $title = $_POST['txttitle'];
    $content = $_POST['txtcontent'];
    #echo "{$title} - {$content}";
    try {
        $sql="UPDATE about SET atitle = ?, acontent = ? WHERE md5(aboutID) = ?";
        $data = array($title, $content, $id);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        header("location:about.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}

if(isset($_GET['delid'])){
    $delSQL = "DELETE FROM about WHERE md5(aboutID) = ?";
    $data = array($_GET['delid']);
    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location: about.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
if(isset($_POST['txttitle'])){
    $title = $_POST['txttitle'] ?? '';
    $content = $_POST['txtcontent'] ?? '';
    $id = $_POST['txtid'] ?? null;
    #echo "{$title} - {$content}";
    try {
        if($id == 0){
            $sql="INSERT INTO about(atitle, acontent) VALUES(?, ?)";
            $data = array($title, $content);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            header("location:about.php");
            exit;
        }else{
            $title = $_POST['txttitle'];
            $content = $_POST['txtcontent'];
            #echo "{$title} - {$content}";
                $sql="UPDATE about SET atitle = ?, acontent = ? WHERE md5(aboutID)  = ?";
                $data = array($title, $content, $id);
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
                header("location:about.php");
                exit;
        }
        
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
?>