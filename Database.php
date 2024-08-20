
<?php
use Illuminate\Support\Facades\DB;

class Database 
{
    private $servername = "localhost";
    private $db_name = "blog_db";
    private $username = "root"; 
    private $password = ""; 
    private $conn;
    
    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;}
    //excute the query 
   public function execute($query, $params = [])
   {
       $stmt = $this->conn->prepare($query);
       $stmt->execute($params);
       return $stmt;
   }
    //bring  data from database
    public function fetchAll($query, $params = [])
    {
        $stmt = $this->execute($query, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // bring one record
    public function fetch_record($query, $params = [])
    {
        $stmt = $this->execute($query, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    }
       
    
    
    
    
    


?>