<?php
// include config file
include_once 'config.php';

// include class for processing signup script
include_once 'processor.php';

// signup up process
if(isset($_POST['signup_btn'])){
    try{
        $data = array(
            'name' => $_POST['name'],    
            'email' => $_POST['email'],    
            'pass' => $_POST['pass']  
        );
        
        // define preserved vars
        $name = $data['name'];
        $email = $data['email'];
        
        $sign_up = new Processor;
        $sign_up->Signup_process($data);
        
        // output html feed
        $_SESSION['feed'] = '<div class="alert alert-success">
                                Welcome to LES INCROYABLES<br />
                                Your Registration was successful<br />
                                You can Sign In to your account below
                            </div>';
        
        // redirect user back to self
        header('Location:'.BASE_URL);
        exit;
    }
    catch(Exception $e){
        $_SESSION['feed'] = '<div class="alert alert-warning">'.$e->getMessage().'</div>';
    }
}
else{
    $name = NULL;
    $email = NULL;
}


// Sign in process
if(isset($_POST['signin_btn'])){
    try{
        $data = array(   
            'email' => $_POST['email'],    
            'pass' => sha1($_POST['pass'])
        );
        
        $sign_in = new Processor;
        $sign_in->Signin_process($data);
        
        // redirect user to landing page after successful validation
        header('Location:'.BASE_URL.'landing.php');
        exit;
    }
    catch(Exception $e){
        $_SESSION['feed'] = '<div class="alert alert-warning">'.$e->getMessage().'</div>';
    }
}

// process signout
if(isset($_GET['signout'])){
    // check if signout is true
    $signout_val = $_GET['signout'];
    if($signout_val == 'true'){
        unset($_SESSION['user_graph']);
        // output html feed
        $_SESSION['feed'] = '<div class="alert alert-success">You are now signed out...</div>';
        // redirect
        header('Location:'.BASE_URL);
        exit;
    }
}
?>