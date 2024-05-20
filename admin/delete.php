<?php 
include '../conn.php';
if(isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
    $sql = "DELETE FROM authors WHERE id = $author_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: authors.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} 
else if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
    $sql = "DELETE FROM blogs WHERE id = $blog_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: blogs.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else {
    header("Location: authors.php");
}
?>