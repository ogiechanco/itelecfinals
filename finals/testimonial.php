<?php
    session_start();
    require_once("includes/dbconnect.php");
    if(!(isset($_SESSION['userID']))){
        header("location:login.php");
    }
    if(isset($_GET['udid'])){
        $id = $_GET['udid'];
        try {
            $sqlLoad = "SELECT testimonialID, quote, author_name, author_title, picture, md5(testimonialID) FROM testimonials WHERE md5(testimonialID) = ?"  ;
            $dataLoad = array($id);
            $stmtLoad = $con->prepare($sqlLoad);
            $stmtLoad->execute($dataLoad);
            if($stmtLoad->rowCount()!= 0){
                $rowLoad = $stmtLoad->fetch();
                $quote = $rowLoad[1];
                $author = $rowLoad[2];
                $position = $rowLoad[3];
                $picture = $rowLoad[4];
            }
            
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    else {
        $id = 0;
        $quote ="";
        $author = "";
        $position = "";
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
        <title>Dunkin' Testimonial</title>
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
                        <h1 class="mt-4">Testimonial</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Testimonial</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                This table shows the record of testimonials.</br></br>
                                <a href="testimonial.php#newsDE" class="btn colororange">Add New Record</a>
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
                                                <th>ID</th>
                                                <th>Quote</th>
                                                <th>Author</th>
                                                <th>Position</th>
                                                <th>Picture</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Quote</th>
                                                <th>Author</th>
                                                <th>Position</th>
                                                <th>Picture</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            
                                                try {
                                                    $sqlnprod="SELECT testimonialID, quote, author_name, author_title, picture, md5(testimonialID) FROM testimonials";
                                                    $stmtabout=$con->prepare($sqlnprod);
                                                    $stmtabout->execute();
                                                    $strtable="";
                                                    while($row= $stmtabout->fetch()){
                                                        $strtable.="<tr>";
                                                        $strtable.="<td>{$row[0]}</td>";
                                                        $strtable.="<td>{$row[1]}</td>";
                                                        $strtable.="<td>{$row[2]}</td>";
                                                        $strtable.="<td>{$row[3]}</td>";
                                                        $pic = strlen($row[4]) <= 2 ? 'nopic.jpg' : $row[4];
                                                        $strtable .= "<td><img src='uploads/testimonials/{$pic}' alt='Image' width='100' height='100'></td>";
                                                        
                                                        $strDelButton="<button class='btn btn-danger'>
                                                                        <a href='savetestimonial.php?delid={$row[5]}'>
                                                                        <i class='bx bxs-trash' style='color:#000'></i>
                                                                        </a>
                                                                        </button>";
                                                        $strUpdateButton="<button class='btn btn-warning'>
                                                                        <a href='testimonial.php?udid={$row[5]}'>
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
                                        <form action="savetestimonial.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                <input type="hidden" name="txtid" value="<?=$id?>" />
                                                <label for="exampleFormControlInput1" class="form-label">Author:</label>
                                                <input type="text" class="form-control" name="txtauthor" value ="<?=$author?>" id="exampleFormControlInput1" placeholder="">
                                                </div>
                                                <div class="col-6 mb-3">
                                                <input type="hidden" name="txtid" value="<?=$id?>" />
                                                <label for="exampleFormControlInput1" class="form-label">Position:</label>
                                                <input type="text" class="form-control" name="txtposition" value ="<?=$position?>" id="exampleFormControlInput1" placeholder="">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Quote:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="txtquote" rows="5" required><?=$quote?></textarea>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Picture:</label>
                                                <input type="file" class="form-control" name="picture" accept ="image/*" id="exampleFormControlInput1" >
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
