<?php

$con = mysqli_connect("localhost", "root", "", "myproject");
if (!$con) {
    die(mysqli_error ($con));
}
?>