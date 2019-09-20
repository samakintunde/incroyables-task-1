<?php 
    namespace HNG_Internship\model;

    use HNG_Internship\model\database\DB;
    use HNG_Internship\model\loginModel;

    class iniatialize{

        public static $database;

        public static function getDBconnection()
        {
            self::$database = DB::db_connection();

            return  self::$database;
        }

    }
?>