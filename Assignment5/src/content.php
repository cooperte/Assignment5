<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
  //start session
  session_start();
  //check if user has decided to log out
  if(isset($_GET['action']) && $_GET['action'] == 'logOut'){
    $_SESSION = array();
    session_destroy();
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/', $filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/login.php", true);
    die();
  }
  //check for active session
  if(session_status() == PHP_SESSION_ACTIVE){
    if(isset($_POST['userName']) && trim($_POST['userName']) != ""){
      $_SESSION['userName'] = $_POST['userName'];
	  //reset visits to 0 if user is new
      if(!isset($_SESSION['visits'])){
        $_SESSION['visits'] = 0;
      }
      //add visit number
      $_SESSION['visits']++;
      //output visit number and option to sign out
      echo "Hi $_SESSION[userName], you have visited this page $_SESSION[visits] times. <br><br>";
      echo "Click the link to <a href='content.php?action=logOut'>\"Sign out\"</a>";
	} else {//output if user not logged in
        echo "You need to log in. Login <a href='login.php'>Here</a>.";
    }
  }
?>