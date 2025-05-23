
<?php
    require_once("includes/dbconnect.php");
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dunkin’</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="Web_Template/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="Web_Template/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include("includes/homeheader.php");?>

            <section class="bg-light py-5">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bolder h5text">Products</h1>
        </div>
        <div>
            <?php
            try {
                $sqlnprod = "SELECT productID, pname, cname, picture, md5(productID) FROM vwproducts WHERE cname = 'Beverages'";
                $stmtabout = $con->prepare($sqlnprod);
                $stmtabout->execute();

                // Check if any rows were returned
                if ($stmtabout->rowCount() > 0) {
                    echo '<h2 class="py-3 fw-bolder text-magenta">Beverages</h2>';
                    echo '<div class="row gx-5 justify-content-center">';
                    
                    while ($row = $stmtabout->fetch()) {
                        $pic = strlen($row[3]) <= 2 ? 'nopic.png' : $row[3];
                        $imagePath = "uploads/products/" . htmlspecialchars($pic);
                        $productName = htmlspecialchars($row[1]);

                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 shadow border-0 card-product">
                                <img class="card-img-top" src="' . $imagePath . '" alt="' . $productName . '" style="height: 200px; object-fit: cover;" />
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title mb-3">' . $productName . '</h5>
                                </div>
                            </div>
                        </div>';
                    }

                    echo '</div>'; // close .row
                }

            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>

        <div>
            <?php
            try {
                $sqlnprod = "SELECT productID, pname, cname, picture, md5(productID) FROM vwproducts WHERE cname = 'Donuts'";
                $stmtabout = $con->prepare($sqlnprod);
                $stmtabout->execute();

                // Check if any rows were returned
                if ($stmtabout->rowCount() > 0) {
                    echo '<h2 class="py-3 fw-bolder text-magenta">Donuts</h2>';
                    echo '<div class="row gx-5 justify-content-center">';
                    
                    while ($row = $stmtabout->fetch()) {
                        $pic = strlen($row[3]) <= 2 ? 'nopic.png' : $row[3];
                        $imagePath = "uploads/products/" . htmlspecialchars($pic);
                        $productName = htmlspecialchars($row[1]);

                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 shadow border-0 card-product">
                                <img class="card-img-top" src="' . $imagePath . '" alt="' . $productName . '" style="height: 200px; object-fit: cover;" />
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title mb-3">' . $productName . '</h5>
                                </div>
                            </div>
                        </div>';
                    }

                    echo '</div>'; // close .row
                }

            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>

        <div>
            <?php
            try {
                $sqlnprod = "SELECT productID, pname, cname, picture, md5(productID) FROM vwproducts WHERE cname = 'Bundles'";
                $stmtabout = $con->prepare($sqlnprod);
                $stmtabout->execute();

                // Check if any rows were returned
                if ($stmtabout->rowCount() > 0) {
                    echo '<h2 class="py-3 fw-bolder text-magenta">Bundles</h2>';
                    echo '<div class="row gx-5 justify-content-center">';
                    
                    while ($row = $stmtabout->fetch()) {
                        $pic = strlen($row[3]) <= 2 ? 'nopic.png' : $row[3];
                        $imagePath = "uploads/products/" . htmlspecialchars($pic);
                        $productName = htmlspecialchars($row[1]);

                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 shadow border-0 card-product">
                                <img class="card-img-top" src="' . $imagePath . '" alt="' . $productName . '" style="height: 200px; object-fit: cover;" />
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title mb-3">' . $productName . '</h5>
                                </div>
                            </div>
                        </div>';
                    }

                    echo '</div>'; // close .row
                }

            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>

        <div>
            <?php
            try {
                $sqlnprod = "SELECT productID, pname, cname, picture, md5(productID) FROM vwproducts WHERE cname = 'Savory & Bakery'";
                $stmtabout = $con->prepare($sqlnprod);
                $stmtabout->execute();

                // Check if any rows were returned
                if ($stmtabout->rowCount() > 0) {
                    echo '<h2 class="py-3 fw-bolder text-magenta">Savory & Bakery</h2>';
                    echo '<div class="row gx-5 justify-content-center">';
                    
                    while ($row = $stmtabout->fetch()) {
                        $pic = strlen($row[3]) <= 2 ? 'nopic.png' : $row[3];
                        $imagePath = "uploads/products/" . htmlspecialchars($pic);
                        $productName = htmlspecialchars($row[1]);

                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 shadow border-0 card-product">
                                <img class="card-img-top" src="' . $imagePath . '" alt="' . $productName . '" style="height: 200px; object-fit: cover;" />
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title mb-3">' . $productName . '</h5>
                                </div>
                            </div>
                        </div>';
                    }

                    echo '</div>'; // close .row
                }

            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>

        <div>
            <?php
            try {
                $sqlnprod = "SELECT productID, pname, cname, picture, md5(productID) FROM vwproducts WHERE cname = 'Combos & Sharables'";
                $stmtabout = $con->prepare($sqlnprod);
                $stmtabout->execute();

                // Check if any rows were returned
                if ($stmtabout->rowCount() > 0) {
                    echo '<h2 class="py-3 fw-bolder text-magenta">Combos & Sharables</h2>';
                    echo '<div class="row gx-5 justify-content-center">';
                    
                    while ($row = $stmtabout->fetch()) {
                        $pic = strlen($row[3]) <= 2 ? 'nopic.png' : $row[3];
                        $imagePath = "uploads/products/" . htmlspecialchars($pic);
                        $productName = htmlspecialchars($row[1]);

                        echo '
                        <div class="col-md-4 mb-5">
                            <div class="card h-100 shadow border-0 card-product">
                                <img class="card-img-top" src="' . $imagePath . '" alt="' . $productName . '" style="height: 200px; object-fit: cover;" />
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title mb-3">' . $productName . '</h5>
                                </div>
                            </div>
                        </div>';
                    }

                    echo '</div>'; // close .row
                }

            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>

    </div>
</section>


            <!-- Pricing section-->
            
        </main>
        <!-- Footer-->
        <?php include("includes/homefooter.php");?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
