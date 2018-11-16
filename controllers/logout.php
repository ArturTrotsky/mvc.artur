<?php

$view = 'login';
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}
