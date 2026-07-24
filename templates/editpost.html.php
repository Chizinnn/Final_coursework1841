<form action="" method="post">
    <input type="hidden" name="postid" value="<?= htmlspecialchars($post['post_id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    
    <label for="title">Edit Title:</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($post['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <label for="content">Edit your Post content here:</label>
    <textarea name="content" rows="3" cols="40"><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    
    <label for="image_path">Edit image file name:</label>
    <input type="text" name="image_path" id="image_path" value="<?= htmlspecialchars($post['image_path'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <input type="submit" name="submit" value="Save">
</form>