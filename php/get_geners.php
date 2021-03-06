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

$tsql= "SELECT  TOP 20 * , ROUND(((CAST(cnt AS INT) * 100) / total),0) AS cnt2
        FROM cluster_genre AS t1
        JOIN (SELECT cluster, SUM(CAST(cnt AS INT)) total
              FROM cluster_genre
              WHERE genre!=''
              GROUP BY cluster) AS t2
        ON t1.cluster = t2.cluster
        WHERE genre!='' AND t1.cluster='$cluster'
        ORDER BY cnt2 DESC";

$getResults= sqlsrv_query($conn, $tsql);
//echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    //echo (sqlsrv_errors());

$array = array();
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'genre' => $row['genre'],
        'cnt'=>$row['cnt2'],

    );
}

echo json_encode($array);
sqlsrv_free_stmt($getResults);


?>