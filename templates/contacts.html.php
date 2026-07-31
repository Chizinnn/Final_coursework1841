<div class="welcome-home-page" style="padding: 30px;">
    <h2>Contact Messages</h2>
    
    <?php if (empty($contacts)): ?>
        <p>There are currently no messages from the user.</p>
    <?php else: ?>
        
        <?php foreach ($contacts as $msg): ?>
        <div class="post-card" style="margin-bottom: 20px;">
            
            <div class="post-title">
                <?= htmlspecialchars($msg['name'], ENT_QUOTES, 'UTF-8') ?>
            </div>
            
            <div class="post-meta">
                Email: <a href="mailto:<?= htmlspecialchars($msg['email'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($msg['email'], ENT_QUOTES, 'UTF-8') ?>
                </a>
            </div>
            
            <p>
                <?= htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8') ?>
            </p>
            
            <div class="post-actions">
                <form action="deletecontact.php" method="post" style="margin: 0;" onsubmit="return confirm('Are you sure?');">
                    <input type="hidden" name="id" value="<?= $msg['contact_id'] ?>">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
            
        </div>
        <?php endforeach; ?>
        
    <?php endif; ?>
</div>  