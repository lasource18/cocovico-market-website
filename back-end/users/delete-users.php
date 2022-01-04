<?php
    require_once('users-db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `users` WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            echo "Deleted the data";
            header("Location: ./users-table.php");
        } else {
            echo "Something went wrong";
        }
    } else {
        die('ID is missing');
    }
?>