<?php

require_once '../../global.php';

$sql = "SELECT supplier_id, supplier_name FROM supplier WHERE is_deleted = 0 ORDER BY supplier_name ASC";
$result = mysqli_query($conn, $sql);
$suppliers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($suppliers, $row);
    }
}

$sql = "SELECT category_id, name FROM category ORDER BY name ASC";
$result = mysqli_query($conn, $sql);
$categories = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($categories, $row);
    }
}

echo $twig->render('add_product.html', array('suppliers' => $suppliers, 'categories' => $categories));

?>
