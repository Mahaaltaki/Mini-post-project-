<?php
require_once 'Database.php';
require_once 'posts.php';

// connect with Database
$database = new Database();
$db = $database->connect();

if (isset($_POST['submit'])) {
    // Assign POST values to variables
    $id = isset($_POST['id']) ? $_POST['id'] : null;  // Check if id is set for updating
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $post = new Post($db);
    $post->title = $title;
    $post->content = $content;
    $post->author = $author;

   // var_dump($post);
    //Create post
    if ($post->create($post->title, $post->content, $post->author)) {
        header("Location: list_post.php");
        exit();
    } else {
        echo "Failed to store the post.";
    }
}
?>
