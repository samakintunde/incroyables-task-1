<?php
include_once 'db/db.php';

class Processor extends Db{
    protected $query,
                $table_name = 'users';

    function Signup_process($data = array()){
        // check for empty fields
        $this->ValidateEmpty($data);
        
        // check if email format is right
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            throw new Exception('Invalid E-mail Provided');
        }
        
        // encrypt password
        $data['pass'] = sha1($data['pass']);
        
        // check if user with provided email exists... 
        if($this->countRows($this->table_name, array('email' => $data['email'])) > 0){
            throw new Exception('E-mail provided is already registered');
        }
        
        // store new user
        if(!$this->insertData($this->table_name, $data)){
            throw new Exception('Unable to complete registration at the moment');
        }
    }
    
    function Signin_process($data = array()){
        // check for empty fields
        $this->ValidateEmpty($data);
        
        // check if user is registered
        $user_data = $this->selectData(
            "*",
            $this->table_name,
            $data,
            NULL,
            NULL
        );
        
        if(empty($user_data)){
            throw new Exception('Invalid Sign In Credentials');
        }
        
        // create user graph session
        $_SESSION['user_graph'] = array(
            'name' => $user_data['name'],
            'email' => $user_data['email']
        );
    }
    
    private function ValidateEmpty($data){
        foreach($data as $key => $value){
            if($value == ''){
                throw new Exception('Empty fields detected');
            }
        }
    }
    
    private function iniparamvalues($data){
        $i = 1;
        $array_value = count($data);

        // init bind param where
        $bind_param_data_key = NULL;
        $bind_param_data_value = NULL;
        foreach($data as $key => $value){
            // check for last array element and append sql "and" keyword

            $query_append = ($i < $array_value) ? ', ' : '';
            $bind_param_data_key .= $key.$query_append;
            $bind_param_data_value .= ':'.$key.$query_append;
            $i++;
        }
        
        $cols_vals = "($bind_param_data_key) values($bind_param_data_value)";
        return $cols_vals;
    }
    
    private function cusBindparam($data){
        foreach($data as $key => &$value){
            $this->query->bindParam(':'.$key, $value);
        }
    }
    
    private function s_iniParamvalues($where){
        if($where == NULL){
            $return = NULL;
        }
        else{
            $i = 1;
            $array_value = count($where);
            $not_equal = NULL;

            // init bind param where
            $bind_param_where = '';
            // allowed clauses
            $clauses = array("LIKE");
            foreach($where as $key => $value){
                // check for last array element and append sql "and" keyword
                // check where clause extension
                $clause = explode(" ", $value);
                $not_equal = (strpos($value, "!") !== FALSE) ? "!" : NULL;
                
                if(strpos($key, "or=") !== FALSE){
                    $joiner = " OR ";
                    $key = str_replace("or= ", NULL, $key);
                }
                else{
                    $joiner = " AND ";
                }
                
                
                if(count($clause) > 1){
                    $clause = $clause[0];
                    $clause = (in_array($clause, $clauses)) ? $clause : "=";
                    $query_append = ($i == $array_value) ? '' : $joiner;
                    $bind_param_where .= $key. " $clause ? ".$query_append;  
                }
                else{
                    $query_append = ($i == $array_value) ? '' : $joiner;
                    $bind_param_where .= $key. " $not_equal= ? ".$query_append;   
                }
                $i++;
            }
            
            
            if(strpos($bind_param_where," OR ") !== FALSE){
                // convert where parameter to array
                $bind_param_where = explode(" AND ",$bind_param_where);
                // get last element index;
                $last_el_or = count($bind_param_where)-1;
                
                // loop through each array element and check before the
                for($i=0; $i<=$last_el_or;$i++){
                    // check for string with AND clause
                    if(strpos($bind_param_where[$i]," OR ") !== FALSE){
                        // convert string to array
                        $string_with_or = explode(" OR ",$bind_param_where[$i]);
                        // get the last 'and' element
                        $last_el = count($string_with_or)-1;
                        $string_with_or[0] = "(".$string_with_or[0];
                        $string_with_or[$last_el] = $string_with_or[$last_el].")";
                        
                        // push back to bind_param_where array after construction
                        $bind_param_where[$i] = implode(" OR ", $string_with_or);
                    }
                }
                
                $bind_param_where = implode(" AND ",$bind_param_where);
            }

            $return = "WHERE $bind_param_where";
        }
        return $return;
    }
    
    private function s_cusBindparam($where){
        if(is_array($where)){
            $i = 1;
            foreach($where as $key => &$value){
                if(strpos($value, "LIKE") !== FALSE){
                    $value = "%".str_replace("LIKE ", NULL, $value)."%";
                }
                else if(strpos($value, "!") !== FALSE){
                    $value = str_replace("!",NULL,$value);
                }
                $this->query->bindParam($i, $value);
                $i++;
            }
        }
    }
    
    private function insertData($table_name, $data){
        $bind_param_data = $this->iniparamvalues($data);
        
        $sql = "INSERT INTO $table_name $bind_param_data";
        $this->query = $this->conn->prepare($sql);
        
        
        // bind param
        $this->cusBindparam($data);
        
        // execute
        if($this->query->execute()){
            return TRUE;
        }
        else{
            return FALSE;
        }
        
        $this->conn = NULL; 
    }
    
    private function countRows($table_name, $where=NULL, $inner_column_append = NULL, $column = NULL){
        // initialize param values
        $bind_param_where = $this->s_iniParamvalues($where);
        
        // check where param
        $clause_app = ($where == NULL) ? 'WHERE' : 'AND ';

        $inner_column_append = ($inner_column_append == NULL) ? NULL : "$clause_app $inner_column_append";
        // redefine bind_param_where var
        $column = $column == NULL ? "*" : $column;
        $sql = "SELECT COUNT($column) FROM $table_name $bind_param_where $inner_column_append";
        $this->query = $this->conn->prepare($sql);

        // bind param
        $this->s_cusBindparam($where);

        // execute query
        $this->query->execute();

        return $this->query->fetchColumn();
        $this->conn = NULL; 
    }
    
    private function selectData($columns, $table_name, $where, $sorttype, $limit, $inner_column_append = NULL){
        // initialize param values
        $bind_param_where = $this->s_iniParamvalues($where);

        // redefine bind_param_where var
        $bind_param_where = $bind_param_where;
        

        // check where param
        $clause_app = ($where == NULL) ? 'WHERE' : 'AND ';
        $inner_column_append = ($inner_column_append == NULL) ? NULL : "$clause_app $inner_column_append";
        $sql = "SELECT $columns FROM $table_name $bind_param_where $inner_column_append $sorttype $limit";
        
        $this->query = $this->conn->prepare($sql);

        // bind param
        $this->s_cusBindparam($where);

        // execute query
        $this->query->execute();
        
        return $this->query->fetch(PDO::FETCH_ASSOC);
        $this->conn = NULL; 
    }
}
?>