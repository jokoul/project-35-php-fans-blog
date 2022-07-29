<?php include '../config/config.php';//include config at the top ?>
<?php include '../libraries/Database.php'; ?>
<?php include '../helpers/format_helper.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Area</title>
        <!--Fontawesome-->
    <script
      src="https://kit.fontawesome.com/52339f9582.js"
      crossorigin="anonymous"
    ></script>
    <!--FAVCION-->
    <link rel="icon" href="../images/logomakr.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">PHP Fans Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Dashborad</a></li>
                        <li class="nav-item"><a class="nav-link" href="add_post.php">Add Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="add_category.php">Add Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../index.php">Visit Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="blog-header">
                <h2>Admin Area</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 blog-main">
                   <?php if(isset($_GET['msg'])): ?>
                    <div class="alert alert-success">
                       <?php echo htmlentities($_GET['msg']);//security fn that convert all applicable character to html entities ?> 
                    </div>
                    <?php endif; ?>