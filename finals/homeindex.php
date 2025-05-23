
<?php require_once("includes/dbconnect.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dunkin'</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="Web_Template/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="Web_Template/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include("includes/homeheader.php");?>
            <!-- Header-->
             
            <header class=" py-5 " style="background-image: url('images/dunkindonut/strip.jpg'); background-size: cover !important; background-position: center;">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Fuel Your Day the Dunkin' Way </h1>
                                <p class="lead fw-normal text-white mb-4">Fresh Coffee, Delicious Donuts, Always On the Go!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-outline-light btn-lg px-4 custom-hover" href="#features">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="images/dunkindonut/homepageimage.png" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h2 class="fw-bolder mb-2 text-bold" style="color: #f5821f;">The Dunkin<span style="color: #f40290;">'</span>  Story</h2>
                            <p style="color: #8f8f8f;">Our success story is your story, too. You've always been part of this delightful journey, and we know that you'll stick around in the coming years.</p>
                            <a href="homeabout.php" class="btn btnlightblue" style="width: 150px;">About Us</a>
                        </div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-globe"></i></div>
                                    <h2 class="h5 h5text">73 Years of Service</h2>
                                    <p class="mb-0" style="color: #8f8f8f;">In 1950, Bill Rosenberg launched Dunkin' in the USA. It went on to become one of the world's biggest coffee and donut shop chains.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-buildings"></i></div>
                                    <h2 class="h5 h5text">42 Years in the Philippines</h2>
                                    <p class="mb-0" style="color: #8f8f8f;">In 1981, Dunkin' reached the Philippine shores and had been delighting Filipinos with iconic treats since then.</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-shop"></i></div>
                                    <h2 class="h5 h5text">700+ Stores Nationwide</h2>
                                    <p class="mb-0" style="color: #8f8f8f;">With over 700 branches across the country, Filipinos can easily get their fix for donuts, coffee, and more...</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-robot"></i></div>
                                    <h2 class="h5 h5text">Commited to Innovation</h2>
                                    <p class="mb-0" style="color: #8f8f8f;">Say hello to Number 1, Dunkin's first-ever service robot that made the brand accessible during the pandemic.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial section-->
            <div class="py-5 bg-light d-flex align-items-center" style="height: 50vh;">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <?php
                                try {
                                    // Adjust the column and table names as needed
                                    $sql = "SELECT quote, author_name, author_title,picture FROM testimonials ORDER BY timestampp DESC LIMIT 1";
                                    $stmt = $con->prepare($sql);
                                    $stmt->execute();
                                    $row = $stmt->fetch();

                                    if ($row) {
                                        $quote = htmlspecialchars($row['quote']);
                                        $author = htmlspecialchars($row['author_name']);
                                        $title = htmlspecialchars($row['author_title']);
                                        $image = htmlspecialchars($row['picture']);

                                        echo "
                                            <div class='fs-4 mb-4 fst-italic'>\"$quote\"</div>
                                            <div class='d-flex align-items-center justify-content-center'>
                                                <img class='rounded-circle me-3' src='uploads/testimonials/{$image}' alt='...' style='width: 40px; height: 40px;'/>
                                                <div class='fw-bold'>
                                                    $author
                                                    <span class='fw-bold text-primary mx-1'>/</span>
                                                    $title
                                                </div>
                                            </div>
                                        ";
                                    } else {
                                        echo "<p class='text-muted'>No testimonial available.</p>";
                                    }
                                } catch (PDOException $e) {
                                    echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="py-5">
                <div class="container px-5 my-5 ">
                    <div class="row gx-5 ">
                        <div class="col-lg-5 mb-5 d-flex align-items-center justify-content-start">
                            <img src="images/dunkindonut/homepageimage1.png" style="height: 440px; width: 550px; " alt="" srcset="">
                        </div>
                        <div class="col-lg-7 mb-5 d-flex flex-column justify-content-center ps-5">
                            <h2 class="h2-menu">DUNKIN<span style="color: #f40290;">' MENU</span></h2>
                            <p class="p-menu">Discover your new favorites that will get you going throughout the day.</p>
                            <a href="pricing.php" class="btn btnprimary">EXLORE MENU</a>
                        </div>
                    </div>
                    <!-- Call to action-->
                
                </div>
            </section>


            
        </main>
        <!-- Footer-->
        <?php include("includes/homefooter.php");?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
