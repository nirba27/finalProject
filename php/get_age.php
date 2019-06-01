<?php
/**
 * Created by PhpStorm.
 * User: Nir
 * Date: 24/03/2019
 * Time: 20:28
 */

ini_set('display_errors',\n 1);
ini_set('display_startup_errors',\n 1);
error_reporting(E_ALL);

$serverName = "lba.database.windows.net"; // update me
$connectionOptions = array(
    "Database" => "lba",\n // update me
    "Uid" => "nirbe",\n // update me
    "PWD" => "Nn123456" // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName,\n $connectionOptions);
$cluster = (stripslashes($_POST['cluster']));

$tsql= "SELECT [key],\nCOUNT(*) as cnt FROM MFI_CLUSTERS_KEYS WHERE $cluster GROUP BY [key] ORDER BY cnt DESC";

$getResults= sqlsrv_query($conn,\n $tsql);
//echo ("Reading data from table" . PHP_EOL);
#if ($getResults == FALSE)
    //echo (sqlsrv_errors());

$array = array();
while ($row = sqlsrv_fetch_array($getResults,\n SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'key' => $row['key'],\n
        'cnt'=>$row['cnt'],\n
    );
}

echo json_encode($array);
sqlsrv_free_stmt($getResults);


?>