<?php
include_once 'store.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Post</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
    Edit Post
</nav>
<?php
require_once 'Database.php';
require_once 'posts.php';
$database = new Database();
$db = $database->connect();
$post=new Post($db);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="Select * from `posts` where `id`=$id";
    $row = $database->fetch_record($sql);
    // $post->title=$row['title'];
    // $post->content=$row['content'];
    // $post->author=$row['author'];
    
 //var_dump($row);
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $title = $_POST['title'];
//         $content = $_POST['content'];
//         $author = $_POST['author'];
// if ($post->update($row['id'], $row['title'], $row['content'], $row['author'])) {
//     header("Location: list_post.php");
//     exit();
//  } else {
//      echo "Failed to update post.";
//  }
//   }
//  else {
//     echo "Post not found.";
 }

?>
<div class="container">
    <div class="text-center mb-4">
        <h3>Edit Post</h3>
        <p class="text-muted">Complete the form below to edit post</p>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="update_post.php" method="post" style="width:50vw; min-width:300px;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" value="<?php  echo $row['title']; ?>" required>
                </div>
                <div class="col">
                    <label class="form-label">Content:</label>
                    <input type="text" class="form-control" name="content" value="<?php  echo $row['content']; ?>" required>
                </div>
                <div class="col">
                    <label class="form-label">Author:</label>
                    <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>
                    " required>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
