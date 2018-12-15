<?php

require_once '../global.php';

$supplier_id = htmlspecialchars($_GET['id']);

$sql = "CALL delete_supplier($supplier_id)";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Supplier deleted successfully";
    header("Location: $_ROOT/suppliers/");
    return;
}

echo "Error: $sql <br>".mysqli_error($conn);

?>