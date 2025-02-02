<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="/frontend/css/main.css">
        <link rel="stylesheet" href="/frontend/css/login.css">
        <meta name="description" content="Страница авторизации"/>
        <title>Войти в аккаунт</title>
    </head>

    <body class="login">
        <div>
            <!-- TODO: 
             Animated placeholders
             JS validation errors
             Backend auth
             GOOGLE and APPLE auth -->
            <h3>Вход</h3>
            <form action="">
                <input type="text" placeholder="Email">
                <input type="password" placeholder="Пароль">
                <button type="submit">Войти</button>
                <div class="forgot-password">
                    Забыли пароль? <a href="/">Восстановить</a>
                </div>
            </form>
        </div>
    </body>
</html>
