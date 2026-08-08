<form action="" method="post" enctype="multipart/form-data" class="form-card">
    <label for="title">Post Title:</label>
    <input type="text" name="title" id="title">

    <label for="content">Type your Post content here:</label>
    <textarea name="content" rows="3" cols="40"></textarea>

    <label for="image">Upload Image:</label>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg, image/gif">

    <label for="module_id">Module:</label>
    <select name="module_id" id="module_id">
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module['module_id'] ?>"><?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Add">
</form>