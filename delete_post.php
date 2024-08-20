<?php
require_once 'Database.php';
require_once 'posts.php';
$database = new Database();
$db = $database->connect();
$post=new Post($db);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($post->delete($id)) {
        header("Location: list_post.php");
        exit();
    } else {
        echo "Failed to delete the post.";
    }
} else {
    echo "Invalid post ID.";

}
?>