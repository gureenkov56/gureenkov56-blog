<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions.php';

$getData = pdo_query();
$result = [];

foreach ($getData as $r) {
    $result[] = $r;
}

echo json_encode($result);

?>