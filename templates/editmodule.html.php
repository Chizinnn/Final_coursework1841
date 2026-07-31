<div class="welcome-home-page" style="padding: 30px;">
    <h2>Edit Module</h2>
    
    <div class="form-card">
        <form action="" method="post" style="display: flex; flex-direction: column; gap: 20px;">
            <input type="hidden" name="module_id" value="<?= $module['module_id'] ?>">

            <div>
                <label for="module_code" style="display: block; margin-bottom: 8px;">Module Code:</label>
                <input type="text" name="module_code" id="module_code" value="<?= htmlspecialchars($module['module_code'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div>
                <label for="module_name" style="display: block; margin-bottom: 8px;">Module Namelabel>
                <input type="text" name="module_name" id="module_name" value="<?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <input type="submit" name="submit" value="Update Module" style="margin-top: 10px; width: fit-content;">
        </form>
    </div>
</div>