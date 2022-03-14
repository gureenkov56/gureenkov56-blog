<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
<div class="login-page-wrapper">
    <div class="login__form__wrapper">
        <div class="login__form__header">
            <h1 class="login__h1">Log in</h1>
            <a href="/">
                <button class="login__form__header__btn">×</button>
            </a>
        </div>
        <form method="POST" action="php/logIn.php">
            <div class="login__group-wrapper">
                <label for="login">Login or email:</label>
                <input type="text" name="login" id="login" required>
            </div>
            <div class="login__group-wrapper">
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" required>
            </div>
            <div class="login__form__btn-wrapper">
                <a href="/">
                    <button type="button">Home</button>
                </a>
                <button type="submit">Log in</button>
            </div>
            <?php if (!empty($_GET['result'])){
                echo $_GET['result'];
            }?>
        </form>
    </div>
</div>
</body>
</html>

