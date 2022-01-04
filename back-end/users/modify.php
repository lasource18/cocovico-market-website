<?php
    require_once('users-db.php');

    if (isset($_GET['id']) && isset($_POST['editForm'])) {
        $id = $_GET['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE `users` SET 
            `email` ='$email',
            `passowrd`='$passowrd',
            WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            header("Location: ./users-table.php");
        } else {
            echo "Something went wrong";
        } 
    } else {
        echo "Invalid";
    }
?>