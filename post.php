<?php include './includes/header.php' ?>
<?php 
    //Get id from super global variable get
    $id = $_GET['id'];

    //Create DB object
    $db = new Database();

    //Create Query
    $query = "SELECT * FROM posts WHERE id = " . $id;

    //Run Query and transform to associative array
    $post = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * FROM categories";

    //Run Query
    $categories = $db->select($query);

?>

<!--page content-->
<div class="container mt-3">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <!-- <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a> -->
                <div class="card-body">
                    <?php if($post): ?>
                    <div class="small text-muted"><?php echo formatDate($post['date']) ?> by : <a href="#"><?php echo $post['author'] ?></a></div>
                    <h2 class="card-title"><?php echo $post['title'] ?></h2>
                    <p class="card-text"><?php echo $post['body'] ?></p>
                    <?php else: ?>
                        <p>There is no post</p>
                    <?php endif; ?>
                </div>
            </div> 
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
                    
                </div>
    </div> 
    
</div>
<?php include './includes/footer.php' ?>