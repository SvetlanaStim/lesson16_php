<?php
session_start();
if (isset($_GET) and count($_GET) !=0) {
    $navigate = $_GET['page'];
    switch ($navigate) {
        case 'login': include_once 'pages/login.php';
        break;
        case 'admin': include_once 'pages/admin.php';
        break;
        case 'category': include_once 'pages/category.php';
        break;
        case 'main': include_once 'pages/main.php';
        break;
        case 'products': include_once 'pages/products.php';
        break;
        case 'registration': include_once 'pages/registration.php';
        break;
        case 'sector': include_once 'pages/sector.php';
        break;
    }
} else include_once 'pages/start.php';