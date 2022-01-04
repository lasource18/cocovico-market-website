<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';

    $con = new mysqli($server, $user, $pass, 'grocery-website-users');

    if($con->connect_error) {
        die('Connection error');
    }
?>