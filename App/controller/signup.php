<?php 
    namespace HNG_Internship\controller;

    use HNG_Internship\Methods\functions;
    class signup {

        protected static $database;

        public static function setDB($database)
        {
            self::$database = $database;
        }


        static public function find_by_username($username) {
            $sql = "SELECT * FROM " . static::$table_name . " ";
            $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
            $obj_array = static::find_by_sql($sql);
            if(!empty($obj_array)) {
              return array_shift($obj_array);
            } else {
              return false;
            }
        }
    }
?>