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
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>Greenwich Posts</h1>
            </div>
            
            <div class="sidebar-search">
                <input type="text" placeholder="Search posts..." class="dummy-search">
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="posts.php">Post List</a></li>
                    <li><a href="modules.php">Modules</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
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