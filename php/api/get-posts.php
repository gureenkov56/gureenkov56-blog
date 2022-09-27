<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

$select = $_GET['select'];
$from = $_GET['from'];
$order_by = $_GET['orderBy'] ?? '';
$order = $_GET['order'] ?? '';
$limit = $_GET['limit'] ?? '';
$where_params = $_GET['params'] ?? [];

$getData = pdo_query($select, $from, $order_by, $order, $limit, $where_params);
$result = [];

foreach ($getData as $r) {
    $result[] = $r;
}

echo json_encode($result);

?>