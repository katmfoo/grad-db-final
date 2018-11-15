<?php

require_once '../global.php';
require_once '../db.php';

$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$country = htmlspecialchars($_POST['country']);

$sql = "INSERT INTO address (address, city, state, zip, country) VALUES ('".$address."', '".$city."', '".$state."', '".$zip."', '".$country."')";

if (mysqli_query($conn, $sql)) {
    $address_id = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

$sql = "INSERT INTO customer (first_name, last_name, address_id) VALUES ('".$first_name."', '".$last_name."', '".$address_id."')";

if (mysqli_query($conn, $sql)) {
    $customer_id = mysqli_insert_id($conn);
    $_SESSION['flash'] = "Customer created successfully";
    header('Location: '.$_ROOT.'/customer/?id='.$customer_id.'&source=Local');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>