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
$educ = (stripslashes($_POST['educ']));
$maritial = (stripslashes($_POST['maritial']));
$vehicles = (stripslashes($_POST['vechi']));
$occu = (stripslashes($_POST['occu']));
$hh_num = (stripslashes($_POST['occu']));
$income = (stripslashes($_POST['income']));
$topic = (stripslashes($_POST['topic']));


if($income=='high')
{
    $income = "key]='hmLPv' OR [key]='hmL' OR [key]='LPv' OR [key]='hmQSv' OR [key]='hmQ' OR [key]='nt56w' OR [key]='nt3' OR [key]='78w' OR [key]='nt78w' OR [key]='nt5' OR [key]='_9w' OR [key]='nt_9w' OR [key]='nt7' OR [key]='in92c' OR [key]='31c' OR [key]='in5' OR [key]='in31c' OR [key]='in9' or";
}
elseif ($income=='low')
{
    $income = "[key]='hmADv' or [key]='ADv' or [key]='nt12w' or [key]='12w' or [key]='nt34w' or [key]='nt1' or [key]='56w' or [key]='in14c' or [key]='58c' or";
}
elseif ($income=='very')
{
    $income = "[key]='92c' or [key]='hmQSv' or [key]='hmQ' or [key]='nt_9w' or key]='nt7' or key]='in31c' or key]='in9' or ";
}
else
{
    $income = "";
}


$tsql= "SELECT TOP 20 tem.id,tem.mkey as mkey,tem.records as rec,COUNT(*) as cnt FROM
          (
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$gender%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$hh_num%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$maritial%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$source%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$educ%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$occu%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$vehicles%'
            UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$topic%'
             UNION ALL
            SELECT id,records,mkey FROM mfi_final WHERE mkey LIKE '%$income%'
          ) as tem
        GROUP BY id,records,mkey
        ORDER BY cnt DESC";

//$tsql = "SELECT TOP 5 id,COUNT(*) as cnt FROM MFI_CLUSTERS_KEYS WHERE $income [key]='$hh_num' or [key]='$maritial' or [key]='$source' or [key]='$occu' or [key]='$educ' or [key]='$vehicles' or [key]='$topic' GROUP BY id ORDER BY cnt DESC";

$getResults= sqlsrv_query($conn, $tsql);

//echo $tsql;

$array = array();
//echo $tsql;
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        'id'=>$row['id'],
        'records'=>$row['rec'],
        'mkey' => $row['mkey']

    );}
echo json_encode($array);

sqlsrv_free_stmt($getResults);


?>
