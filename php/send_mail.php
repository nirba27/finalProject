<?php
/**
         * Created by PhpStorm.
         * User: Nir
         * Date: 24/03/2019
         * Time: 20:28
         */
// Always start this first
        session_start();

        $user = (stripslashes($_POST['cluster']));
        //$pass = (stripslashes($_POST['pass']));

        // the message
        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail("nirbe@campus.technion.ac.il","My subject",$msg);


?>