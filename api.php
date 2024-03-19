<?php

/*

 $servername = "localhost";
                  $username = "u162560455_sahih";
                  $password = "Dedo@Lt?4";
                  $dbname = "u162560455_sahih";

*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sahih11";
$id = $_GET["id"];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if ($id==""){
  $sql = "SELECT * FROM device";
} else {
  $sql = "SELECT * FROM device where device_id = $id ";
}

//$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);
$num=0;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_row($result)) {
    $data=null;
    //$data['id']=$row[0];
    //$data[2]=$row[1];
    $dt = date_create($row[6]);
    $dt = date_modify($dt,"+7 hours");
    $dt = date_format($dt,"d M y H:i:s");
    //$data[0]=strtotime($row[6]);
    $data[0]=strtotime($dt);
    $data[0]=$data[0]*1000;
    $data[1]=(float)$row[2];
    //$data[1]=$row[2];
    //$data[2]=$row[1];
    
    
    
    if ($row[1]==341){
        
      
      $data[1] = 180 - $data[1];
      $data[1] =  $data[1] / 100;
      
      if ($data[1] >=1.80){
    
        $data[1]= null;    
        }
    
    if ($data[1] <= 0){
    
        $data[1]= null;    
        } 
    }
    
    if ($row[1]==342){
        
      
      $data[1] = 357 - $data[1];
      $data[1] =  $data[1] / 100;
      
      if ($data[1] >=3.57){
    
        $data[1]= null;    
        }
    
    if ($data[1] < 0){
    
        $data[1]= null;    
        } 
    }
    
    
     if ($row[1]==343){
        
      
      //$data[1] = $data[1]-300;
      $data[1] =  $data[1] / 100;
      $data[1] = 6.00 - $data[1] ;
      
      if ($data[1] >=6.00){
    
        $data[1]= null;    
        }
    
    if ($data[1] < 0){
    
        $data[1]= null;    
        } 
    }
         
    
    if ($row[1]==340){
        
      
      $data[1] = 650 - $data[1];
      $data[1] =  $data[1] / 100;
      
      if ($data[1] >=6.50){
    
        $data[1]= null;    
        }
    
    if ($data[1] < 0){
    
        $data[1]= null;    
        } 
    }
    
    
    
    
    
    $response[]=$data;
    }
    //require( 'ssp.class.php' );
    echo json_encode($response,JSON_PRETTY_PRINT);
}

function nama ($id){
  $conn = mysqli_connect($servername, $username, $password,$dbname);
                  $sqld = "SELECT nama FROM pos where device_id = $id";
                  //$sql = "SELECT id, firstname, lastname FROM MyGuests";
                  $resultd = mysqli_query($conn, $sqld);
                  $num=0;
                 
                  if (mysqli_num_rows($resultd) > 0) {
                    // output data of each row
                    while($rowd = mysqli_fetch_row($resultd)) {
                      //$num++;
                      echo $rowd[1];
                    }
                  }
}
?>