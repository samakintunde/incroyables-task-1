<?php
    namespace HNG_Internship\model;

    use HNG_Internship\model\databaseModel;

    class signupModel extends databaseModel {

        
        protected static $database;
        protected static $table_name = "users";
        static protected $db_columns = ['id', 'fullname', 'email', 'password'];

        public $id;
        public $fullname;
        public $email;
        protected $hashed_password;
        public $password;
        protected $password_required = true;


        public function __construct($args=[]) {
            $this->fullname = $args['fullname'] ?? '';
            $this->email = $args['email'] ?? '';
            $this->password = $args['password'] ?? '';
          }
        
          public function full_name() {
            return $this->first_name . " " . $this->last_name;
          }
        
          protected function set_hashed_password() {
            $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
          }
        
          protected function save() {
            $this->set_hashed_password();
            return parent::create();
          }

            
    }

?>


signupModel