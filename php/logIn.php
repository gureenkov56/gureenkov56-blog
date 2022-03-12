<?php
require_once 'functions.php';

$res = pdo_prepare_execute(['login' => $_POST['login']], '*', 'users');

if (empty($res)) {
    echo "NOUSER";
    header('Location: /login.php?result=NOUSER');
    $_SESSION = [];
    exit();
}
elseif ($res[0]['password'] === $_POST['pass']) {
    $_SESSION['login'] = $res[0]['login'];
    $_SESSION['access_level'] = $res[0]['access_level'];

    if ($_SESSION['access_level'] === 'admin') {
        header('Location: /admin');
        exit();
    } else {
        header('Location: /');
        exit();
    }

} else {
    header('Location: /login.php?result=WRONG PASSWORD');
    $_SESSION = [];
}



