<?php

$view = 'message';

if ($_SESSION['username'] === $message['user']) {
    $content = $_POST['content'] ?? null;
    if ($content) {
        $message['content'] = $content;
        saveInstance('message', $message);
    }

    $vars['user'] = $message['user'];
    $vars['content'] = $message['content'];
} else {
    $view = 'login';
}
