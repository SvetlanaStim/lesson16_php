<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <label for="login" class="form-label">Логин:
                <input type="text" name="login" id="login">
            </label>
            <label for="password" class="form-label">Пароль:
                <input type="password" name="password" id="password">
            </label>
            <input type="submit" class="btn" name="btnlogin" id="btnlogin" value="Войти">
        </form>
    </div>
</body>
</html>