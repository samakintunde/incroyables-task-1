<?php
namespace HNG_Internship\controller;
use HNG_Internship\Methods\user_functions;

class Sessions {

  private $user_id;
  private $fullname;
  private $last_login;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day

  public function __construct() {
    if(session_status() == PHP_SESSION_NONE){
        //session has not started
        session_start();
    }
    $this->check_stored_login();
  }

  public function login($user) {
    if($user) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->fullname = $_SESSION['fullname'] = $user->fullname;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  

  public function is_logged_in() {
    // return isset($this->admin_id);
    return isset($this->user_id) && $this->last_login_is_recent();
  }

  public function require_login() {
      if(!isset($_SESSION['fullname'])) {
        user_functions::redirect_to('/HNG_Internship/index.php');
      } else {
         // Do nothing
      }	
      
  }
  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['last_login']);
    unset($this->user_id);
    unset($this->fullname);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login() {
    if(isset($_SESSION['user_id'])) {
      $this->admin_id = $_SESSION['user_id'];
      $this->username = $_SESSION['fullname'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

}

?>
