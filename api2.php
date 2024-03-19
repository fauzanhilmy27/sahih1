<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See https://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - https://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 $id = $_GET['id'];
// DB table to use
$table = 'device';
 
// Table's primary key
$primaryKey = 'id';
 
 
 
 
 
 
 
 
/*$servername = "localhost";
$username = "u162560455_sahih";
$password = "Dedo@Lt?4";
$dbname = "u162560455_sahih";
//$id = $_GET["id"];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

//if ($id==""){
//  $sql = "SELECT mercu FROM pos";
//} else {
  $sql = "SELECT mercu FROM pos where device_id = $id ";
//}

//$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);
$num=0;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_row($result)) {
      $mercu = $row[0];
    }
  //  return $mercu;
}
//echo $mercu;
 
 */
 
 
 
 

    



 
 
 
 
 
 
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
   // array( 'db' => 'domain', 'dt' => 0 ),
    //array( 'db' => 'device_id',  'dt' => 1 ),
    //array( 'db' => 'value',   'dt' => 2 ),
    //array( 'db' => 'office',     'dt' => 3 ),
    array(
        'db'        => 'time',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            $d = date_create($d);
            date_modify($d,"+7 hours");
            //return date( 'd M y h:i:s', strtotime($d));
            return date_format($d, 'd M y H:i:s');
        }
    ),
    array( 'db' => 'value',   'dt' => 1,
            'formatter' => function($s,$row){
            
            
             
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sahih11";
$id = $_GET["id"];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

//if ($id==""){
//  $sql = "SELECT mercu FROM pos";
//} else {
  $sql = "SELECT mercu FROM pos where device_id = $id ";
//}

//$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);
$mercu = null;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_row($result)) {
      $mercu = $row[0];
    }
    $s = $mercu - $s;
    $s= $s /100;
    //$s=pow($s,3)/2;
    if ($s<=0.00){
        $s=0;
    }
    return number_format((float)$s, 2, '.', '')." m";
}
            }),
            
            
   array(
        'db'        => 'status',
        'dt'        => 2,
        'formatter' => function( $st, $row ) {
            //return date( 'd M y h:i:s', strtotime($d));
            //return $st; 
            if ($st == 1){
            return "<i class='mdi mdi-arrow-down-circle text-success font-weight-bold' style='font-size: 16px;'></i>";
        
            }
            else if ($st == 2){
            return "<i class='mdi mdi-arrow-up-circle text-danger font-weight-bold' style='font-size: 16px;'></i>";
        
            }else if ($st == 0){
            return "<i class='mdi mdi-arrow-right-circle text-blue font-weight-bold' style='font-size: 16px;'></i>";
        
            }
        }
    ),
            
            

  array( 'db' => 'value',   'dt' => 3,
            'formatter' => function($s,$row){
            
            
             
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sahih11";
$id = $_GET["id"];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

//if ($id==""){
//  $sql = "SELECT mercu FROM pos";
//} else {
  $sql = "SELECT mercu,lebar FROM pos where device_id = $id ";
//}

//$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);
$mercu = null;
$lebar = null;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_row($result)) {
      $mercu = $row[0];
      $lebar = $row[1];
    }
    $s = $mercu - $s;
    $s= $s /100;
    $s=pow($s,3)/2;
    $s=2*$lebar*$s;
    if ($s<=0){
        $s=0;
    }
    return number_format((float)$s, 4, '.', '');
}
            }),


);
 
 /*

 $servername = "localhost";
                  $username = "u162560455_sahih";
                  $password = "Dedo@Lt?4";
                  $dbname = "u162560455_sahih";

*/
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'sahih11',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);
 
$where = "device_id ='$id'";
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
   // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
   SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where)
);