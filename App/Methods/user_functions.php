<?php 
    namespace HNG_Internship\Methods;

?>

<?php
    class user_functions{


        public function redirect_to($location)
        {
            header("Location: " . $location);
            exit;
        }

        public function is_post_request() 
        {
            return $_SERVER['REQUEST_METHOD'] == 'POST';
        }
          
        
        public function find_by_sql($sql)
        {
            $result = self::$database->query($sql);
            if (!$result) {
                exit("Database Query Failed");
            }

            // turn results into object

            while($record = $result->fetch_assoc()){
                self::$object_array[] = self::instantiate($record);
            }

            $result->free();

            return self::$object_array;
        }
        
        protected static function instantiate($record) 
        {
      
          $object = new self;
          // Could manually assign values to properties
          // but automatically assignment is easier and re-usable
      
          foreach($record as $property => $value) {
      
            if(property_exists($object, $property)) {
      
              $object->$property = $value;
      
            }
      
          }
      
          return $object;
        }
    }

?>