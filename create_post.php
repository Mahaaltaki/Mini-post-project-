<?php
// require_once 'Database.php';
// require_once 'posts.php';

// // connect with Database
// $database = new Database();
// $db = $database->connect();
// $post = new Post($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add post</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
    Add Post
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>Add New Post</h3>
        <p class="text-muted">Complete the form below to add a new post</p>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="store.php" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="col">
                    <label class="form-label">Content:</label>
                    <input type="text" class="form-control" name="content" required>
                </div>
                <div class="col">
                    <label class="form-label">Author:</label>
                    <input type="text" class="form-control" name="author" required>
                </div>
            </div>
            
            
            <?php
               include_once 'store.php';
            ?>
            
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
