<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
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
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class=" rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <!--<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>-->
                            <h1 class="fw-bolder h5text">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <form id="contactForm" action="savemessage.php" method="POST" data-sb-form-api-token="API_TOKEN">
                                    <!-- Name input-->
                                    
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="txtname" placeholder="Enter your name..." data-sb-validations="required" required/>
                                                <label for="name">Full name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                        </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" name="txtemail" placeholder="name@example.com" data-sb-validations="required, email" required/>
                                        <label for="email">Email address</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="phone" name="txtpnum" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" required/>
                                        <label for="phone">Contact number</label>
                                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" name="txtmessage" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required" required></textarea>
                                        <label for="message">Enter your message here</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                     <div class="d-grid"><button class="btn btn-lg btnlightblue" type="submit">Submit</button></div>
                                    <!--<div class="d-grid"><button class="btn btn-warning btn-lg disabled" id="submitButton" type="submit">Submit</button></div>-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Contact cards-->
                    <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                        <div class="col">
                            <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-geo-alt" ></i></div>
                            <div class="h5 mb-2 h5text">Address</div>
                            <p class="text-muted mb-0">GDI Bldg. Reliance cor. Sheridan Sts. Highway Hills, Mandaluyong City</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope "></i></div>
                            <div class="h5 h5text">Email Us</div>
                            <p class="text-muted mb-0">dunkindonut@gmail.com</p>
                        </div>
                        <div class="col ">
                            <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-info-circle"></i></div>
                            <div class="h5 h5text">Social Media</div>
                            <div class="d-flex gap-3 ps-3">
                                <a href="https://facebook.com" target="_blank" class="socmedhover fs-4"><i class="bi bi-facebook" ></i></a>
                                <a href="https://twitter.com" target="_blank" class="socmedhover fs-4"><i class="bi bi-twitter" ></i></a>
                                <a href="https://instagram.com" target="_blank" class="socmedhover fs-4"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="feature bg-magenta bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                            <div class="h5 h5text">Call us</div>
                            <p class="text-muted mb-0">Call us during normal business hours at (+63) 9323198981.</p>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
