<?php

// Your bot token

$botToken = "1412614172:AAGwQ4dmjvoWrQ_uAV11KDOXw8YrZTbgLSQ";

// The chat ID of the Telegram chat you want to send the message to
//$chatId = '1632445302';
$chatId = '-4190500162';

// The output string
$output = "";

// Your database connection code
$servername = "localhost";
$username = "u162560455_sahih";
$password = "Dedo@Lt?4";
$dbname = "u162560455_sahih";

$conn = new mysqli($servername, $username, $password, $dbname);

$current_time = date('Y-m-d H:i:s');

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);
}

// Execute the SQL query
//$sql = "SELECT pos.nama, dev.device_id, dev.value, dev.time FROM pos LEFT JOIN (SELECT device_id, MAX(time) AS max_time FROM device GROUP BY device_id) max_dev ON pos.device_id = max_dev.device_id LEFT JOIN device dev ON max_dev.device_id = dev.device_id AND max_dev.max_time = dev.time WHERE dev.time >= '$current_time' GROUP BY pos.nama";
$sql = "SELECT pos.nama, dev.device_id, dev.value, pos.mercu, dev.time, dev.status FROM pos LEFT JOIN (SELECT device_id, MAX(time) AS max_time FROM device GROUP BY device_id) max_dev ON pos.device_id = max_dev.device_id LEFT JOIN device dev ON max_dev.device_id = dev.device_id AND max_dev.max_time = dev.time  GROUP BY pos.nama";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) { // Loop through the results and concatenate the values into the string 
    while ($row = $result->fetch_assoc()) { 
        if($row["status"]='1'){
            $ruw = "Tinggi Air Menurun";
        } 
        if($row["status"]='2'){
            $ruw = "Tinggi Air Naik";
        } 
        if($row["status"]='0'){
            $ruw = "Tinggi Air Tetap";
        } 
        $tgl=date_create($row["time"]);
         date_modify($tgl,"+7 hours");
         $tgls = date_format($tgl, "Y-m-d H:i:s");
         $riw = ($row["mercu"] - $row["value"]) / 100;
        // $riw= 600.0;
         if($riw == $row["mercu"]){
            $riw = "ERROR";
            $ruw = "ERROR";

         }
         if($riw == $row["value"]){
            $riw = "ERROR";
            $ruw = "ERROR";

         }
         if($riw == $row["mercu"]/100){
            $riw = "ERROR";
            $ruw = "ERROR";

         }



        $output .= "\n***" . $row["nama"] . "***\nTinggi Muka Air :" . $riw . " meter\nWaktu: " . $tgls  . "\nStatus: " . $ruw
        . "\n"; }
} else { $output = "No results found.";
}

// Close the database connection
$conn->close();
//$output ="test";
echo $output;
// Send the output string as a message to the Telegram chat
$sendMessageUrl = "https://api.telegram.org/bot".$botToken;
$params=[
    'chat_id'=>$chatId, 
    'text'=>$output
];
$ch = curl_init($sendMessageUrl."/sendMessage");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
?>