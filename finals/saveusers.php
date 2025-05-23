<?php
require_once("includes/dbconnect.php");

if(isset($_GET['delid'])){
    $delSQL = "DELETE FROM users WHERE md5(userID) = ?";
    $data = array($_GET['delid']);
    try {
        $stmtDel = $con->prepare($delSQL);
        $stmtDel->execute($data);
        header("location: users.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
if(isset($_POST['txtfname'])){
    $fname = $_POST['txtfname'];
    $lname = $_POST['txtlname'];
    $username = $_POST['txtusername'];
    $pword = sha1($_POST['txtpword']);
    $id = $_POST['txtid'];
    try {
        if($id == 0){
            $sql="INSERT INTO users(fname,lname, username, pword) VALUES(?, ?, ?, ?)";
            $data = array($fname, $lname, $username, $pword);

        }else{
            $sql="UPDATE users SET fname = ?, lname = ?, username = ?, pword = ? WHERE md5(userID)= ?";
            $data = array($fname, $lname, $username, $pword, $id);
        }
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        header("location:users.php");

    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
?>