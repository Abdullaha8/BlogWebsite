<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog site</title>
    </head>
    <body>
        <!-- Navigation-->
        <?php 
        include 'navbar.php';
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>
                                <?php
                                include 'check-session.php';
                                ?>
                                Hello admin
                            </h2>
                            <span class="subheading">
                                Use the navigation bar to navigate to other pages
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                
            </div>
        </div>
        <!-- Footer-->
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
