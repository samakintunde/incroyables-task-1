<?php
    namespace HNG_Internship\controller;

    use HNG_Internship\model\database\DB;
    use HNG_Internship\model\userModel;
    use HNG_Internship\model\databaseModel;

?>

<?php

    class controller extends userModel {

        protected static $database;
        public $email;

    
        public static function getDB()
        {
            self::$database = DB::db_connection();
            databaseModel::setDB(self::$database);
        }
        
        public function login()
        {
            return parent::findEmail($this->email);
        }

        public function save()
        {
            return parent::create();
        }



    }

?>