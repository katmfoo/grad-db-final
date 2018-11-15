<?php

require_once '../global.php';
require_once '../db.php';

$supplier_id = htmlspecialchars($_GET['id']);

$sql = "DELETE FROM supplier WHERE supplier_id = ".$supplier_id;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Supplier deleted successfully";
    header('Location: '.$_ROOT.'/suppliers/');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>