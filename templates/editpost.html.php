<form action="" method="post">
    <input type="hidden" name="postid" value="<?= htmlspecialchars($post['post_id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    
    <label for="title">Edit Title:</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <label for="content">Edit your Post content here:</label>
    <textarea name="content" rows="3" cols="40"><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    
    <label for="image_path">Edit image file name:</label>
    <input type="text" name="image_path" id="image_path" value="<?= htmlspecialchars($post['image_path'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

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