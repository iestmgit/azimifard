<?php
require_once 'config.php';
if (!isTeacher()) { http_response_code(403); die('دسترسی ندارید.'); }

$grade = $_POST['grade'] ?? '';
$title = trim($_POST['title'] ?? '');
$desc  = trim($_POST['desc'] ?? '');

if (!in_array($grade, ['7','8','9']) || !$title) {
    die('اطلاعات ناقص است.');
}

$contents = loadContents();
$contents[$grade] = $contents[$grade] ?? [];

$newItem = [
    'id'        => time() . rand(100, 999),
    'title'     => $title,
    'desc'      => $desc,
    'date'      => date('Y-m-d H:i'),
    'url'       => null,
    'file_name' => null,
    'file_type' => null,
];

if (!empty($_FILES['file']['name']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $f = $_FILES['file'];
    if ($f['size'] > MAX_FILE_SIZE) die('حجم فایل بیش از حد مجاز است.');

    $ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));

    // === تغییر اصلی اینجاست ===
    // فقط اگر پسوند php بود، خطا بده. بقیه فرمت‌ها (هرچیزی) آزاد است.
    if ($ext === 'php' || $ext === 'php3' || $ext === 'php4' || $ext === 'php5' || $ext === 'phtml') {
        die('برای امنیت سایت، آپلود فایل‌های PHP مجاز نیست.');
    }
    // ===========================

    $safeName = $newItem['id'] . '.' . $ext;
    $target = UPLOAD_DIR . $safeName;

    if (move_uploaded_file($f['tmp_name'], $target)) {
        $newItem['url'] = $safeName;
        $newItem['file_name'] = $f['name'];

        // تشخیص نوع فایل برای نمایش (اگر fileinfo نصب باشد)
        if (function_exists('mime_content_type')) {
            $newItem['file_type'] = mime_content_type($target);
        } else {
            $newItem['file_type'] = ''; // اگر نبود، خالی می‌ذاریم
        }
    }
}

$contents[$grade][] = $newItem;
saveContents($contents);

header('Location: ' . SITE_URL . '/teacher-panel.php');
exit;
?>