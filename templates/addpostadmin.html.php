<div class="welcome-home-page" style="padding: 30px;">
    <h2>Add Post</h2>
    
    <div class="form-card">
        <form action="" method="post" style="display: flex; flex-direction: column; gap: 20px;">
            <div>
                <label for="title" style="display: block; margin-bottom: 8px;">Post Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            
            <div>
                <label for="content" style="display: block; margin-bottom: 8px;">Post Content:</label>
                <textarea name="content" id="content" rows="4" required></textarea>
            </div>
            
            <div>
                <label for="image_path" style="display: block; margin-bottom: 8px;">Image File Name:</label>
                <input type="text" name="image_path" id="image_path">
            </div>
            
            <!-- DROPDOWN CHỌN TÁC GIẢ -->
            <div>
                <label for="user_id" style="display: block; margin-bottom: 8px;">Author:</label>
                <select name="user_id" id="user_id" required>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['user_id'] ?>"><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div>
                <label for="module_id" style="display: block; margin-bottom: 8px;">Module:</label>
                <select name="module_id" id="module_id" required>
                    <?php foreach ($modules as $module): ?>
                        <option value="<?= $module['module_id'] ?>"><?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <input type="submit" name="submit" value="Add Post" style="width: fit-content;">
        </form>
    </div>
</div>