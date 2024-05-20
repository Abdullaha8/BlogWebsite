<?php
include '../conn.php';
foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn, $value);
}
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$blog_id = $_POST['id'];
$date = $_POST['day_posted'];
$description = $_POST['description'];
$sql = "UPDATE blogs SET title = '$title', blog = '$content', author = $author, date = '$date', description = '$description'  WHERE id = $blog_id";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "<script>
    alert('Blog updated successfully!');
    window.location.href='blogs.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>