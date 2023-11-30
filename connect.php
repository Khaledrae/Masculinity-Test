<?php
$con = mysqli_connect("localhost", "root", "", "nguvu_test");
if (!$con) {
    # code...
    die("Connection Error!");
}