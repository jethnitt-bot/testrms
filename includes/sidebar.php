<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-badge"><i class="fa-solid fa-utensils"></i></div>
        <div class="logo-text">
            <strong>RMS</strong>
            <span>Restaurant Management System</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <?php foreach ($sidebarMenu as $item): ?>
            <a href="<?= htmlspecialchars($item['href']) ?>"
               class="nav-item <?= !empty($item['active']) ? 'active' : '' ?>">
                <i class="fa-solid <?= htmlspecialchars($item['icon']) ?>"></i>
                <span><?= htmlspecialchars($item['label']) ?></span>
            </a>
        <?php endforeach; ?>

        <a href="#" class="nav-item logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </nav>

    <div class="sidebar-user">
        <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
        <div class="user-info">
            <strong>Admin</strong>
            <span>Administrator</span>
        </div>
        <i class="fa-solid fa-chevron-down user-caret"></i>
    </div>
</aside>
