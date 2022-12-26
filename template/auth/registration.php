<?php
header('Location: /404.php/');

if (!isset($_POST['user_login_register_modal']) || isset($_POST['user_email_register_modal']) || isset($_POST['user_password_register_modal']) || isset($_POST['user_password_repeated_register_modal'])) {
    throw new Exception('Что-то пошло не так, попробуйте еще раз');
}

if ($_POST['user_password_register_modal'] != $_POST['user_password_repeated_register_modal']) {
    throw new Exception('Пароли не совпадают');
}

if (!filter_var($_POST['user_email_register_modal'], FILTER_VALIDATE_EMAIL)) {
    throw new Exception('Неверно задан email');
}

$userLogin = htmlspecialchars($_POST['user_login_register_modal']);
$userEmail = htmlspecialchars($_POST['user_email_register_modal']);
$userPassword = htmlspecialchars($_POST['user_password_register_modal']);

include_once 'template/lib/tables/user.php';
include_once 'template/lib/database.php';

$db = new Database();
$conn = $db->getConnection();

$user = new User($conn);

$user->userLogin = $userLogin;
$user->userEmail = $userEmail;
$user->userPassword = $userPassword;

if (!$user->registerUser()) {
    throw new Exception('Не удалось зарегистрироваться, попробуйте еще раз');
}
