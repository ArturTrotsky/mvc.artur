<?php

$view = 'password';

if ($_SESSION['username'] === $message['user']) {

  //  $content = $_POST['password'] ?? null;

    if (isset($_POST['password'])) {
        $content = $_POST['password'];
        $content = md5($content);
    } else $content = null;

    if ($content) {
        $user['password'] = $content;
        saveInstance('user', $user);
    }

    $vars['user'] = $message['user'];
    $vars['content'] = $user['password'];
} else {
    $view = 'login';
}
