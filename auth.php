<?php
include('db.php');


class Auth {


  public function signUp($name, $email, $password) {
    
    executeQuery("INSERT INTO users (email, password) VALUES ('$email', '$password')");
    $user = fetch("select * from users where email='$email'");
    executeQuery("INSERT INTO profiles (name, user_id) VALUES ('$name', '$user[id]')");
    $user['name'] = $name;
    $_SESSION['current_user'] = $user;
    header("Location: http://localhost:1234/home.php");
    exit();
  }

  public static function getAuthInstance() {
    return new Auth();
  }

  public function signIn($email, $password){

    $user = fetch("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
      if (!empty($user)) {

        $_SESSION['current_user'] = $user;
        var_dump($_SESSION);
        
        header("Location: http://localhost:1234/user.php");


        // postoji user, ulogovati ga
      } else {
        // ne postoji, 
        echo ('nepostojeci user');
      }
  }

  
}




?>


