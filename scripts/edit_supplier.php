<?php

require_once '../global.php';
require_once '../db.php';

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

$address_id_subquery_sql = "SELECT address_id FROM supplier WHERE supplier_id = ".$supplier_id;
$sql = "UPDATE address SET address = '".$address."', city = '".$city."', state = '".$state."', zip = '".$zip."', country = '".$country."' WHERE address_id = (".$address_id_subquery_sql.")";

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}
$sql = "UPDATE supplier SET supplier_name = '".$supplier_name."', first_name = '".$first_name."', last_name = '".$last_name."', job_title = '".$job_title."', phone_number = '".$phone_number."' WHERE supplier_id = ".$supplier_id;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Supplier edited successfully";
    header('Location: '.$_ROOT.'/suppliers/?id='.$supplier_id);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>