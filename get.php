<?php

 $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "sahih11";



$databaseHost = 'localhost';
$databaseName = 'sahih11';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
//$id = $_POST['id'];
//$value = $_POST['value'];

$note = '';
$awlr = '';
$comp = mysqli_query($mysqli, "SELECT * FROM device ORDER by time desc limit 1");
if ($comp){
    while($rows = mysqli_fetch_row($comp)){
        //echo  $rows[2];
        $bf = $rows[2];
        if($value > $bf){
            $status =  1;
            $note = 'Turun';
        }else if ($value == $bf){
            $status =  0;
            $note = 'Stabil';
        }else if ($value < $bf){
            $status =  2;
            $note = 'Naik';
        }
    }
}


//$result = mysqli_query($mysqli, "INSERT INTO device (device_id, value,status) values ($id,$value,$status)");


$cimp = mysqli_query($mysqli, "SELECT * FROM pos where device_id = $id");
if ($cimp){
    while($rowsn = mysqli_fetch_row($cimp)){
        $awlr= $rowsn[1];
    }
}









$botToken="1412614172:AAGwQ4dmjvoWrQ_uAV11KDOXw8YrZTbgLSQ";

  $website="https://api.telegram.org/bot".$botToken;
 // $chatId=-4190500162;  //** ===>>>NOTE: this chatId MUST be the chat_id of a person, NOT another bot chatId !!!**
 $chatId=1632445302;
  $params=[
      'chat_id'=>$chatId, 
      'text'=>'test'
  ];
  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);








$ids = $_GET['id'];
$values = $_GET['value'];


$comp = mysqli_query($mysqli, "SELECT * FROM device where device_id = $ids ORDER by time desc limit 1");
if ($comp){
    while($rows = mysqli_fetch_row($comp)){
        echo  $rows[2];
        $bf = $rows[2];
        if($values > $bf){
            $status =  1;
        }else if ($values == $bf){
            $status =  0;
        }else if ($values < $bf){
            $status =  2;
        }
    }
}


//$results = mysqli_query($mysqli, "INSERT INTO device (device_id, value,status) values ($ids,$values,$status)");

//$results = mysqli_query($mysqli, "SELECT * FROM device");

//while($data = mysqli_fetch_array($results)) {         
        
//        echo $data['value'];
      
//    }


?>