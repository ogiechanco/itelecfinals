
<?php
    session_start();
    require_once("includes/dbconnect.php");
    require_once("includes/functions.php");

    $uname = cleanText($_POST['txtusername']);
    $pword = sha1($_POST['txtpword']);

    try {
        $sql = "SELECT * from users WHERE username= ? AND pword =?";
        $data = array($uname, $pword);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch();
        $counter = $stmt->rowCount();
        if($counter){
            $_SESSION['userID']=$row[0];
            $_SESSION['username']=$row[3];
            header("location:index.php");
        }else{
            header("location:login.php?try=1");
        }
    } catch (PDOException $th) {
        echo $th->getMessage();
    }

?>