<?php 
include '../conn.php';
foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn, $value);
}
if (isset($_POST['add_author'])) {
    $sql = "SELECT max(id) as max FROM authors";
    $rows = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($rows);
    $id = $row['max'] + 1;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO authors VALUES ($id, '$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        header("Location: authors.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>