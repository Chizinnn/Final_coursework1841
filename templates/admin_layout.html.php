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
        <!-- Sidebar -->
        <aside class="sidebar admin-sidebar">
            <div class="sidebar-header">
                <h1>Admin Area</h1>
            </div>
            
            <div class="sidebar-search">
                <input type="text" placeholder="Search posts..." class="dummy-search">
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="posts.php">Posts List</a></li>
                    <li><a href="addpost.php">Add Post</a></li>
                </ul>
            </nav>
            
            <div class="sidebar-footer">
                <a href="../index.php" class="admin-link">Back to Public Site</a>
                <p>&copy; 2026 Greenwich</p>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <?=$output?>
        </main>
    </div>
</body>
</html>
