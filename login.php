<?php
require_once 'config.php';

$type = $_GET['type'] ?? $_POST['type'] ?? 'student';
if (!in_array($type, ['student','teacher'])) $type = 'student';

// اگر قبلاً لاگین شده
if (isTeacher()) { header('Location: ' . SITE_URL . '/teacher-panel.php'); exit; }
if (isStudent()) { header('Location: ' . SITE_URL . '/student-panel.php'); exit; }

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = trim($_POST['password'] ?? '');

    if ($type === 'student' && isset($STUDENTS[$u]) && $STUDENTS[$u]['pass'] === $p) {
        $_SESSION['role'] = 'student';
        $_SESSION['grade'] = $STUDENTS[$u]['grade'];
        $_SESSION['grade_name'] = $STUDENTS[$u]['name'];
        header('Location: ' . SITE_URL . '/student-panel.php');
        exit;
    }
    if ($type === 'teacher' && $u === $TEACHER['user'] && $p === $TEACHER['pass']) {
        $_SESSION['role'] = 'teacher';
        header('Location: ' . SITE_URL . '/teacher-panel.php');
        exit;
    }
    $error = 'نام کاربری یا رمز عبور اشتباه است.';
}

$pageTitle = ($type === 'student' ? 'ورود دانش‌آموزان' : 'ورود استاد') . ' | ' . SITE_NAME;
$pageDesc  = 'ورود به پنل آموزشی قرآن کریم';
$pageUrl   = SITE_URL . '/login.php';
include 'includes/header.php';
?>

<section class="login-section">
  <div class="login-card">
    <h1><?= $type === 'student' ? 'ورود دانش‌آموزان' : 'ورود استاد عظیمی‌فرد' ?></h1>
    <form method="post">
      <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">
      <label>نام کاربری
        <input type="text" name="username" required autofocus>
      </label>
      <label>رمز عبور
        <input type="password" name="password" required>
      </label>
      <button type="submit" class="cta-btn">ورود</button>
      <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    </form>
    <div class="login-links">
      <?php if ($type === 'student'): ?>
        <a href="?type=teacher">ورود استاد</a>
      <?php else: ?>
        <a href="?type=student">ورود دانش‌آموز</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>