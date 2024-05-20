<?php
if (!isset($_SESSION['admin'])) {
    echo "<a href='login.php'>Log in</a> to continue.";
    exit();
}
?>