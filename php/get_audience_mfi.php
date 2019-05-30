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
$gender =  (stripslashes($_POST['gender']));
$maritial = (stripslashes($_POST['maritial']));
$source = (stripslashes($_POST['source']));


$tsql= "SELECT TOP 20 tem.id,COUNT(*) as cnt FROM
          (
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$gender%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$maritial%'      
          ) as tem
        GROUP BY id
        ORDER BY cnt DESC     
        ";

$getResults= sqlsrv_query($conn, $tsql);

$array = array();
echo $tsql;
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'id'=>$row['id'],
        'cnt'=>$row['cnt'],

    );}
echo json_encode($array);

sqlsrv_free_stmt($getResults);


?>