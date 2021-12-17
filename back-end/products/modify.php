<?php
    require_once('products-db.php');

    if (isset($_GET['id']) && isset($_POST['editForm'])) {
        $id = $_GET['id'];
        $category = clean_input($_POST['pcategory']);
        $name = clean_input($_POST['pname']);
        $quantity = $_POST['pquantity'];
        $price = $_POST['pprice'];
        $image = $_POST['pimage'];

        $sql = "UPDATE `$category` SET 
            `category` ='$category',
            `name`='$name',
            `quantity`='$quantity',
            `price`='$price',
            `image`='$image' 
            WHERE id = $id";
        echo $sql;

        if ($con->query($sql) === TRUE) {
            header("Location: ./" . $category . "-table.php");
        } else {
            echo "Something went wrong";
        } 
    } else {
        echo "Invalid";
    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strtolower($data);
        return $data;
    }
?>