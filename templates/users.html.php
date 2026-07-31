<div class="welcome-home-page" style="padding: 30px;">
    <!-- Phần tiêu đề và nút thêm mới -->
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
        <h2 style="margin: 0;">Manage Users</h2>
        <a href="adduser.php">
            <button type="button">+ Add New User</button>
        </a>
    </div>

    <?php if (empty($users)): ?>
        <p>Don't have any users</p>
    <?php else: ?>
        <div class="grid-list">
            <?php foreach ($users as $user): ?>
            <div class="post-card">
                
                <div class="post-title">
                    <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>
                </div>
                
                <div class="post-meta">
                    <?= htmlspecialchars($user['user_email'], ENT_QUOTES, 'UTF-8') ?>
                </div>
                
                <div class="post-actions">
                    <a href="edituser.php?id=<?= $user['user_id'] ?>" class="edit-link">Edit</a>
                    
                    <form action="deleteuser.php" method="post" style="margin: 0;" onsubmit="return confirm('Waring: Are you sure?');">
                        <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </div>
                
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>