<?php

require_once '../../global.php';

$supplier_id = htmlspecialchars($_GET['id']);

$sql = "SELECT * FROM supplier JOIN address ON supplier.address_id = address.address_id WHERE supplier_id = ".$supplier_id;

$result = mysqli_query($conn, $sql);
$supplier = mysqli_fetch_assoc($result);

echo $twig->render('edit_supplier.html', array('supplier' => $supplier));

?>
