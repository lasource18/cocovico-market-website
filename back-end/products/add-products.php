<?php
    require_once('products-db.php');

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitForm'])) {
        $category = clean_input($_POST['pcategory']);
        $name = clean_input($_POST['pname']);
        $quantity = $_POST['pquantity'];
        $price = $_POST['pprice'];
        if (empty($_POST['pimage'])) {
            $image = "../images/image-not-available.jpeg";
        } else {
            $image = $_POST['pimage'];
        }

        $sql = "INSERT INTO `$category`(`category`, `name`, `quantity`, `price`, `image`) VALUES ('$category', '$name', '$quantity', '$price', 'image')";

        if ($con->query($sql) === TRUE) {
            header("Location: ./add-products.php");
        } else {
            echo "Something went wrong";
        }
    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strtolower($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Add Product</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home">Cocovico Market</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.html#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.html#home">Tables Index</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tables
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./beverages-table.php">Beverages</a></li>
                        <li><a class="dropdown-item" href="./dairy-table.php">Dairy</a></li>
                        <li><a class="dropdown-item" href="./fruits-table.php">Fruits</a></li>
                        <li><a class="dropdown-item" href="./meat-table.php">Meat</a></li>
                        <li><a class="dropdown-item" href="./seafood-table.php">Seafood</a></li>
                        <li><a class="dropdown-item" href="./vegetables-table.php">Vegetables</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <br>
    <div class="jumbotron">
        <h1 class="text-center" id="home">Cocovico Market</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <h3>Add Product</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="pcategory" id="category" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="pname" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Quantity</label>
                        <input type="number" min="0" max="99999" value="100" class="form-control" name="pquantity" id="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="0" step=".1" max="99.99" value="9.9" class="form-control" name="pprice" id="price" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image URL</label>
                        <input type="text" class="form-control" name="pimage" id="image">
                    </div>
                    <br>
                    <input type="submit" name="submitForm" value="submit" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
    <br>
</body>
</html>