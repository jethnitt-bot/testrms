<header class="topbar">
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle sidebar">
        <i class="fa-solid fa-bars"></i>
    </button>

    <h1 class="page-title">Dashboard</h1>

    <div class="topbar-search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search anything...">
    </div>

    <div class="topbar-actions">
        <button class="icon-btn" aria-label="Notifications">
            <i class="fa-regular fa-bell"></i>
            <span class="dot"></span>
        </button>
        <div class="topbar-date">
            <i class="fa-regular fa-calendar"></i>
            <div>
                <strong><?= date('M d, Y') ?></strong>
                <span><?= date('l') ?></span>
            </div>
        </div>
    </div>
</header>
