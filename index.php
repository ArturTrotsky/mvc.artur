<?php

include_once('functions.php');

session_start();
/*
getInstance('User') возьмет модели username и password из файла user.model,
проверит их наличие в user.data и при успешном исходе
вернет в $user массив ["username" => "admin", "password" => "123456"]
 */
$user = getInstance('user');

/*
getInstance('message') возьмет модели user и content из файла message.model,
проверит их наличие в message.data и при успешном исходе
вернет в $message массив ["user" => "admin", "content" => "Hello, World!"]
 */
$message = getInstance('message');

$controllers = [
    'login',
    'logout',
    'welcome',
    'message',
    'password',
];

// Если $_GET['controller'] true, тогда
// $_GET['controller'] = $_GET['controller']
// иначе $_GET['controller'] = 'login'
$controller = $_GET['controller'] ?? 'login';

$controller = in_array($controller, $controllers) // Проверяет, присутствует ли в массиве значение
    ? $controller // если верно
    : $controllers[0]; // если не верно

$view = 'login';
$vars = [
    'error' => '',
];

include_once('controllers/' . $controller . '.php');

$content = file_get_contents(__DIR__ . '/views/' . $view . '.html');
foreach ($vars as $key => $value) {
    $content = str_replace('{{' . $key . '}}', $value, $content);
}
echo $content;
