<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">🌸花見漫漫美學🌸</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-md-auto w-100">
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="home">🐰 首頁</a></li>
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="gallery">✨ 作品集</a></li>
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="about">🎀 關於我</a></li>
                <li class="nav-item"><a class="nav-link nav-ajax" data-page="reserve">✉️ 預約</a></li>
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item"><a class="nav-link" href="/dashboard.php">🔐 返回管理</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/pages/login.php">🔐 管理員登入</a></li>
                <?php endif; ?>
            </ul>
    </div>
  </div>
</nav>