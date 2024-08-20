<?php
require_once 'Database.php';
require_once 'posts.php';

// connect with Database
$database = new Database();
$db = $database->connect();
$post = new Post($db);
// show all
$posts = $post->listAll();
?>
<!DOCTYpostE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Posts</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:pink;">
    All POSTS
</nav>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="one_post.php" method="post">
              <div class="input-group mb-3">
                 <input type="text"  class="form-control" 
                   name="search" placeholder="search here ..">
                 <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
        </div>
    </div>
  </div>
<div class="container">
    <a href="create_post.php" class="btn btn-dark mb-3">Add post</a>

    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index=0;
            if (isset($posts)) {
    ;           foreach ($posts as $post) { {
                $index+=1;
                    echo "<tr>
                            <td>$index</td>
                            <td>$post[title]</td>
                            <td>$post[content]</td>
                            <td>$post[author]</td>
                            <td>$post[created_at]</td>
                            <td>$post[updated_at]</td>
                            
                            <td>
                                <a href='delete_post.php?id={$post['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                <a href='edit_post.php?id={$post['id']}' class='btn btn-primary btn-sm'>Edit</a>
                            </td>
                          </tr>";
                }}
            } else {
                echo "<tr><td colspan='5' class='text-center'>No students available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
