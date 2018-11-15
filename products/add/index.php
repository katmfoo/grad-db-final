<?php

require_once '../../global.php';
require_once '../../db.php';

$sql = "SELECT supplier_id, supplier_name FROM supplier ORDER BY supplier_name ASC";
$result = mysqli_query($conn, $sql);
$suppliers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($suppliers, $row);
    }
}

echo $twig->render('add_product.html', array('suppliers' => $suppliers));

?>
