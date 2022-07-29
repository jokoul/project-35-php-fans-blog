
<?php include './includes/header.php' ?>
<?php 

//Create DB Object
$db = new Database();

//Check URL For Category
if(isset($_GET['category'])){
    $category = $_GET['category'];
    //Create Query
    $query = "SELECT * FROM posts WHERE category = " . $category . " ORDER BY id DESC";

    //Run Query
    $posts = $db->select($query);
}else{
    //Create Query
    $query = "SELECT * FROM posts ORDER BY id DESC";

    //Run Query
    $posts = $db->select($query);
}

//Create Query
$query = "SELECT * FROM categories";

//Run Query
$categories = $db->select($query);
?>
         <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <div><img src="./images/logoblog.png" alt="logo" width="150"/></div>
                    <h1 class="fw-bolder">Welcome to PHP Fans Blog</h1>
                    <p class="lead mb-0">PHP News, tutorials, videos & more</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <?php if($posts) : ?>
                        <?php while($row = $posts->fetch_assoc()): //while loop with a parameter row which an associative array ?>
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="small text-muted"><?php echo formatDate($row['date']) ?> by : <a href="#"><?php echo $row['author'] ?></a></div>
                            <h2 class="card-title"><?php echo $row['title']; ?></h2>
                            <p class="card-text"><?php echo shortenText($row['body']); ?></p>
                            <a class="btn btn-primary readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read more →</a>
                        </div>
                    </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>There are no posts yet</p>
                    <?php endif; ?>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">About</div>
                        <div class="card-body">
                            <p><?php echo $site_description ?></p>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <?php if($categories): ?>
                                            <?php while($row=$categories->fetch_assoc()): ?>
                                        <li><a href="posts.php?category=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
                                            <?php endwhile; ?>
                                        <?php else :  ?>
                                            <p>There are no categories yet</p>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include('./includes/footer.php') ?>
