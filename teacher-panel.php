<?php
require_once 'includes/auth.php';
requireTeacher();

$pageTitle = 'پنل استاد عظیمی‌فرد';
$pageDesc  = 'مدیریت محتوای آموزشی قرآن کریم';
include 'includes/header.php';
?>

<section class="container section">
  <h1 class="section-title">پنل استاد عظیمی‌فرد</h1>

  <div class="grade-selector">
    <button class="grade-btn" data-grade="7" onclick="selectGrade('7')">پایه هفتم</button>
    <button class="grade-btn" data-grade="8" onclick="selectGrade('8')">پایه هشتم</button>
    <button class="grade-btn" data-grade="9" onclick="selectGrade('9')">پایه نهم</button>
  </div>

  <div class="upload-form" id="uploadForm" style="display:none;">
    <h2 id="uploadFormTitle"></h2>
    <form method="post" action="upload.php" enctype="multipart/form-data">
      <input type="hidden" name="grade" id="gradeInput" value="">
      <label>عنوان محتوا
        <input type="text" name="title" placeholder="مثلاً: درس اول تجوید" required>
      </label>
      <label>توضیحات
        <textarea name="desc" rows="3" placeholder="توضیح مختصر..."></textarea>
      </label>
      <label>فایل (اختیاری)
        <input type="file" name="file">
      </label>
      <button type="submit" class="cta-btn">📤 ارسال محتوا</button>
    </form>
  </div>

  <div id="teacherContent" class="content-list"></div>
</section>

<?php include 'includes/footer.php'; ?>