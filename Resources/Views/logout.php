<?php require "../../vendor/autoload.php"; ?>
<?php

    use HNG_Internship\controller\Sessions;
    use HNG_Internship\Methods\user_functions;

    $sessions = new Sessions;
    $func = new user_functions;
    
    $sessions->logout();

    $func->redirect_to('/index.php');



?>
