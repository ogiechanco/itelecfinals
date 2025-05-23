<?php
    $comment = NULL;
    if(isset($_GET['try'])){
        $comment = "Incorrect Username or Password ";
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
        <title>Dunkin' Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="">
        <div id="layoutAuthentication" >
            <div id="layoutAuthentication_content" class="d-flex align-items-center justify-content-center" style="background-image: url(images/dunkindonut/loginbg.jpg); background-size: cover;">
                <main style="width: 100%;">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center my-4 loginheader" >Login</h3></div>
                                    <div class="card-body">
                                        <form action="process_login.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtusername" name="txtusername" type="text" placeholder="name@example.com" />
                                                <label for="txtusername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="txtpword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <span style="color:#bf0603;">&nbsp;<?=$comment?></span>
                                                <button class="btn btn-lightblue">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <!-- Footer -->
                <?php include("includes/footer.php");?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
