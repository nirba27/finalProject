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

$tsql= "SELECT AVG(C4)*0.2 as '0',AVG(C5) as '1',AVG(C6) as '2',AVG(C7) as '3',
AVG(C8) as '4',AVG(C9) as '5',AVG(C10) as '6',AVG(C11) as '7',
AVG(C12) as '8',AVG(C13) as '9',AVG(C14) as '10',AVG(C15) as '11',
AVG(C16) as '12',AVG(C17) as '13',AVG(C18) as '14',AVG(C19) as '15',
AVG(C20) as '16',AVG(C21) as '17',AVG(C22) as '18',AVG(C23) as '19',
AVG(C24) as '20',AVG(C25) as '21',AVG(C26) as '22',AVG(C27) as '23'
FROM bar A1
LEFT JOIN final_hist A2 ON A1.hhID=A2.hhID
WHERE $cluster";

$getResults= sqlsrv_query($conn, $tsql);
//echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    //echo (sqlsrv_errors());

$array = array();
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $array[] = array(
        '0'=>$row['0'],
        '1'=>$row['1'],
        '2'=>$row['2'],
        '3'=>$row['3'],
        '4'=>$row['4'],
        '5'=>$row['5'],
        '6'=>$row['6'],
        '7'=>$row['7'],
        '8'=>$row['8'],
        '9'=>$row['9'],
        '10'=>$row['10'],
        '11'=>$row['11'],
        '12'=>$row['12'],
        '13'=>$row['13'],
        '14'=>$row['14'],
        '15'=>$row['15'],
        '16'=>$row['16'],
        '17'=>$row['17'],
        '18'=>$row['18'],
        '19'=>$row['19'],
        '20'=>$row['20'],
        '21'=>$row['21'],
        '22'=>$row['22'],
        '23'=>$row['23']
    );
}

echo json_encode($array);
sqlsrv_free_stmt($getResults);


?>