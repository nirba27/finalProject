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
$gen =  (stripslashes($_POST['gen']));

$tsql= "SELECT TOP 1 cluster,CAST(cnt AS INT) C1 FROM cluster_genre WHERE genre='$gen' ORDER BY C1 DESC";
$getResults= sqlsrv_query($conn, $tsql);
//echo ("Reading data from table" . PHP_EOL);
//if ($getResults == FALSE)
    //echo (sqlsrv_errors());

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        echo $row['cluster'];
}

sqlsrv_free_stmt($getResults);


?>