
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Beauty</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <a class="navbar-brand" href="../views/home.php">
                <img src="../assets/images/logo_web.png" width="250">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="../views/home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="../views/master_review.php">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-2" href="../views/view_article.php">Articles</a>
                    </li>
                    
                    <?php if( isset($_SESSION['r']) && $_SESSION['r'] == 'admin' ) : ?>
                        <li class="nav-item dropdown mr-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../views/view_user.php">Users</a>
                                <a class="dropdown-item" href="../views/master_product.php">Products</a>
                                <a class="dropdown-item" href="../views/master_brand.php">Brands</a>
                            </div>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link mr-2" href="../views/master_brand.php">Brands</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <?php if( !isset($_SESSION["email"]) and !isset($_SESSION["username"]) ) : ?>
                            <button type="button" class="btn btn-info"><a href="../views/view_login.php" style="text-decoration:none; color:white;">Login or Register</a></button>
                        <?php else : ?>
                            <button type="button" class="btn btn-danger"><a href="../views/view_logout.php" style="text-decoration:none; color:white;">Logout</a></button>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navigasi -->
