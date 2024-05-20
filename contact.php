<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog site - Contact us</title>
    </head>
    <body>
        <!-- Navigation-->
        <?php 
        include 'navbar.html';
        include 'submit-form.php';
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Us</h1>
                            <span class="subheading">Have questions? We have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Fill out the form below to send us a message and we will get back to you as soon as possible!</p>
                        <div class="my-5">
                            <form id="contactForm" method="POST" action="submit-form.php">
                                <div class="form-floating">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" type="tel" name="phone" placeholder="Enter your phone number..." data-sb-validations="required" />
                                    <label for="phone">Phone Number</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                                    <label for="message">Message</label>
                                </div>
                                <br />
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                    </div>
                                </div>
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit" name="contact">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include 'footer.html';
        ?>
    </body>
</html>