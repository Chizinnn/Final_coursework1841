<?php
function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function allPosts($pdo) {
    $sql = 'SELECT posts.post_id, posts.title, posts.CONTENT AS content, posts.IMAGE_PATH AS image_path, posts.post_date, users.username, users.user_email, modules.module_name 
            FROM posts 
            LEFT JOIN users ON posts.user_id = users.user_id 
            LEFT JOIN modules ON posts.module_id = modules.module_id';
    $posts = query($pdo, $sql);
    return $posts->fetchAll();
}

function getPost($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT post_id, title, CONTENT AS content, IMAGE_PATH AS image_path, post_date, user_id, module_id FROM posts WHERE post_id = :id', $parameters);
    return $query->fetch();
}


function getorcreateuser($pdo, $username, $email){
    $parameters = [':username' => $username];
    $query = query($pdo, 'SELECT user_id FROM users WHERE username = :username LIMIT 1', $parameters);
    $row = $query->fetch();
    if ($row) {
        return $row['user_id'];
    }
    $insertQuery = 'INSERT INTO users (username, user_email) VALUES (:username, :email)';
    $insertParams = [
        ':username' => $username,
        ':email' => $email
    ];
    query($pdo, $insertQuery, $insertParams);
    
    return $pdo->lastInsertId();
}


function totalPosts($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM posts');
    $row = $query->fetch();
    return $row[0];
}

function insertPost($pdo, $title, $content, $image_path, $user_id, $module_id) {
    $query = 'INSERT INTO posts (title, content, image_path, post_date, user_id, module_id)
              VALUES (:title, :content, :image_path, CURDATE(), :user_id, :module_id)';
    $parameters = [
        ':title' => $title,
        ':content' => $content,
        ':image_path' => $image_path,
        ':user_id' => $user_id,
        ':module_id' => $module_id
    ];
    query($pdo, $query, $parameters);
}

function updatePost($pdo, $postId, $title, $content, $image_path) {
    $query = 'UPDATE posts SET title = :title, content = :content, image_path = :image_path WHERE post_id = :id';
    $parameters = [
        ':title' => $title,
        ':content' => $content,
        ':image_path' => $image_path,
        ':id' => $postId
    ];
    query($pdo, $query, $parameters);
}

function deletePost($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM posts WHERE post_id = :id', $parameters);
}

function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM users');
    return $users->fetchAll();
}

function allModules($pdo) {
    $modules = query($pdo, 'SELECT * FROM modules');
    return $modules->fetchAll();
}
