<?PHP
  error_reporting(E_ALL);
  ini_set('display_errors','On');
  header('Content-Type: text/plain; charset=utf-8');
  
  $paraArray = array();
  $retValues = array('Key' => '');
  
  //parameters:null
  if(empty($_GET) && empty($_POST)){
    echo "Nothing passed in URL. \n\n";
	$paraArray['Parameters'] = null;
  }//if method is get
  else if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $retValues['Key'] = 'GET';
	//assign the parameters
	foreach($_GET as $key => $value){
	  $paraArray[$key] = $value;
	}
  }//if post
  else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $retValues['Key'] = 'POST';
	//assign parameters
	foreach($_POST as $key => $value){
	  $paraArray[$key] = $value;
	}
  }
  //attach parameters to type array
  $retValues['Parameters'] = $paraArray;
  //output json object to client
  echo json_encode($retValues);
?>