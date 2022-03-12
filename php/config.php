<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/login-and-pass-for-prod.php';
global $mode, $user_name_prod, $pass_prod;

$host = 'localhost';
$user_name = ($mode === 'prod') ? $user_name_prod : 'root';
$pass = ($mode === 'prod') ? $pass_prod : 'root';
$bd_name = 'nvgurew2_g56';
$charset = 'utf8';

// PDO
$dsn = "mysql:host=$host;dbname=$bd_name;charset=$charset";

$option = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user_name, $pass, $option);

