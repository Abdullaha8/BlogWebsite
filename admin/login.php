<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog site - Admin login</title>
    </head>
    <body>
        <!-- Navigation-->
        <?php 
        include 'navbar.php';
        if (isset($_POST['admin_login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['admin'] = $username;
                header("Location: index.php");
            } else {
                echo "<script>alert('Invalid username or password')</script>";
            }
        }
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>
                                Please login
                            </h2>
                            <span class="subheading">
                                Scroll down to see the login form
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <form id="loginForm" method="POST" action="login.php">
                        <div class="form-floating">
                            <input class="form-control" id="username" name="username" type="text" placeholder="Enter your username..." data-sb-validations="required" />
                            <label for="username">Username</label>
                            <div class="invalid-feedback" data-sb-feedback="username:required">A username is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password..." data-sb-validations="required,password" />
                            <label for="password">Password</label>
                            <div class="invalid-feedback" data-sb-feedback="password:required">Your password is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="password:password">password is not valid.</div>
                        </div>
                        <button class="btn btn-primary text-uppercase disabled my-3" name="admin_login" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
    </body>
</html>