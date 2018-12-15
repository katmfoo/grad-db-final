<?php

require_once '../global.php';

$supplier_id = htmlspecialchars($_POST['supplier_id']);
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

$sql = "CALL edit_supplier('$supplier_id', '$supplier_name', '$first_name', '$last_name', '$job_title', '$phone_number', '$address', '$city', '$state', '$zip', '$country')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Supplier edited successfully";
    header("Location: $_ROOT/suppliers/?id=$supplier_id");
    return;
} else {
    echo "Error: $sql <br>".mysqli_error($conn);
    return;
}

?>