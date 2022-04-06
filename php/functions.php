<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/config.php";

function pre($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

// for getting one or some string WITHOUT ARGUMENTS
function pdo_query($select = '*', $from = 'posts', $order_by = '', $order = '', $limit = '10', $where_params = []) {
    $query_string = "SELECT $select FROM $from";
    if (!empty($where_params)) {
        $query_string .= " WHERE";
        foreach ($where_params as $key => $value) {
            $query_string .= " `$key` = '$value' AND";
        }

        // remove ' AND' on the end
        $query_string = substr($query_string, 0, -4);
    }
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

// for update data without prepare (no params by user)
function pdo_update($table = 'posts', $params = [], $where = []) {
    $query_string = "UPDATE `$table` SET ";

    foreach ($params as $key => $value) {
        $query_string .= "`$key` = $value ";
    }

    $query_string .= "WHERE ";

    foreach ($where as $key => $value) {
        $query_string .= "`$key` = $value ";
    }

    global $pdo;
    $pdo->query($query_string);
}

// insert with params by user

function pdo_insert_prepare($table, $params) {
    $query_string = "INSERT INTO `$table` (";

    foreach ($params as $key => $value) {
        $query_string .= "`$key`, ";
    }

    // remove "," on the end
    $query_string = substr($query_string, 0, -2);

    $query_string .= ") VALUES (";

    foreach ($params as $key => $value) {
        $query_string .= ":$key, ";
    }

    // remove "," on the end
    $query_string = substr($query_string, 0, -2);

    $query_string .= ")";

    global $pdo;
    $stmt = $pdo->prepare($query_string);
    $stmt->execute($params);

    echo json_encode($query_string);
}

// for header-main and header-post
$categories = [];
$gettedCategories = pdo_query('*', 'categories');
foreach ($gettedCategories as $c) {
    $categories[] = $c;
}


