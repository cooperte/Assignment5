<?php
  error_reporting(E_ALL);
  ini_set('display_errors','On');
  
  if(isset($_GET['loggedIn']) && $_GET['loggedIn'] == 'false'){
    echo "You are not logged in.<br>";
  }  
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Login Page - Assignment 5</title>
      <meta charset='UTF-8'>
    </head>
	<body>
        <form action='content.php' method='POST'>
          <label for='userName'>User Name:</label> 
          <input type='text' name='userName' />
          <br><br>
          <input type='submit' value='Login' />
        </form>
    </body>
  </html>