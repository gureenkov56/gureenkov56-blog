<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/config.php";

function pre($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

// for getting one or some string WITHOUT ARGUMENTS
function pdo_query($select = '*', $from = 'posts', $order_by = '', $order = '', $limit = '') {
    $query_string = "SELECT $select FROM $from";
    if ($order_by) $query_string .= " ORDER BY $order_by";
    if ($order) $query_string .= " $order";
    if ($limit) $query_string .= " LIMIT $limit";

    global $pdo;
    return $pdo->query($query_string);
}

// for getting one or some string WITH ARGUMENTS
function pdo_prepare_execute($params, $select = '*', $table = 'posts') {
    $query_string = "SELECT $select FROM $table";
    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $query_string .= " WHERE :$key = $key";
        }
    }

    global $pdo;
    $stmt = $pdo->prepare($query_string);
    $stmt->execute($params);

    return $stmt->fetchAll();
}

// for header-main and header-post
$categories = [];
$gettedCategories = pdo_query('*', 'categories');
foreach ($gettedCategories as $c) {
    $categories[] = $c;
}


