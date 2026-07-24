<h2>Add a New Post</h2>
<form action="" method="post">
    <label for="title">Post Title:</label>
    <input type="text" name="title" id="title">

    <label for="content">Type your Post content here:</label>
    <textarea name="content" rows="3" cols="40"></textarea>

    <label for="image_path">Type image file name:</label>
    <input type="text" name="image_path" id="image_path">
    <label for="user_id">Your name:</label>
    <input type="text" name="username" id="username" placeholder="enter your name" required>   

    <label for="user_id">Your email:</label>
    <input type="text" name="username" id="username" placeholder="enter your email" required>

    <label for="module_id">Module:</label>
    <select name="module_id" id="module_id">
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module['module_id'] ?>"><?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Add">
</form>