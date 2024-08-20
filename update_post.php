<?php
require_once 'Database.php';
require_once 'posts.php';

// connect with Database
$database = new Database();
$db = $database->connect();

if(isset($_POST['submit'])){
    

    // Assign POST values to variables
    $id=$_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $post = new Post($db);
    $post->id=$id;
    $post->title=$title;
    $post->content=$content;
    $post->author=$author;
    
   // var_dump($post);
    //Create post
    if ($post->update($_POST['id'],$_POST['title'], $_POST['content'], $_POST['author'])) {
        header("Location: list_post.php");
        exit();
    } else {
        echo "Failed to store the post.";
    }
}
?>
