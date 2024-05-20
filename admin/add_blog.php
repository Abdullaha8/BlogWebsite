<?php 
include '../conn.php';
foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn, $value);
}
if (isset($_POST['title'])) {
    $sql = "SELECT max(id) as max FROM blogs";
    $rows = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($rows);
    $id = $row['max'] + 1;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $date = $_POST['day_posted'];
    $description = $_POST['description'];
    $sql = "INSERT INTO blogs VALUES ($id, '$title', '$date', '$description', $author, '$content')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Blog added successfully!');
        window.location.href='blogs.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>