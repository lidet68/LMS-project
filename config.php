<?php
$conn = mysqli_connect('localhost', 'root', '', 'laboratory');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}