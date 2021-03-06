<?php
include_once 'pages/bd.php';
$err=[false,false,false,false,false,false,false,false,];
$str = ['','','','','','','','',];
if (isset($_POST['btnreg'])) {
    if (strlen(trim($_POST['login'])) < 3 or strlen($_POST['login']) > 20) {
        $err[0]='Username is too short / long';        
    } else $str[0] = trim($_POST['login']);
    if (strlen(trim($_POST['password']))<6) $err[1]='Password is too short';
    else $str[1] = trim($_POST['password']);
    if (trim($_POST['name']) == '') $err[2]=true;
    else $str[2] = trim($_POST['name']);
    if (trim($_POST['surname']) == '') $err[3]=true;
    else $str[3] = trim($_POST['surname']);
    if (trim($_POST['country']) == '') $err[4]=true;
    else $str[4] = trim($_POST['country']);
    if (trim($_POST['city']) == '') $err[5]=true;
    else $str[5] = trim($_POST['city']);
    if (trim($_POST['phone']) == '') $err[6]=true;
    else $str[6] = trim($_POST['phone']);
    if (count($err) == 0) {
        $sql="SELECT COUNT(*) AS 'count' FROM `user` WHERE `Login`='{$_POST['login']}';";
        $res=getData($sql);
        if ($res[0]['count'] === '1') {
            $err[7]='Пользователь с таким логином уже существует';            
        } else {
            $sql="INSERT INTO `user`(`Name`, `Surname`, `Login`, `Password`, `Phone`, `Country`, `City`) VALUES ('{$_POST['name']}','{$_POST['surname']}','{$_POST['login']}','{$_POST['password']}','{$_POST['phone']}','{$_POST['country']}','{$_POST['city']}')";
            var_dump($sql);
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
            <input type="text" name="login" id="login"
            <?php
                if ($err[0]) echo "placeholder = '$err[0]'>";
                else echo "value='$str[0]'>";
                ?>
        </label>
        <label for="password" class="form-label">Пароль:
            <input type="password" name="password" id="password"
            <?php
                if ($err[1]) echo "placeholder = '$err[1]'>";
                else echo "value='$str[1]'>";
            ?>
        </label>
        <label for="name" class="form-label">Имя:
            <input type="text" name="name" id="name"
            <?php 
                if($err[2]) echo "class='wrong'>";
                else echo "value='$str[2]'>";
            ?>
        </label>
        <label for="surname" class="form-label">Фамилия:
            <input type="text" name="surname" id="surname"
            <?php 
                if($err[3]) echo "class='wrong'>";
                else echo "value='$str[3]'>";
            ?>
        </label>
        <label for="country" class="form-label">Страна:
            <input type="text" name="country" id="country"
            <?php 
                if($err[4]) echo "class='wrong'>";
                else echo "value='$str[4]'>";
            ?>
        </label>
        <label for="city" class="form-label">Город:
            <input type="text" name="city" id="city"
            <?php 
                if($err[5]) echo "class='wrong'>";
                else echo "value='$str[5]'>";
            ?>
        </label>
        <label for="phone" class="form-label">Телефон:
            <input type="text" name="phone" id="phone"
            <?php 
                if($err[6]) echo "class='wrong'>";
                else echo "value='$str[7]'>";
            ?>
        </label>
        <?php
            if($err[7]) echo "<p>$err[7], <a href='index.php?page=login'>хотите войти?</a></p>";
        ?>
        <input type="submit" class="btn" name="btnreg" id="btnreg" value="Зарегистрироваться" disabled>
    </form>
</div>

</body>
</html>