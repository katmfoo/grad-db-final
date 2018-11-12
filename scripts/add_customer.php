<?php

require_once '../global.php';
require_once '../db.php';

$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);

$sql = "INSERT INTO customer (first_name, last_name) VALUES ('".$first_name."', '".$last_name."')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Customer created successfully";
    header('Location: '.$_ROOT.'/customers/');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>