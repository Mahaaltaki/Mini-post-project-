<?php
require_once 'Database.php';
class Post
{
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;
    public $updated_at;
    
    public function __construct($db){
        $this->conn=$db;
        }
    // public function __construct($db,$title,$content,$author){
    //     $this->conn=$db;
    //     $this->title=$title;
    //     $this->content=$content;
    //     $this->author=$author;
    //     }
    
    // create 
    public function create($title,$content,$author){
        $query = "INSERT INTO " . $this->table . " (title, content, author, created_at, updated_at) VALUES (:title, :content, :author, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);

        // cleen data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));

        
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':author', $this->author);

         if ($stmt->execute()) {
             return true;
         }

         return false;
    }

    //read with use id
    public function read($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->content = $row['content'];
            $this->author = $row['author'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
            return true;
        }

        return false;
    }

    // update
    public function update($id, $title, $content, $author) {
        $query = "UPDATE " . $this->table . " SET title = :title, content = :content, author = :author, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        // cleen data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));

        // link values
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // show all
    public function listAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        //var_dump($stmt);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // search 
public function searchByTitle($title)
{   
    $query = "SELECT * FROM " . $this->table . " WHERE title LIKE :title ORDER BY created_at DESC";
    $stmt = $this->conn->prepare($query);
    
    $searchTitle = "%" . htmlspecialchars(strip_tags($title)) . "%";
    $stmt->bindParam(':title', $searchTitle);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
}
