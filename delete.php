<?php
include 'connect.php';
$id = $_GET['id'];
$table = 'book';
$query = "DELETE FROM $table WHERE id_book=$id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
header('location: index.php');