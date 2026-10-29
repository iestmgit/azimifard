<?php
require_once 'config.php';

if (!isTeacher() && !isStudent()) { http_response_code(403); die('[]'); }

$grade = $_GET['grade'] ?? '';
if (!in_array($grade, ['7','8','9'])) die('[]');

if (isStudent() && $_SESSION['grade'] !== $grade) {
    http_response_code(403);
    die('[]');
}

$contents = loadContents();
$list = $contents[$grade] ?? [];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($list, JSON_UNESCAPED_UNICODE);