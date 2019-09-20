<?php 
    namespace HNG_Internship\model;

    class userModel extends databaseModel{

      protected static $database;
      protected static $table_name = "users";
      static protected $db_columns = ['id', 'fullname', 'email', 'password'];

      public $id;
      public $fullname;
      public $email;
      protected $hashed_password;
      public $password;



      public function setArgs($args=[]) {
          $this->fullname = $args['fullname'] ?? '';
          $this->email = $args['email'] ?? '';
          $this->password = $args['password'] ?? '';
         
      }
      
        public function full_name() {
          return $this->first_name . " " . $this->last_name;
        }
      
        protected function set_hashed_password() {
          $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        }

      
        
        public function findEmail($email)
        {
          return parent::find_by_email($email);
        }

        protected function create() {
          $this->set_hashed_password();
          return parent::create();
          
        }

    }

?>