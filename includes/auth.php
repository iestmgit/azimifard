<?php
require_once __DIR__ . '/../config.php';

function requireTeacher() {
    if (!isTeacher()) {
        header('Location: ' . SITE_URL . '/login.php?type=teacher&err=1');
        exit;
    }
}
function requireStudent() {
    if (!isStudent()) {
        header('Location: ' . SITE_URL . '/login.php?type=student&err=1');
        exit;
    }
}
?>