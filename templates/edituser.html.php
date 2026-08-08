<div class="welcome-home-page" style="padding: 30px;">
    <h2>Edit User</h2>
    
    <form action="" method="post" class="form-card">
        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['user_email'], ENT_QUOTES, 'UTF-8') ?>" required>
        
        <input type="submit" name="submit" value="Update User">
    </form>
</div>