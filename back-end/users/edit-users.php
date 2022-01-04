<?php
    require_once('users-db.php');

    if (!isset($_GET['id'])) {
        header("Location: ../other/error.php");
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows != 1) {
        die('PID is invalid');
    }

    $data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Edit User</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home">Cocovico&nbsp;<i class="fas fa-shopping-basket"></i>&nbsp;Market
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.html#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../users/users-table.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../products/products-tables.php">Tables Index</a>
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
        <h1 class="text-center">Cocovico Market</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <h3>Edit Product</h3>
                
                <form action="./modify.php?id=<?= $id ?>" method="POST">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="category">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ?>" required>
                    </div>
                        <label for="name">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?= $data['password'] ?>" required>
                    </div>
                    <br>
                    <input type="submit" name="editForm" value="submit" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
</body>
</html>