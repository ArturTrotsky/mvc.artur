<?php


$view = 'login';

$username = $_POST['username'] ?? null;

//$password = $_POST['password'] ?? false;
// isset($_POST) 
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $password = md5($password);
} else $password = null;

if ($username) {
    if ($username === $user['username'] && $password === $user['password']) {
        $_SESSION['username'] = $username;
    } else {
        $vars['error'] = 'Username and Password mismatch';
    }
}
// отображается если сейчас сессия зарегистированного пользователя
if (isset($_SESSION['username'])) {
    $vars['username'] = $_SESSION['username'];
    $view = 'welcome';
}
//var_dump(md5(zzzz));
