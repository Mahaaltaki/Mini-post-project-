<?php
require_once 'Database.php';
require_once 'posts.php';

// connect with Database
$database = new Database();
$db = $database->connect();
$post=new Post($db);

if (isset($_POST['search'])) {
    $search = $_POST['search'];
        $sql=$post->searchByTitle($search);

?>
<!DOCTYpostE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Post</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:pink;">
    One POSTS
</nav>
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
                foreach($sql as $sq){
                    echo
               
                     "<tr>
                            <td>$sq[id]</td>
                            <td>$sq[title]</td>
                            <td>$sq[content]</td>
                            <td>$sq[author]</td>
                            <td>$sq[created_at]</td>
                            <td>$sq[updated_at]</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No posts available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
