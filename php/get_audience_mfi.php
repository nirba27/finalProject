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
$race = (stripslashes($_POST['$race']));
$educ = (stripslashes($_POST['$educ']));
$occu = (stripslashes($_POST['$occu']));
$child = (stripslashes($_POST['$child']));
$vechi = (stripslashes($_POST['$vechi']));
$hh_num = (stripslashes($_POST['$hh_num']));

$tsql= "SELECT TOP 20 tem.id,COUNT(*) as cnt FROM
          (
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$gender%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$maritial%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$race%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$maritial%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$educ%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$occu%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$child%'  
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$vechi%'
            UNION ALL
            SELECT id FROM MFI_CLUSTERS WHERE [key] LIKE '%$hh_num%'         
          ) as tem
        GROUP BY id
        ORDER BY cnt DESC     
        ";

$getResults= sqlsrv_query($conn, $tsql);

$array = array();

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'id'=>$row['id'],
        'cnt'=>$row['cnt'],

    );}

sqlsrv_free_stmt($getResults);


?>