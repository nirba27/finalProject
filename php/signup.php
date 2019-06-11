<?php
/**
 * Created by PhpStorm.
 * User: Nir
 * Date: 24/03/2019
 * Time: 20:28
 */
// Always start this first
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['user'] ) && isset( $_POST['pass'] ) ) {
        // Getting submitted user data from database
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

        $tsql = "INSERT INTO [dbo].[lba_users]  ([name],pass) VALUES ('$user','$pass')";
        $getResults = sqlsrv_query($conn, $tsql);

    }
}
?>