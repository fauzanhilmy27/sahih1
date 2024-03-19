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

  $conn = mysqli_connect($servername, $username, $password,$dbname);
                  $sqld = "SELECT nama FROM pos where device_id = $id";
                  //$sql = "SELECT id, firstname, lastname FROM MyGuests";
                  $resultd = mysqli_query($conn, $sqld);
                  //$num=0;
                 
                  if (mysqli_num_rows($resultd) > 0) {
                    // output data of each row
                    while($rowd = mysqli_fetch_row($resultd)) {
                      //$num++;
                      echo $rowd[0];
                    }
                  }

?>