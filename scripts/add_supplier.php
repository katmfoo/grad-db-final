<?php

require_once '../global.php';
require_once '../db.php';

$supplier_name = htmlspecialchars($_POST['supplier_name']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$job_title = htmlspecialchars($_POST['job_title']);
$phone_number = htmlspecialchars($_POST['phone_number']);
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

$sql = "INSERT INTO supplier (supplier_name, first_name, last_name, job_title, phone_number, address_id) VALUES ('".$supplier_name."', '".$first_name."', '".$last_name."', '".$job_title."', '".$phone_number."', '".$address_id."')";

if (mysqli_query($conn, $sql)) {
    $supplier_id = mysqli_insert_id($conn);
    $_SESSION['flash'] = "Supplier created successfully";
    header('Location: '.$_ROOT.'/supplier/?id='.$supplier_id);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>