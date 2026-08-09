<div class="form-card" style="max-width: 600px; margin: 20px auto;">
    <h2>Edit My Post</h2>
    <form action="editpost.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        <input type="hidden" name="postid" value="<?= htmlspecialchars($post['post_id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="old_image_path" value="<?= htmlspecialchars($post['image_path'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="content">Content:</label>
        <textarea name="content" rows="5" required><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        
        <label for="image_file">Change Image (Leave blank to keep current):</label>
        <input type="file" name="image_file" id="image_file" accept="image/*">
        
        <label for="module_id">Module:</label>
        <select name="module_id" id="module_id" required>
            <?php foreach ($modules as $module): ?>
                <option value="<?= $module['module_id'] ?>" <?php if ($module['module_id'] == ($post['module_id'] ?? '')) echo 'selected'; ?>>
                    <?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="submit" value="Save Changes">
    </form>
</div>