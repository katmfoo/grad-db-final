<?php

require_once '../global.php';

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$offset = $_ITEMS_PER_PAGE * ($page - 1);

if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
}

/* Selects all customers that either have not placed an order at all (appears on the top of the list) or
   customers that haven't placed an order in over a month, with customers having not placed an order for longer
   appearing first */

$sql = "SELECT *, (
	        SELECT creation_datetime FROM richealp7.order WHERE customer_id = customer.customer_id AND customer_seller_id = 1 ORDER BY creation_datetime DESC LIMIT 1
        ) as last_order_date FROM richealp7.customer WHERE is_deleted = 0 ";
if (isset($search) && $search) { $sql = $sql."AND CONCAT(first_name, ' ', last_name) LIKE '%".$search."%' "; }
$sql = $sql."HAVING last_order_date < DATE_SUB(NOW(), INTERVAL 1 MONTH) OR last_order_date IS NULL ORDER BY last_order_date ASC, creation_datetime ASC LIMIT ".$_ITEMS_PER_PAGE." OFFSET ".$offset;
$result = mysqli_query($conn, $sql);
$customers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($customers, $row);
    }
}

$vars = array('customers' => $customers, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
if (isset($search) && $search) { $vars['search'] = $search; }

echo $twig->render('customers_not_active.html', $vars);

?>
