<?php

require_once '../global.php';
require_once '../db.php';

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}

$offset = $_ITEMS_PER_PAGE * ($page - 1);

if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
}

$sql = "SELECT * FROM supplier ";
if (isset($search) && $search) { $sql = $sql."WHERE supplier_name LIKE '%".$search."%'"; }
$sql = $sql."ORDER BY supplier_name ASC LIMIT ".$_ITEMS_PER_PAGE." OFFSET ".$offset;
$result = mysqli_query($conn, $sql);
$suppliers = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($suppliers, $row);
    }
}

$vars = array('suppliers' => $suppliers, 'page' => $page, 'page_size' => $_ITEMS_PER_PAGE);
if (isset($search) && $search) { $vars['search'] = $search; }

echo $twig->render('suppliers.html', $vars);

?>
