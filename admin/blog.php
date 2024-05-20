<?php 
include '../conn.php';
$operation = $_GET['operation'];
if ($operation == 'edit') {
    $id = $_GET['blog'];
    $sql = "SELECT * FROM blogs, authors WHERE blogs.author = authors.id AND blogs.id = $id";
    $rows = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($rows);
    $title = $row['title'];
    $page_title = "Edit - $title";
    $description = $row['description'];
    $content = $row['blog'];
    $author = $row['author'];
    $author_name = $row['name'];
    $day_posted = $row['date'];
    $action = "edit_blog.php";
}
else if ($operation == 'add') {
    $title = '';
    $page_title = "Add Blog";
    $description = '';
    $content = '';
    $author = '';
    $author_name = '';
    $day_posted = '';
    $action = "add_blog.php";
}
else {
    header("Location: blogs.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            <?php 
            echo $page_title;
            ?>
        </title>
        <?php session_start(); ?>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <style>
            .nav-link1 {
                font-size: 1.2em !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../index.php">
                    Blog site
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 nav-link1" href="authors.php">Manage author</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 nav-link1" href="blogs.php">Manage blogs</a></li>
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 nav-link1" href="logout.php">Logout</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>
                                <?php 
                                echo $page_title;
                                ?>
                            </h1>
                            <span class="subheading">
                                <?php 
                                echo $description;
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row justify-content-center m-2 gx-0">
                <div class="col-md-12">
                    <form action="<?php echo $action; ?>" method="POST">
                        <div class="form-group my-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="Title" required>
                        </div>
                        <div class="form-group my-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>" placeholder="Description" required>
                        </div>
                        <div class="form-group my-3">
                            <label for="summernote">Content</label>
                            <textarea id="summernote" name="content" rows="3" placeholder="Content" required><?php echo $content; ?></textarea>
                        </div>
                        <div class="form-group my-3">
                            <label for="author">Author</label>
                            <select class="form-control" id="author" name="author" required>
                                <?php
                                $sql = "SELECT * FROM authors";
                                $rows = mysqli_query($conn, $sql);
                                if ($operation == 'edit') {
                                    echo "<option value='$author' selected>$author_name</option>";
                                } else {
                                    echo "<option value='' selected disabled>Select author</option>";
                                }
                                while ($row = mysqli_fetch_assoc($rows)) {
                                    if ($row['id'] != $author) {
                                        $name = $row['name'];
                                        echo "<option value='$row[id]'>$name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="day_posted">Day Posted</label>
                            <input type="text" class="form-control" id="day_posted" name="day_posted" value="<?php echo $day_posted; ?>" placeholder="Day Posted" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
</html>