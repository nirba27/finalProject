<?php
/**
 * Created by PhpStorm.
 * User: Nir
 * Date: 24/03/2019
 * Time: 20:28
 */
$serverName = "lba.database.windows.net"; // update me
$connectionOptions = array(
    "Database" => "lba", // update me
    "Uid" => "nirbe", // update me
    "PWD" => "Nn123456" // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


$tsql= "INSERT INTO id_cluster (id,cluster) VALUES (1,3)";
$getResults= sqlsrv_query($conn, $tsql);


$tsql= "SELECT TOP 20 FROM id_cluster";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    echo (sqlsrv_errors());
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo ($row['id'] . " " . $row['cluster'] . PHP_EOL);
}
sqlsrv_free_stmt($getResults);
?>