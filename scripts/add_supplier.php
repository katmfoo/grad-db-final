<?php

require_once '../global.php';

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

$sql = "SELECT create_supplier('$supplier_name', '$first_name', '$last_name', '$job_title', '$phone_number', '$address', '$city', '$state', '$zip', '$country') as supplier_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $supplier_id = mysqli_fetch_assoc($result)['supplier_id'];
    $_SESSION['flash'] = "Supplier created successfully";
    header("Location: $_ROOT/suppliers/?id=$supplier_id");
    return;
} else {
    echo "Error: $sql <br>".mysqli_error($conn);
    return;
}

?>