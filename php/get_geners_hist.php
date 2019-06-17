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

$tsql= "SELECT C3 as hour,AVG(C4) as News,AVG(C5) as Comedy
         ,AVG(C6) as Drama
         ,AVG(C7) as Entertainment
         ,AVG(C8) as Children
         ,AVG(C9) as Sports
         ,AVG(C10) as Knowledge 
         ,AVG(C11) as Other
    FROM genres_hist WHERE $cluster
    GROUP BY C3";

//echo $tsql;


$getResults= sqlsrv_query($conn, $tsql);
//echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    //echo (sqlsrv_errors());

$array = array();
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'hour' => $row['hour'],
        'News'=>$row['News'],
        'Comedy'=>$row['Comedy'],
        'Drama'=>$row['Drama'],
        'Entertainment'=>$row['Entertainment'],
        'Children'=>$row['Children'],
        'Sports'=>$row['Sports'],
        'Knowledge'=>$row['Knowledge'],
        'Other'=>$row['Other']

    );
}

echo json_encode($array);
sqlsrv_free_stmt($getResults);


?>