<div class="welcome-home-page" style="padding: 30px;">
    <h2>Edit User</h2>
    
    <div class="form-card">
        <form action="" method="post" style="display: flex; flex-direction: column; gap: 20px;">
            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

            <div>
                <label for="username" style="display: block; margin-bottom: 8px;">Username:</label>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div>
                <label for="email" style="display: block; margin-bottom: 8px;">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['user_email'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <input type="submit" name="submit" value="Update User" style="width: fit-content;">
        </form>
    </div>
</div>