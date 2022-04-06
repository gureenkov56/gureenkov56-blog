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
            <h1 class="login__h1">Hello, new user!</h1>
            <a href="/">
                <button class="login__form__header__btn hover_light active_darker">×</button>
            </a>
        </div>
        <form method="POST" action="php/regUser.php" autocomplete="off">
            <div class="login__group-wrapper">
                <label for="newLogin">Login:</label>
                <input type="text" name="login" id="newLogin" required>
            </div>
            <div class="login__group-wrapper">
                <label for="newPass">Password:</label>
                <input type="password" name="password" id="newPass" required>
            </div>
            <div class="login__group-wrapper">
				<p>Придумайте логин и пароль. Не забудьте запомнить и не забыть их.</p>
			</div>
            <div class="login__form__btn-wrapper">
                <a href="/">
                    <button type="button" class='windows-standart-btn'>Home</button>
                </a>
                <button type="submit" class='windows-standart-btn priority'>Reg</button>
            </div>
            <?php if (!empty($_GET['result'])){
                echo '<div class="login__form__error">' . $_GET['result'] . '</div>';
            }?>
        </form>
    </div>
</div>
</body>
</html>

