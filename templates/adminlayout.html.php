<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?=$title?></title>
</head>
<body>
    <div class="app-container">
        <aside class="sidebar admin-sidebar">
            <div class="sidebar-header">
                <h1>Admin Area</h1>
            </div>
            

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="posts.php">Posts List</a></li>
                    <li><a href="addpost.php">Add Post</a></li>
                    <li><a href="modules.php">Manage Module</a></li>
                    <li><a href="contacts.php">View Contacts</a></li>
                    <li><a href="users.php">Manage Users</a></li>
                </ul>
            </nav>
            
            <div class="sidebar-footer">
                <a href="../index.php" class="admin-link">Back to Public Site</a>
                <p>&copy; 2026 Greenwich</p>
            </div>
        </aside>

        <main class="main-content">
            <?=$output?>
        </main>
    </div>
</body>
</html>
