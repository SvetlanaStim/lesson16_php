<?php
function connect($host='localhost', $user='mysql', $pass='mysql', $dbname='shop'){
    $link=mysqli_connect($host, $user, $pass);
    if (!$link) {
        echo "Connect failed: %s\n", mysqli_connect_error();
        exit();
    }
    if (!mysqli_select_db($link, $dbname)) {
        echo "Error: no connection";
        exit();
    }
    mysqli_query($link, "set names 'utf8'");
    return $link;
}

function getData($sql) {
    $link=connect();
    $arr=[];
    $res=mysqli_query($link, $sql);
    if (!$res) {
        echo "<p>Произошла ошибка при выполнении запроса</p>";
    } else {
        while($row = mysqli_fetch_assoc($res)) {
            $arr[]=$row;
        }
    }
    return $arr;
}

function setData($sql) {
    $link=connect();
    $res=mysqli_query($link,$sql);
    if (!$res) {
        echo "<p>Произошла ошибка при выполнении запроса</p>";
    }
    return $res;
}