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

function updatePost($pdo, $postId, $title, $content, $image_path, $user_id, $module_id) {
    $query = 'UPDATE posts SET title = :title, content = :content, image_path = :image_path, user_id = :user_id, module_id = :module_id WHERE post_id = :id';
    $parameters = [
        ':title' => $title,
        ':content' => $content,
        ':image_path' => $image_path,
        ':user_id' => $user_id,
        ':module_id' => $module_id,
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

function getOrCreateUser($pdo, $username, $email) {
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

function getModule($pdo, $id) {
    $parameters = [':id' => $id];
    $sql = 'SELECT module_id, module_code, module_name FROM modules WHERE module_id = :id';
    $query = query($pdo, $sql, $parameters);
    return $query->fetch();
}

function insertModule($pdo, $module_code, $module_name) {
    $query = 'INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)';
    $parameters = [
        ':module_code' => $module_code,
        ':module_name' => $module_name
    ];
    query($pdo, $query, $parameters);
}

function updateModule($pdo, $module_id, $module_code, $module_name) {
    $query = 'UPDATE modules SET module_code = :module_code, module_name = :module_name WHERE module_id = :id';
    $parameters = [
        ':module_code' => $module_code,
        ':module_name' => $module_name,
        ':id' => $module_id
    ];
    query($pdo, $query, $parameters);
}
function deleteModule($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM posts WHERE module_id = :id', $parameters);
    query($pdo, 'DELETE FROM modules WHERE module_id = :id', $parameters);
}

function insertContact($pdo, $name, $email, $message) {
    $query = 'INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)';
    $parameters = [
        ':name' => $name,
        ':email' => $email,
        ':message' => $message
    ];
    query($pdo, $query, $parameters);
}

function allContacts($pdo) {
    $sql = 'SELECT contact_id, name, email, message FROM contacts';
    $contacts = query($pdo, $sql);
    return $contacts->fetchAll();
}

function deleteContact($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM contacts WHERE contact_id = :id', $parameters);
}
function getUser($pdo, $id) {
    $parameters = [':id' => $id];
    $sql = 'SELECT user_id, username, user_email FROM users WHERE user_id = :id';
    $query = query($pdo, $sql, $parameters);
    return $query->fetch();
}

function insertUser($pdo, $username, $email) {
    $query = 'INSERT INTO users (username, user_email) VALUES (:username, :email)';
    $parameters = [
        ':username' => $username,
        ':email' => $email
    ];
    query($pdo, $query, $parameters);
}

function updateUser($pdo, $id, $username, $email) {
    $query = 'UPDATE users SET username = :username, user_email = :email WHERE user_id = :id';
    $parameters = [
        ':username' => $username,
        ':email' => $email,
        ':id' => $id
    ];
    query($pdo, $query, $parameters);
}

function deleteUser($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM posts WHERE user_id = :id', $parameters);
    query($pdo, 'DELETE FROM users WHERE user_id = :id', $parameters);
}

function register($pdo, $username, $email, $password){
    $sql = 'INSERT INTO users (username, user_email, user_password) VALUES (:username,:email, :password)';
    $parameters = [
        ':username' => $username,
        ':email' => $email,
        ':password' => $password
    ];
    query($pdo, $sql, $parameters);
}

function getUserByEmail($pdo, $email) {
    $parameters = [':email' => $email];
    $sql = 'SELECT user_id, username, user_password FROM users WHERE user_email = :email';
    $query = query($pdo, $sql, $parameters);
    return $query->fetch();
}