<?php
include 'connect.php';
$id = $_GET['id'];
$query = "DELETE FROM book WHERE id_book=$id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
header('location: index.php');