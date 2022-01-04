<?php
    require_once('users-db.php');

    $sql = "SELECT * FROM `users`";
    $result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3ccfb19f85.js" crossorigin="anonymous"></script>
    <title>Users Table</title>
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
                    <a class="nav-link active" aria-current="page" href="#users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../products/products-tables.php">Tables Index</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tables
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../products/beverages-table.php">Beverages</a></li>
                        <li><a class="dropdown-item" href="../products/dairy-table.php">Dairy</a></li>
                        <li><a class="dropdown-item" href="../products/fruits-table.php">Fruits</a></li>
                        <li><a class="dropdown-item" href="../products/meat-table.php">Meat</a></li>
                        <li><a class="dropdown-item" href="../products/seafood-table.php">Seafood</a></li>
                        <li><a class="dropdown-item" href="../products/vegetables-table.php">Vegetables</a></li>
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
    <div class="jumbotron" id="users">
        <a href="#users" style="text-decoration: none; color: black;"><h1 class="text-center" id="show">Cocovico&nbsp;<i class="fas fa-shopping-basket"></i>&nbsp;Market</h1></a>
    </div>

    <div class="table-responsive" id="users">
        <table class="table table-striped table-borederred">
            <thead>
                <tr class="text-center">
                    <th>UID</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='text-center'>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>";
                            echo "<div class='btn-group'>";
                            echo "<a href='./edit-products.php?id=" . $row['id'] . "&category=" . $row['category'] . "' class='btn btn-secondary'>Edit</a>";
                            echo "<a href='./delete-products.php?id=" . $row['id'] . "&category=" . $row['category'] . "' class='btn btn-danger'>Delete</a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                            echo "<br>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href='./add-users.php' class='btn btn-dark btn-block'>Add</a>
    </div>
</body>
</html>