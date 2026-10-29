<?php
require_once 'config.php';
if (!isTeacher()) { http_response_code(403); die('دسترسی ندارید.'); }

$grade = $_POST['grade'] ?? '';
$id    = $_POST['id'] ?? '';
if (!in_array($grade, ['7','8','9'])) die('خطا');

$contents = loadContents();
if (!isset($contents[$grade])) die('خطا');

foreach ($contents[$grade] as $i => $item) {
    if ($item['id'] == $id) {
        if (!empty($item['url']) && file_exists(__DIR__ . '/' . $item['url'])) {
            unlink(__DIR__ . '/' . $item['url']);
        }
        unset($contents[$grade][$i]);
        $contents[$grade] = array_values($contents[$grade]);
        saveContents($contents);
        echo 'ok';
        exit;
    }
}
echo 'not found';