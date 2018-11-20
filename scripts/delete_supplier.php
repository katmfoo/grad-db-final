<?php

require_once '../global.php';

$supplier_id = htmlspecialchars($_GET['id']);

$sql = "UPDATE supplier SET is_deleted = 1 WHERE supplier_id = ".$supplier_id;

if (mysqli_query($conn, $sql)) {

    $sql = "UPDATE product SET is_deleted = 1 WHERE supplier_id = ".$supplier_id;
    if (mysqli_query($conn, $sql)) {
        $_SESSION['flash'] = "Supplier deleted successfully";
        header('Location: '.$_ROOT.'/suppliers/');
        return;
    }
}

echo "Error: " . $sql . "<br>" . mysqli_error($conn);

?>