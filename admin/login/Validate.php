<?php
$ActualPassword = "180506";
if ($_POST["password"] == $ActualPassword) {
    session_start();
    $_SESSION["Authorised"] = "Y";
    header("Location: ../posts.php");
} else {
    header("Location:Wrongpassword.php");
}