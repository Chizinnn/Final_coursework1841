<h2>Lists all of Posts</h2>
<?php if (isset($error)): ?>
    <div class="errors">
        <p><?= $error ?></p>
    </div>
<?php else: ?>

    <div class="grid-list">
        <?php foreach ($posts as $post): ?>
            <div class="post-card"> 
                
                <?php if (!empty($post['image_path'])): 
                    $img_dir = !empty($isAdmin) ? '../images/' : 'images/';
                ?>
                <div class="post-image-col">
                    <img class="post-image" src="<?= $img_dir ?><?= htmlspecialchars($post['image_path'], ENT_QUOTES, 'UTF-8') ?>" alt="Post Image"/>
                </div>
                <?php endif; ?>

                <div class="post-content-col">
                    <div class="post-badge">
                        <?= htmlspecialchars($post['module_name'] ?? 'General', ENT_QUOTES, 'UTF-8') ?>
                    </div>

                    <div class="post-title">
                        <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    
                    <div class="post-meta">
                        By <a href="mailto:<?= htmlspecialchars($post['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        <?= htmlspecialchars($post['username'] ?? 'Anonymous', ENT_QUOTES, 'UTF-8'); ?></a> 
                        |
                        <?php $display_date = date('D d M Y', strtotime($post['post_date'])); ?>
                        <?= htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') ?>
                    </div>

                    <div class="post-excerpt">
                        <?php 
                            $content = $post['content'] ?? '';
                            if (strlen($content) > 120) {
                                echo htmlspecialchars(substr($content, 0, 120), ENT_QUOTES, 'UTF-8') . '...';
                            } else {
                                echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
                            }
                        ?>
                    </div>

                    <?php if (!empty($isAdmin)): ?>
                    <div class="post-actions">
                        <a href="editpost.php?id=<?= $post['post_id'] ?>" class="edit-link">Edit</a>
                        
                        <form action="deletepost.php" method="post" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>