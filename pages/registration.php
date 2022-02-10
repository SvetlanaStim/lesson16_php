<?php
include_once 'pages/bd.php';
$err=[];
if (isset($_POST['btnreg'])) {
    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 20) {
        $err[0]='Username is too short / long';
    }
    if (strlen($_POST['password'])<6) $err[1]='Password is too short';

    if (count($err) == 0) {
        $sql="SELECT COUNT(*) AS 'count' FROM `user` WHERE `Login`='{$_POST['login']}';";
        $res=getData($sql);
        if ($res[0]['count'] == 1) {
            $err[7]='Пользователь с таким логином уже существует';
        } else {
            $sql="INSERT INTO `user`(`Name`, `Surname`, `Login`, `Password`, `Phone`, `Country`, `City`) VALUES ('{$_POST['name']}','{$_POST['surname']}','{$_POST['login']}','{$_POST['password']}','{$_POST['phone']}','{$_POST['country']}','{$_POST['city']}')";
            // echo $sql;
            $result=setData($sql);
            if ($result) header('Location: index.php?page=main');
            else echo "Не удалось сохранить данные. попробуйте позже";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/registration.css">
    <script src="js/main.js" defer></script>
</head>
<body>
    

<div class="container">
    <form action="index.php?page=registration" method="POST">
        <label for="login" class="form-label">Логин:
            <input type="text" name="login" id="login">            
        </label>
        <label for="password" class="form-label">Пароль:
            <input type="password" name="password" id="password">
        </label>
        <label for="name" class="form-label">Имя:
            <input type="text" name="name" id="name">
        </label>
        <label for="surname" class="form-label">Фамилия:
            <input type="text" name="surname" id="surname">
        </label>
        <label for="country" class="form-label">Страна:
            <input type="text" name="country" id="country">
        </label>
        <label for="city" class="form-label">Город:
            <input type="text" name="city" id="city">
        </label>
        <label for="phone" class="form-label">Телефон:
            <input type="text" name="phone" id="phone">
        </label>
        <input type="submit" class="btn" name="btnreg" id="btnreg" value="Зарегистрироваться" disabled>
    </form>
</div>

</body>
</html>