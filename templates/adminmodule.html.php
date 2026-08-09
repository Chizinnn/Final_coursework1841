<div class="welcome-home-page" style="padding: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Manage Modules</h2>
        <a href="addmodule.php" style="background: var(--primary); color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600;">+ Add New Module</a>
    </div>

    <?php if (empty($modules)): ?>
        <p>There are no subjects in the database yet.</p>
    <?php else: ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Module Code:</th>
                    <th>Module Name</th>
                    <th style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modules as $module): ?>
                <tr>
                    <td>
                        <strong><?= htmlspecialchars($module['module_code'], ENT_QUOTES, 'UTF-8') ?></strong>
                    </td>
                    <td>
                        <?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <td>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <a href="editmodule.php?id=<?= $module['module_id'] ?>" class="edit-link">Edit</a>
                                                        <form action="deletemodule.php" method="post" style="margin: 0;" onsubmit="
                                                        return confirm('WARNING: Deleting this subject will delete ALL posts belonging to the subject. Are you sure?');">
                                <input type="hidden" name="id" value="<?= $module['module_id'] ?>">
                                <button type="submit" class="delete-btn" style="margin-top: 0; padding: 12px 24px; font-size: 15px;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>