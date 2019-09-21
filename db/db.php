<?php
class Db {
    private $db_host,
            $db_name,
            $db_username,
            $db_password;
    
    protected $conn;
    
    public function __construct(){
        $this->db_host = 'localhost';
        $this->db_name = 'hng_task1';
        $this->db_username = 'root';
        $this->db_password = NULL;
        // connect to db using pdo 
        try{
            $this->conn = new PDO(
                "mysql:host=$this->db_host;dbname=$this->db_name",
                $this->db_username,
                $this->db_password
            );
            // error mode exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }
        catch(PDOException $e){
            print 'Error: '.$e->getMessage();
        }
    }
}
?>