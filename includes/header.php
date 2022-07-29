<?php include './config/config.php';//include config at the top ?>
<?php include './libraries/Database.php'; ?>
<?php include './helpers/format_helper.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Welcome to PHP Fans Blog</title>
        <!--Fontawesome-->
    <script
      src="https://kit.fontawesome.com/52339f9582.js"
      crossorigin="anonymous"
    ></script>
    <!--FAVCION-->
    <link rel="icon" href="./images/logomakr.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">PHP Fans Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="posts.php">All Posts</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin/index.php">Pass to Admin Mode</a></li>
                    </ul>
                </div>
            </div>
        </nav>
       