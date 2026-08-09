<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?=$title?></title>
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>Greenwich Hub</h1>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="posts.php">Post List</a></li>
                    <li><a href="modules.php">Modules</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <hr style="margin: 15px 0; border: 0; border-top: 1px solid #ddd;">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li style="padding: 10px 15px; color: #555;">Hello, <b><?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></b></li>
                        <li><a href="logout.php" style="color: red;">Log out</a></li>
                    <?php else: ?>
                        <li><a href="userlogin.php" style="color: #2bb673; font-weight: bold;">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            
            <div class="sidebar-footer">
                <a href="admin/login/login.html" class="admin-link">Admin Area</a>
                <p>&copy; 2026 Greenwich</p>
            </div>
        </aside>

        <main class="main-content">
            <?=$output?>
        </main>
    </div>
</body>
</html>