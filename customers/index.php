<?php

require_once '../global.php';
require_once '../db.php';

$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);
$customers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($customers, $row);
    }
}

echo $twig->render('customers.html', array('customers' => $customers));

?>
