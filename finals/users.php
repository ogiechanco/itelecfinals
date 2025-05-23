<?php
    session_start();
    require_once("includes/dbconnect.php");
    if(!(isset($_SESSION['userID']))){
        header("location:login.php");
    }
    $id = 0;
    $fname = NULL;
    $lname = NULL;
    $username = NULL;
    $pword = NULL;
    if(isset($_GET['udid'])){
        $id = $_GET['udid'];
        try {
            $sqlLoad = "SELECT userID, fname, lname, username, pword, md5(userID) FROM users WHERE md5(userID) = ?";
            $dataLoad = array($id);
            $stmtLoad = $con->prepare($sqlLoad);
            $stmtLoad->execute($dataLoad);
            if($stmtLoad->rowCount()!= 0){
                $rowLoad = $stmtLoad->fetch();
                $fname = $rowLoad[1];
                $lname = $rowLoad[2];
                $username = $rowLoad[3];
                $pword = $rowLoad[4];
            }
            
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dunkin' Users</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Header -->
         <?php include("includes/header.php");?>
            <!-- Side Navbar -->
            <?php include("includes/menu.php");?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                This table shows the record of users.</br></br>
                                <a href="" class="btn colororange">Add New Record</a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-records-tab" data-bs-toggle="tab" data-bs-target="#newstable" type="button" role="tab" aria-controls="abouttable" aria-selected="true">Records</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-DE-tab" data-bs-toggle="tab" data-bs-target="#newsDE" type="button" role="tab" aria-controls="aboutDE" aria-selected="false">Data Entry</button>
                            </li>
                        </ul>
                        

                        <div class="tab-content" id="nav-tabContent">
                            <div class="card mb-4 tab-pane fade show active p-5"  id="newstable" aria-labelledby="nav-records-tab" role="tabpanel" tabindex="0">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    DataTable Example
                                </div>
                                
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Fullname</th>
                                                <th>Username</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Fullname</th>
                                                <th>Username</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            
                                                try {
                                                    $sqlnews="SELECT userID, CONCAT(fname, ' ', lname) as fname, username, md5(userID) FROM users";
                                                    $stmtabout=$con->prepare($sqlnews);
                                                    $stmtabout->execute();
                                                    $strtable="";
                                                    while($row= $stmtabout->fetch()){
                                                        $strtable.="<tr>";
                                                        $strtable.="<td>{$row[0]}</td>";
                                                        $strtable.="<td>{$row[1]}</td>";
                                                        $strtable.="<td>{$row[2]}</td>";
                                                        
                                                        $strDelButton="<button class='btn btn-danger'>
                                                                        <a href='saveusers.php?delid={$row[3]}'>
                                                                        <i class='bx bxs-trash' style='color:#000'></i>
                                                                        </a>
                                                                        </button>";
                                                        $strUpdateButton="<button class='btn btn-warning'>
                                                                        <a href='users.php?udid={$row[3]}'>
                                                                        <i class='bx bxs-edit-alt' style='color:#000'></i>
                                                                        </a>
                                                                        </button>";
                                                        $strtable.="<td><div style ='white-space:nowrap'> {$strUpdateButton} {$strDelButton} </div></td>";
                                                        $strtable.="</tr>";
                                                    }
                                                    echo $strtable;
                                                } catch (PDOException $th) {
                                                    echo $th->getmessage();
                                                }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class=" mb-4 p-5 tab-pane fade" id="newsDE" role="tabpanel" aria-labelledby="nav-DE-tab" tabindex="0">
                                <h1>Data Entry:</h1>
                                    <div class="data-entry">
                                    <div class="mb-3">
                                        <form action="saveusers.php" method="POST">

                                            <input type="hidden" name="txtid" value="<?=$id?>" />
                                            
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                <label for="txtfname" class="form-label">First Name :</label>
                                                <input type="text" class="form-control" name="txtfname" value ="<?=$fname?>" id="exampleFormControlInput1" placeholder="" required>
                                                </div>
                                                <div class="col-6">
                                                <label for="txtlname" class="form-label">Last Name :</label>
                                                <input type="text" class="form-control" name="txtlname" value ="<?=$lname?>" id="exampleFormControlInput1" placeholder="" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="txtusername" class="form-label">Username :</label>
                                                <input type="text" class="form-control" name="txtusername" value ="<?=$username?>" id="exampleFormControlInput1" placeholder="" required>
                                                </div>
                                                <div class="col-6">
                                                <label for="txtpword" class="form-label">Password :</label>
                                                <input type="password" class="form-control" name="txtpword" id="exampleFormControlInput1" placeholder="" value ="<?=$pword?>" required>
                                                </div>
                                            </div>
                                
                                            <button class="btn btn-primary">Submit</button>
                                        </form>
                                                     
                                    </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </main>
                <!-- Footer -->
                 <?php include("includes/footer.php")?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
