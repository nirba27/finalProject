<?php
/**
 * Created by PhpStorm.
 * User: Nir
 * Date: 24/03/2019
 * Time: 20:28
 */

ini_set('display_errors', 1);


$serverName = "lba.database.windows.net"; // update me
$connectionOptions = array(
    "Database" => "lba", // update me
    "Uid" => "nirbe", // update me
    "PWD" => "Nn123456" // update me
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


$user = (stripslashes($_POST['user']));
$pass = (stripslashes($_POST['pass']));

$tsql= "SELECT * FROM [dbo].[lba_users] Where uname=$user";
$getResults= sqlsrv_query($conn, $tsql);

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
   if ($pass==$row['pass'])
   {
       echo 1;
   }
   else
   {
       echo 0;
   }

}

sqlsrv_free_stmt($getResults);

?>