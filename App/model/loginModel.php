<?php
    namespace HNG_Internship\model;

    use HNG_Internship\model\DatabaseModel;

    class loginModel extends databaseModel {

      public function findEmail($email)
      {
        return parent::find_by_username($email);
      }
            
    }

?>