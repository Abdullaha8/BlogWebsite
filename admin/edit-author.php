<?php 
include '../conn.php';
if (isset($_POST['edit_author'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE authors SET name = '$name', email = '$email' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: authors.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>