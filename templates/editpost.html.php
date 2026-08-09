<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="postid" value="<?= htmlspecialchars($post['post_id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    
    <label for="title">Edit Title:</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <label for="content">Edit your Post Content here:</label>
    <textarea name="content" rows="3" cols="40"><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    
    <label for="image_file">Change Image (Leave blank to keep current):</label>
    <input type="file" name="image_file" id="image_file" accept="image/*">
    <p style="font-size: 13px; color: gray;">Current: <?= htmlspecialchars($post['image_path'] ?? 'None', ENT_QUOTES, 'UTF-8') ?></p>

    <label for="user_id">Author:</label>
    <select name="user_id" id="user_id" required>
        <?php foreach ($users as $user): ?>
            <option value="<?=$user['user_id']?>" 
            <?php if ($user['user_id'] == ($post['user_id'] ?? '')) echo 'selected'; ?>>
                <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <label for="module_id">Module:</label>
    <select name="module_id" id="module_id" required>
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module['module_id'] ?>"
            <?php if ($module['module_id'] == ($post['module_id'] ?? '')) echo 'selected'; ?>>
                <?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" value="Save">
</form>