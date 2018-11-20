<?php

require_once '../global.php';

$customer_id = htmlspecialchars($_GET['id']);

$sql = "UPDATE customer SET is_deleted = 1 WHERE customer_id = ".$customer_id;

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash'] = "Customer deleted successfully";
    header('Location: '.$_ROOT.'/customers/');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return;
}

?>