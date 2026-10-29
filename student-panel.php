<?php
require_once 'includes/auth.php';
requireStudent();

$pageTitle = 'پنل آموزشی ' . $_SESSION['grade_name'];
$pageDesc  = 'محتوای آموزشی قرآن کریم برای ' . $_SESSION['grade_name'];
include 'includes/header.php';
?>

<section class="container section">
  <h1 class="section-title">پنل آموزشی <?= htmlspecialchars($_SESSION['grade_name']) ?></h1>
  <div id="studentContent" class="content-list">
    <p class="empty-msg">در حال بارگذاری...</p>
  </div>
</section>

<script>
  const STUDENT_GRADE = '<?= $_SESSION['grade'] ?>';
  loadStudentContents(STUDENT_GRADE);
</script>

<?php include 'includes/footer.php'; ?>