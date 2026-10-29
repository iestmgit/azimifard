<?php
require_once 'config.php';
$pageTitle = 'آموزش قرآن با استاد عظیمی‌فرد | پایه هفتم، هشتم و نهم';
$pageDesc  = 'سایت رسمی آموزش قرآن کریم با استاد عظیمی‌فرد. محتوای آموزشی اختصاصی برای دانش‌آموزان پایه هفتم، هشتم و نهم شامل تجوید، قرائت و مفاهیم.';
include 'includes/header.php';
?>

<section class="hero">
  <div class="container">
    <h1>آموزش قرآن با استاد عظیمی‌فرد</h1>
    <p class="sub">یادگیری تخصصی قرآن کریم برای پایه‌های هفتم، هشتم و نهم</p>
    <a href="<?= SITE_URL ?>/login.php?type=student" class="cta-btn">شروع یادگیری</a>
  </div>
</section>

<section class="container section">
  <div class="cards">
    <div class="card">
      <div class="card-icon">📚</div>
      <h2>محتوای تخصصی</h2>
      <p>درس‌های تجوید، قرائت و مفاهیم قرآن به صورت فایل صوتی، تصویری و متنی</p>
    </div>
    <div class="card">
      <div class="card-icon">🎯</div>
      <h2>مخصوص هر پایه</h2>
      <p>محتوای جداگانه برای پایه‌های هفتم، هشتم و نهم با توجه به سطح هر دانش‌آموز</p>
    </div>
    <div class="card">
      <div class="card-icon">👨‍🏫</div>
      <h2>زیر نظر استاد</h2>
      <p>تمام محتوا به طور مستقیم توسط استاد عظیمی‌فرد آماده و منتشر می‌شود</p>
    </div>
  </div>
</section>

<section class="container section">
  <h2 class="section-title">درباره قرآن کریم</h2>
  <div class="about-box">
    <p>
      قرآن کریم، کتاب آسمانی مسلمانان و معجزه جاویدان پیامبر اسلام (ص) است. این کتاب در طول ۲۳ سال بر پیامبر اکرم نازل شد و شامل ۱۱۴ سوره و بیش از ۶۲۰۰ آیه است.
    </p>
    <p>
      قرآن راهنمای زندگی بشر در تمام ابعاد فردی، اجتماعی، اخلاقی و معنوی است.
    </p>
    <a href="<?= SITE_URL ?>/about.php" class="read-more">ادامه مطلب →</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>