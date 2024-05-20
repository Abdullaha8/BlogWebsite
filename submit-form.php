<?php 
if (isset($_POST['contact'])) {
    $toemail = "co2019.sakshi.kirmathe@ves.ac.in";
    $subject = "New message from contact form - blog site";
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_phone = $_POST['phone'];
    $message = $_POST['message'];
    $html = "
    <html>
    <head>
    <title>New message from contact form - blog site</title>
    </head>
    <body>
    <p>Name: $sender_name</p>
    <p>Email: $sender_email</p>
    <p>Phone: $sender_phone</p>
    <p>Message: $message</p>
    </body>
    </html>
    ";
    $headers = "From: " . $sender_name . " <" . $sender_email . ">\r\n";
    $headers .= "Reply-To: " . $sender_name . " <" . $sender_email . ">\r\n";
    $headers .= "Return-Path: " . $sender_name . " <" . $sender_email . ">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    if (mail($toemail, $subject, $html, $headers)) {
        echo "<script>alert('Your message has been received by us! We will get back to you ASAP.');</script>";
        header("Location: index.php");
    } else {
        echo "<script>document.getElementById('submitErrorMessage').classList.remove('d-none');</script>";
        header("Location: index.php");
    }
}
?>