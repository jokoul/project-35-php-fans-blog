<?php
include 'includes/header.php';
?>
<?php 

//Create DB Object
$db = new Database();

if(isset($_POST['submit'])){
  // die('the submit is pressed');
  //Assign Vars and sanytize
  $title = mysqli_real_escape_string($db->link, $_POST['title']);//Escape special character in a string for use in SQL statement
  // echo $title;
  // die();
  $body = mysqli_real_escape_string($db->link, $_POST['body']);//Escape special character in a string for use in SQL statement
  $category = mysqli_real_escape_string($db->link, $_POST['category']);//Escape special character in a string for use in SQL statement
  $author = mysqli_real_escape_string($db->link, $_POST['author']);//Escape special character in a string for use in SQL statement
  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);//Escape special character in a string for use in SQL statement
  //Simple Validation
  if($title == '' || $body == '' || $category == '' || $author == ''){
    //Set Error
    $error = 'Please fill out all required fields';
  }else{
    $query = "INSERT INTO posts(title,body,category,author,tags) VALUES ('$title','$body','$category','$author','$tags')";
    $insert_row = $db->insert($query);
  }
}
?>
<?php 


//Create query
$query = "SELECT * FROM categories";
//run query
$categories = $db->select($query);
?>

<!--content-->
<form role="form" method="post" action="add_post.php">
  <div class="mb-3 form-group">
    <label class="form-label">Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="mb-3 form-group">
    <label class="form-label" >Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>
  <div class="mb-3 form-group">
    <label class="form-label">Category</label>
    <select name="category" class="form-select">
      <?php while($row = $categories->fetch_assoc()): ?>
        <?php if($row['id'] == $post['category']){

          $selected = 'selected';
        }else{
          $selected = '';
        }
         ?>
        <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="mb-3 form-group">
    <label class="form-label">Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
  </div>
  <div class="mb-3 form-group">
    <label class="form-label">Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>
  
  <div>
     <input name="submit" type="submit" class="btn btn-primary" value="Submit">
      <a href="index.php" class="btn btn-outline-dark">Cancel</a>
  </div>
</form>

<?php
include 'includes/footer.php';
?>