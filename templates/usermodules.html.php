<div class="welcome-home-page" style="padding: 30px;">
    <h2>Available Modules</h2>
    
    <?php if (empty($modules)): ?>
        <p>No modules available.</p>
    <?php else: ?>
        <div class="grid-list">
            <?php foreach ($modules as $module): ?>
            <div class="post-card">
                <div class="post-badge">
                    <?= htmlspecialchars($module['module_code'], ENT_QUOTES, 'UTF-8') ?>
                </div>
                <h3><?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>