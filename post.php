<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog site - </title>
    </head>
    <body>
        <!-- Navigation-->
        <?php 
        include 'navbar.html';
        include 'conn.php';
        if (isset($_GET['blog'])) {
            $id = $_GET['blog'];
            $sql = "SELECT * FROM blogs, authors WHERE blogs.author = authors.id AND blogs.id = $id";
            $rows = mysqli_query($conn, $sql);
            $blog = mysqli_fetch_assoc($rows);
        } else {
            header("Location: index.php");
        }
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $blog['title']; ?></h1>
                            <h2 class="subheading"><?php echo $blog['description']; ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $blog['name']; ?></a>
                                on <?php echo $blog['date']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo $blog['blog']; ?></p>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <?php
        include 'footer.html';
        ?>
    </body>
</html>
