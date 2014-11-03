<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
  //check for empty parameters
  if(empty($_GET)){
    echo "Nothing passed in URL.";
	exit();
  }//interger check
  foreach($_GET as $key=>$value){
    if(!is_numeric($value)){
	  echo $key . " must be an integer.<br>";
	}
  }//get min / max values
  if(isset($_GET['min-multiplicand'])){
    $min_multiplicand = intval($_GET['min-multiplicand']);
  }
  else{
    echo "Missing parameter min-multiplicand. <br>";
	exit();
  }
  if(isset($_GET['max-multiplicand'])){
    $max_multiplicand = intval($_GET['max-multiplicand']);
  }
  else{
    echo "Missing parameter max-multiplicand. <br>";
	exit();
  }
  if(isset($_GET['min-multiplier'])){
    $min_multiplier = intval($_GET['min-multiplier']);
  }
  else{
    echo "Missing parameter min-multiplier. <br>";
	exit();
  }
  if(isset($_GET['max-multiplier'])){
    $max_multiplier = intval($_GET['max-multiplier']);
  }
  else{
    echo "Missing parameter max-multiplier. <br>";
	exit();
  }
  //check if max is larger than min
  if($min_multiplicand > $max_multiplicand){
    echo "Minimum multiplicand larger than maximum multiplicand. <br>";
    exit();
  }
  if($min_multiplier > $max_multiplier){
    echo "Minimum multiplier larger than maximum multiplier. <br>";
    exit();
  }
  //create multidimensional array variables
  $lowmultiplecand = $min_multiplicand;
  $lowmultiplier = $min_multiplier;
  $width = $max_multiplicand - $min_multiplicand + 2;
  $height = $max_multiplier - $min_multiplier + 2;
  //create array for multiplicands
  $candArray = array();
  while($min_multiplicand <= $max_multiplicand){
    $cArray[] = $min_multiplicand;
	$min_multiplicand++;
  }// create array for multipliers
  $pArray = array();
  while($min_multiplier <= $max_multiplier){
    $pArray[] = $min_multiplier;
	$min_multiplier++;
  }
  //create table
  echo '<html>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="utf=8" />
    <h2>My Multiplication table<h2>
    <body>';
  //create multidimensional array
  $tableArray = array();
  for($i = $lowmultiplecand; $i <= $max_multiplicand; $i++){
    $tableArray[] = array();
	$tableArray[0][0] = '';
	$tableArray[0][$i] = $i;
	
	for($k = $lowmultiplier; $k <= $max_multiplier; $k++){
	  $tableArray[$k][0] = $k;
	  $tableArray[$k][$i] = $k * $i;
	}
  }

  echo '<p>
  <table>
  <table border="1">
  <tr>';
  //table to display
  foreach($tableArray as $key => $value){
    echo '<tr>';
    foreach($value as $layerTwo => $twoVal){
	  echo"<td>$twoVal";
	}
  }
  echo '</body>
  </html>';
?>