<?php
include_once 'pages/bd.php';
if (isset($_POST['btnlogin'])) {
    $userLogin=trim($_POST['login']);
    $userPassword=trim($_POST['password']);
    if($userLogin) {
        $sql="SELECT COUNT(*) AS 'count' FROM `user` WHERE `Login`='$userLogin';";
        $res=getData($sql);
        if ($res[0]['count'] === '0') {
            $err[2]='Пользователь с таким логином не существует';                        
        } else {
            if ($userPassword) {
                $sql="SELECT `Password` FROM `user` WHERE `Login`='$userLogin';";
                $res=getData($sql);
                if ($res[0]['Password'] === $userPassword) {
                    if ($userLogin === 'admin') header('Location: index.php?page=admin');
                    else header('Location: index.php?page=main');
                } else {
                    $err[2]='Неверный пароль';
                }
            } else {
                $err[1] = 'Введите пароль';
            }
        }
    } else {
        $err[0] = 'Введите логин';
    }    
}

?>
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
        <p>Вы новый пользователь? <a href="index.php?page=registration">Зарегистрироваться</a></p>
    </div>
</body>
</html>