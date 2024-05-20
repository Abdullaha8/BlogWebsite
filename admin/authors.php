<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog site</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.js"></script>
    </head>
    <body>
        <!-- Navigation-->
        <?php 
        include 'navbar.php';
        include '../conn.php';
        $sql = "SELECT * FROM authors";
        $rows = mysqli_query($conn, $sql);
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('../assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>
                                <?php
                                include 'check-session.php';
                                ?>
                                Authors
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container">
            <div class="row justify-content-center m-2 gx-0">
                <div class="col-md-12">
                    <p>
                        Authors &mdash;
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($rows)) {
                                echo '<tr>';
                                echo '<th scope="row">' . $row['id'] . '</th>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td><button data-toggle="modal" data-target="#editModal' . $row['id'] . '" class="btn btn-lg"><i class="fas fa-edit" /></button></td>';
                                echo '<td class="text-center"><a href="delete.php?author_id=' . $row['id'] . '"><i class="fas fa-trash-alt" /></a></td>';
                                echo '</tr>';
                                echo '
                                <div class="modal fade" id="editModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="editModalLabel' . $row['id'] . '" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel' . $row['id'] . '">Edit author</h5>
                                                <button type="button" class="close btn btn-close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="edit-author.php" method="POST">
                                                    <div class="form-group my-2">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="' . $row['name'] . '">
                                                    </div>
                                                    <div class="form-group my-2">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="' . $row['email'] . '">
                                                    </div>
                                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                                    <button type="submit" class="btn btn-primary my-2" name="edit_author">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mb-4">
                        <button  data-toggle="modal" data-target="#addAuthorModal" class="btn btn-primary text-uppercase">Add Author →</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->
        <!-- Add author modal -->
        <div class="modal fade" id="addAuthorModal" tabindex="-1" role="dialog" aria-labelledby="addAuthorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAuthorModalLabel">Add author</h5>
                        <button type="button" class="close btn btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="add-author.php" method="POST">
                            <div class="form-group my-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary my-2" name="add_author">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
