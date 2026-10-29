<?php
if (!defined('SITE_NAME')) require_once __DIR__ . '/../config.php';

$pageTitle = $pageTitle ?? SITE_NAME;
$pageDesc  = $pageDesc  ?? 'آموزش تخصصی قرآن کریم برای پایه‌های هفتم، هشتم و نهم با استاد عظیمی‌فرد';
$pageUrl   = $pageUrl   ?? SITE_URL . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
<meta name="keywords" content="آموزش قرآن, قرآن کریم, تجوید, استاد عظیمی‌فرد, پایه هفتم, پایه هشتم, پایه نهم, آموزش قرآن آنلاین">
<meta name="author" content="استاد عظیمی‌فرد">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= htmlspecialchars($pageUrl) ?>">
<meta property="og:locale" content="fa_IR">
<meta property="og:site_name" content="<?= htmlspecialchars(SITE_NAME) ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($pageDesc) ?>">

<link rel="canonical" href="<?= htmlspecialchars($pageUrl) ?>">
<link rel="stylesheet" href="<?= SITE_URL ?>/assets/style.css">
<script>
  // اعمال تم قبل از رندر (جلوگیری از فلش)
  (function(){
    const t = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', t);
  })();
</script>
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <a href="<?= SITE_URL ?>/index.php" class="logo">📖 آموزش قرآن</a>

    <button class="mobile-toggle" onclick="toggleMobileMenu()" aria-label="منو">☰</button>

    <nav class="site-nav" id="siteNav">
      <a href="<?= SITE_URL ?>/index.php">خانه</a>
      <a href="<?= SITE_URL ?>/about.php">درباره قرآن</a>
      <?php if (!isTeacher() && !isStudent()): ?>
        <a href="<?= SITE_URL ?>/login.php?type=student">ورود دانش‌آموز</a>
        <a href="<?= SITE_URL ?>/login.php?type=teacher">ورود استاد</a>
      <?php elseif (isStudent()): ?>
        <a href="<?= SITE_URL ?>/student-panel.php">پنل من</a>
      <?php elseif (isTeacher()): ?>
        <a href="<?= SITE_URL ?>/teacher-panel.php">پنل استاد</a>
      <?php endif; ?>
    </nav>

    <button class="theme-toggle" onclick="toggleTheme()" aria-label="تغییر تم">
      <span id="themeIcon">🌙</span>
    </button>
  </div>
</header>

<main>