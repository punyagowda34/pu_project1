<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!-- NAV -->
<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="index.php" class="logo">
                <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="genre.php">Genre</a></li>
                <li><a href="movies.php">Movies</a></li>
                <li><a href="series.php">Series</a></li>
                <li><a href="about.php">About</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li>
                        <a href="profile.php">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li><a href="register.php" class="btn btn-hover"><span>Sign in</span></a></li>
                <?php endif; ?>
            </ul>
            <!-- MOBILE MENU TOGGLE -->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</div>
<!-- END NAV -->
