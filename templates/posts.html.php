<div class="welcome-home-page" style="padding: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
    <h2>List of All Posts</h2>
    
    <a href="addpost.php">
        <button type="button">+ Add a new Post</button>
    </a>
</div>
<?php if (isset($error)): ?>
    <div class="errors">
        <p><?= $error ?></p>
    </div>
<?php else: ?>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 150px;">Image</th>
                <th>Post Content</th>
                <th style="width: 180px;">Author & Date</th>
                <?php if (!empty($isAdmin) || isset($_SESSION['user_id'])): ?>
                <th style="width: 200px;">Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td>
                    <?php if (!empty($post['image_path'])): 
                        $img_dir = !empty($isAdmin) ? '../images/' : 'images/';
                    ?>
                        <img src="<?= $img_dir ?><?= htmlspecialchars($post['image_path'], ENT_QUOTES, 'UTF-8') ?>" alt="Post Image" style="width: 100%; border-radius: 8px; object-fit: cover;" />
                    <?php else: ?>
                        <span style="color: var(--text-muted); font-style: italic;">No image</span>
                    <?php endif; ?>
                </td>
                
                <td>
                    <div style="display: inline-block; background: #f1f5f9; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; color: var(--text-muted); margin-bottom: 8px;">
                        <?= htmlspecialchars($post['module_name'] ?? 'General', ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <div style="font-weight: 700; font-size: 18px; margin-bottom: 10px; color: var(--text-main);">
                        <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <div style="color: var(--text-main); line-height: 1.6; font-size: 14px;">
                        <?= nl2br(htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8')) ?>
                    </div>
                </td>
                
                <td>
                    <div style="font-size: 14px; margin-bottom: 5px;">
                        <strong>By:</strong> <a href="mailto:<?= htmlspecialchars($post['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" style="color: var(--primary); text-decoration: none;">
                        <?= htmlspecialchars($post['username'] ?? 'Anonymous', ENT_QUOTES, 'UTF-8'); ?></a>
                    </div>
                    <div style="font-size: 13px; color: var(--text-muted);">
                        <?php $display_date = date('D d M Y', strtotime($post['post_date'])); ?>
                        <?= htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                </td>
                
                <?php if (!empty($isAdmin) || (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id'])): ?>
                <td>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <a href="editpost.php?id=<?= $post['post_id'] ?>" class="edit-link" style="padding: 10px 16px;">Edit</a>
                        
                        <form action="deletepost.php" method="post" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="delete-btn" style="margin-top: 0; padding: 10px 16px;">Delete</button>
                        </form>
                    </div>
                </td>
                <?php elseif (!empty($isAdmin) || isset($_SESSION['user_id'])): ?>
                <td>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>
</div>