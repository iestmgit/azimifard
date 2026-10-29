// ===== دارک مود =====
function updateThemeIcon() {
  const t = document.documentElement.getAttribute('data-theme');
  const icon = document.getElementById('themeIcon');
  if (icon) icon.textContent = t === 'dark' ? '☀️' : '🌙';
}
function toggleTheme() {
  const cur = document.documentElement.getAttribute('data-theme');
  const next = cur === 'dark' ? 'light' : 'dark';
  document.documentElement.setAttribute('data-theme', next);
  localStorage.setItem('theme', next);
  updateThemeIcon();
}
updateThemeIcon();

// ===== منوی موبایل =====
function toggleMobileMenu() {
  document.getElementById('siteNav').classList.toggle('show');
}

// ===== پنل استاد =====
let selectedGrade = null;
const gradeNames = { '7':'پایه هفتم', '8':'پایه هشتم', '9':'پایه نهم' };

function selectGrade(grade) {
  selectedGrade = grade;
  document.querySelectorAll('.grade-btn').forEach(b => {
    b.classList.toggle('active', b.dataset.grade === grade);
  });
  const title = document.getElementById('uploadFormTitle');
  if (title) title.textContent = 'آپلود محتوا برای ' + gradeNames[grade];
  const gi = document.getElementById('gradeInput');
  if (gi) gi.value = grade;
  const uf = document.getElementById('uploadForm');
  if (uf) uf.style.display = 'block';
  loadTeacherContents(grade);
}

function loadTeacherContents(grade) {
  const container = document.getElementById('teacherContent');
  if (!container) return;
  fetch('get_contents.php?grade=' + grade)
    .then(r => r.json())
    .then(data => {
      if (!data.length) {
        container.innerHTML = '<p class="empty-msg">هنوز محتوایی برای این پایه ارسال نکرده‌اید.</p>';
        return;
      }
      container.innerHTML = data.map(item => `
        <div class="content-item">
          <h3>${esc(item.title)}</h3>
          <p>${esc(item.desc || '')}</p>
          ${renderFile(item)}
          <button class="del-btn" onclick="deleteContent('${grade}', ${item.id})">🗑 حذف</button>
        </div>
      `).join('');
    });
}

function deleteContent(grade, id) {
  if (!confirm('این محتوا حذف شود؟')) return;
  fetch('delete.php', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'grade=' + encodeURIComponent(grade) + '&id=' + encodeURIComponent(id)
  }).then(() => loadTeacherContents(grade));
}

// ===== پنل دانش‌آموز =====
function loadStudentContents(grade) {
  const container = document.getElementById('studentContent');
  if (!container) return;
  fetch('get_contents.php?grade=' + grade)
    .then(r => r.json())
    .then(data => {
      if (!data.length) {
        container.innerHTML = '<p class="empty-msg">هنوز محتوایی برای این پایه ارسال نشده است.</p>';
        return;
      }
      container.innerHTML = data.map(item => `
        <div class="content-item">
          <h3>${esc(item.title)}</h3>
          <p>${esc(item.desc || '')}</p>
          ${renderFile(item)}
        </div>
      `).join('');
    });
}

// ===== کمکی =====
function renderFile(item) {
  if (!item.url) return '';
  const t = item.file_type || '';
  const url = item.url;
  if (t.startsWith('image/')) return `<img src="${url}" alt="${esc(item.title)}">`;
  if (t.startsWith('video/')) return `<video controls src="${url}"></video>`;
  if (t.startsWith('audio/')) return `<audio controls src="${url}"></audio>`;
  return `<a class="dl-btn" href="${url}" download>📥 دانلود فایل</a>`;
}

function esc(s) {
  return String(s||'').replace(/[&<>"']/g, m => (
    {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]
  ));
}