<?php
    namespace HNG_Internship\controller;

    use HNG_Internship\model\database\DB;
    use HNG_Internship\model\userModel;
    use HNG_Internship\model\databaseModel;

?>

<?php

    class controller extends userModel {

        protected static $database;
        
      //  public static $email;

    
        public static function getDB(){
            self::$database = DB::db_connection();
            databaseModel::setDB(self::$database);
        }
        
        
        public function login($email, $password){
            $chechEmail = parent::findEmail($email);
            $cheakPassword = $this->findPassword($email);
          

            if ($chechEmail != false && $cheakPassword == $password) {
              return true;
             
            }else{
                return false;
            }

        }

        public function save(){
            return parent::create();
        }

        public function findPassword($email) {
            $sql = "SELECT password From users WHERE email= '$email'";
            $result = mysqli_query(self::$database, $sql);
            if($result){
                $count = mysqli_num_rows($result);
                if ($count < 1) {
                    return false;
                }else{
                    $row = mysqli_fetch_assoc($result);
                  return  $password = $row['password'];
                   
                }
            }else{
                die(mysqli_error(self::$database));
            }

        }
       
    }

?>