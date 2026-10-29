</main>

<footer class="site-footer">
  <div class="container">
    <p>© <?= date('Y') ?> — <?= htmlspecialchars(SITE_NAME) ?> | تمامی حقوق محفوظ است.</p>
    <?php if (isTeacher() || isStudent()): ?>
      <p style="margin-top:8px;">
        <a href="<?= SITE_URL ?>/logout.php" style="color:#f4c430;">خروج از حساب</a>
      </p>
    <?php endif; ?>
  </div>
</footer>

<script src="<?= SITE_URL ?>/assets/script.js"></script>
</body>
</html>