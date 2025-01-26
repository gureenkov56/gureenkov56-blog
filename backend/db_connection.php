<?php
require_once 'credentials.php';

/* @var string $HOST
 * @var string $DB_NAME
 * @var string $USER_NAME
 * @var string $PASSWORD
 * @var string $CHARSET
 */

$dsn = "mysql:host=$HOST;dbname=$DB_NAME;charset=$CHARSET";

$option = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $USER_NAME, $PASSWORD, $option);
    $GLOBALS['pdo'] = $pdo;
} catch(PDOException $e) {
//     Router::ErrorPage404();
   echo "Connection failed: " . $e->getMessage();
   die();
}

//function get_all_posts() {
//    return $pdo->query('SELECT * FROM posts');
//}
