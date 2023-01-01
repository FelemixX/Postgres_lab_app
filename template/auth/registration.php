<?php
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$content = trim(file_get_contents("php://input"));
$decodedData = json_decode($content, true);


if (!isset($decodedData['user_login_register_modal']) || !isset($decodedData['user_name_register_modal']) || !isset($decodedData['user_email_register_modal']) || !isset($decodedData['user_password_register_modal']) || !isset($decodedData['user_password_repeated_register_modal'])) {
    throw new Exception('Что-то пошло не так, попробуйте еще раз');
}

if ($decodedData['user_password_register_modal'] != $decodedData['user_password_repeated_register_modal']) {
    throw new Exception('Пароли не совпадают');
}

if (!filter_var($decodedData['user_email_register_modal'], FILTER_VALIDATE_EMAIL)) {
    throw new Exception('Неверно задан email');
}

if(!preg_match('/^[A-Za-z0-9]+([A-Za-z0-9]*|[._-]?[A-Za-z0-9]+)*$/', $decodedData['user_login_register_modal'])) {
    throw new Exception('Неверно задан логин');
}

if(!preg_match('/[а-яА-Я]|[a-zA-Z]/', $decodedData['user_name_register_modal'])) {
    throw new Exception('Неверно задано имя');
}

$userLogin = htmlspecialchars($decodedData['user_login_register_modal']);
$userName = htmlspecialchars($decodedData['user_name_register_modal']);
$userEmail = htmlspecialchars($decodedData['user_email_register_modal']);
$userPassword = htmlspecialchars($decodedData['user_password_register_modal']);

include_once $_SERVER['DOCUMENT_ROOT'] . '/template/lib/tables/user.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/lib/database.php';

try {
    $db = new Database();
    $conn = $db->getConnection();

    $user = new User($conn);

    $user->login = $userLogin;
    $user->email = $userEmail;
    $user->password = $userPassword;
    $user->name = $userName;
} catch (Exception $exception) {
    echo $exception->getMessage();
}

if (!$user->registerUser()) {
    throw new Exception('Не удалось зарегистрироваться, попробуйте еще раз');
}
