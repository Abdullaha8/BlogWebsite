<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog site</title>
    </head>
    <body>
        <!-- Navigation-->
        <?php 
        include 'navbar.html';
        include 'conn.php';
        $sql = "SELECT * FROM blogs, authors WHERE blogs.author = authors.id LIMIT 3";
        $rows = mysqli_query($conn, $sql);
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Blog site</h1>
                            <span class="subheading">
                                Read what you love
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
                    <p>
                        Featured posts &mdash;
                    </p>
                    <?php
                    while($row = mysqli_fetch_assoc($rows)) {
                        echo '
                        <div class="post-preview">
                            <a href="post.php?blog=' . $row['id'] . '">
                                <h2 class="post-title">' . $row['title'] . '</h2>
                                <h3 class="post-subtitle">'. $row['description'] .'</h3>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="#!"> ' . $row['name'] . ' </a>
                                on ' . $row['date'] . '
                            </p>
                        </div>
                        ';
                    } 
                    ?>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="posts.php">All Posts →</a></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php
        include 'footer.html';
        ?>
    </body>
</html>
