<?php 
    namespace HNG_Internship\model\database;

    use mysqli;
    use HNG_Internship\model\database\DBconst;

    class DB extends DBconst {

        public $connection;
        public $msg;

        public static function db_connection()
        {
            $connection = new mysqli(dbConst::DB_SERVER, dbConst::DB_USER, dbConst::DB_PASSWORD, dbConst::DB_NAME);
            static::confirm_db_connect($connection);
            return $connection;
        } 

        public static function confirm_db_connect($conn)
        {
            if($conn->connect_errno){
                $msg = "Database connection failed: ";
                $msg .= $conn->connect_error;
                $msg .= " (" . $conn->connect_errno . ") ";
                exit($msg);
            }
        }
        public function db_disconnect($connection) {
            if(isset($connection)) {
              $connection->close();
            }
          }

    }
?>