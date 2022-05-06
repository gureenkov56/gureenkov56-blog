<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$host = 'nvgurew2.beget.tech';
$user_name = 'nvgurew2_g56';
$pass = 'FSdSC0%n';
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

