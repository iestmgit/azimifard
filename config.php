<?php
session_start();

$STUDENTS = [
    "stud7'th" => ["pass" => "777'th", "grade" => "7", "name" => "پایه هفتم"],
    "stud8'th" => ["pass" => "888'th", "grade" => "8", "name" => "پایه هشتم"],
    "stud9'th" => ["pass" => "999'th", "grade" => "9", "name" => "پایه نهم"],
];

$TEACHER = [
    "user" => "yoosofazimifard1405",
    "pass" => "yaf1405",
];

define('SITE_NAME', 'آموزش قرآن با استاد عظیمی‌فرد');
define('SITE_URL', 'http://localhost:8000'); // آدرس سایت رو اینجا تنظیم کن
define('UPLOAD_DIR', __DIR__ . '/uploads/');
define('DATA_FILE', __DIR__ . '/contents.json');
define('MAX_FILE_SIZE', 50 * 1024 * 1024);

if (!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR, 0755, true);

function loadContents() {
    if (!file_exists(DATA_FILE)) return [];
    $data = json_decode(file_get_contents(DATA_FILE), true);
    return is_array($data) ? $data : [];
}
function saveContents($data) {
    file_put_contents(DATA_FILE, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}
function isTeacher() { return ($_SESSION['role'] ?? '') === 'teacher'; }
function isStudent() { return ($_SESSION['role'] ?? '') === 'student'; }
?>