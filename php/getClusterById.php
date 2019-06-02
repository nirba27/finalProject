<?php
/**
 * Created by PhpStorm.
 * User: Nir
 * Date: 24/03/2019
 * Time: 20:28
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$serverName = "lba.database.windows.net"; // update me
$connectionOptions = array(
    "Database" => "lba", // update me
    "Uid" => "nirbe", // update me
    "PWD" => "Nn123456" // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
$cluster = (stripslashes($_POST['cluster']));

$tsql= "SELECT * FROM MFI_CLUSTERS_RECORDS WHERE record=$cluster ";

$getResults= sqlsrv_query($conn, $tsql);
//echo ("Reading data from table" . PHP_EOL);
#if ($getResults == FALSE)
    //echo (sqlsrv_errors());

$array = array();

//echo $tsql;

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'id' => $row['id']
    );
}

echo json_encode($array);
sqlsrv_free_stmt($getResults);


?>