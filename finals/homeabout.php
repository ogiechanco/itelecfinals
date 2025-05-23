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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="Web_Template/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include("includes/homeheader.php");?>
            <!-- Header-->
            <header class="py-5 d-flex align-items-center justify-content-center" style="background-image: url('images/dunkindonut/strip.jpg'); background-size: cover !important; background-position: center; height:70vh;" >
                <div class="container px-5" >
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                <h1 class="fw-bolder text-white mb-3">Our Story</h1>
                                <p class="lead fw-normal text-white mb-4">Dunkin’ brings indulgence to everybody’s day with its signature donuts, coffee, baked goods, and more.</p>
                                <a class="btn btn-outline-light btn-lg px-4 custom-hover" href="#scroll-target"  >EXPLORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About section one-->
            <section class="py-5" id="scroll-target">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="images/dunkindonut/aboutusimage.jpg" style="height: 400px; width: 600px;" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Our founding</h2>
                            <p class="lead fw-normal text-muted mb-0">Dunkin' Donuts was born! Established by William Rosenberg in Massachusetts, USA, his aim was to serve "the freshest, most delicious coffee and donuts quickly and courteously in modern merchandised store." To this day, this remains true in every store</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About section two-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="images/dunkindonut/aboutimage1.jpg" style="height: 400px; width: 600px;" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Growth &amp; beyond</h2>
                            <p class="lead fw-normal text-muted mb-0">The Donut Chain
                                With over 13,000 stores, Dunkin' is today's largest donut chain in the world. Change of Name
                                As the brand continues to grow, it has shifted its name from Dunkin' Donuts to just Dunkin'. This big move powers the brand to give focus to its full range of offerings other than donuts, which include beverages and savory treats.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Team members section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder">Our team</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="images/dunkindonut/aboutceo.jpg" style="width: 200px; height: 150px;" alt="..." />
                                <h5 class="fw-bolder">David Hoffmann</h5>
                                <div class="fst-italic text-muted">Founder &amp; CEO</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="images/dunkindonut/aboutcfo.png" style="width: 200px; height: 150px;" alt="..." />
                                <h5 class="fw-bolder">Kate Japson</h5>
                                <div class="fst-italic text-muted">CFO</div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="images/dunkindonut/aboutcio.jpg" style="width: 200px; height: 150px;" alt="..." />
                                <h5 class="fw-bolder">Malvina Cilla</h5>
                                <div class="fst-italic text-muted">CIO</div>
                            </div>
                        </div>
                    </div>
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
