<?php

require_once '../global.php';

$customer_id = htmlspecialchars($_POST['customer_id']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zip = htmlspecialchars($_POST['zip']);
$country = htmlspecialchars($_POST['country']);

$address_id_subquery_sql = "SELECT address_id FROM customer WHERE customer_id = ".$customer_id;
$sql = "UPDATE address SET address = '".$address."', city = '".$city."', state = '".$state."', zip = '".$zip."', country = '".$country."' WHERE address_id = (".$address_id_subquery_sql.")";

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}
$sql = "UPDATE customer SET first_name = '".$first_name."', last_name = '".$last_name."' WHERE customer_id = ".$customer_id;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Customer edited successfully";
    header('Location: '.$_ROOT.'/customers/?id='.$customer_id.'&seller_id=1');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>