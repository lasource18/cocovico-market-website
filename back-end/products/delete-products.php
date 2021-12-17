<?php
    require_once('products-db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $category = $_GET['category'];
        $sql = "DELETE FROM `$category` WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            echo "Deleted the data";
            header("Location: ./" . $category . "-table.php");
        } else {
            echo "Something went wrong";
        }
    } else {
        die('ID is missing');
    }
?>