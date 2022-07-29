<?php
include 'includes/header.php';
?>

<?php 
$id = $_GET['id'];
//Create DB Object
$db = new Database();
//Create query
$query = "SELECT * FROM posts WHERE id = " . $id;
//run query
$post = $db->select($query)->fetch_assoc();
//Create query
$query = "SELECT * FROM categories";
//run query
$categories = $db->select($query);
?>

<?php 
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
    $query = "UPDATE posts SET 
              title = '$title',
              body = '$body',
              category = '$category',
              author = '$author',
              tags = '$tags'
              WHERE id = " . $id;
    $update_row = $db->update($query);
  }
}
?>
<?php 
if(isset($_POST['delete'])){
  $query = "DELETE FROM posts WHERE id = " . $id;
  
  $delete_row = $db->delete($query);
}
?>

<!--content-->
<form role="form" method="post" action="edit_post.php?id= <?php echo $id ?>">
  <div class="mb-3 form-group">
    <label class="form-label">Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="mb-3 form-group">
    <label class="form-label" >Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body">
      <?php echo $post['body'] ?>
    </textarea>
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
        <option <?php echo $selected; ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="mb-3 form-group">
    <label class="form-label">Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author'] ?>">
  </div>
  <div class="mb-3 form-group">
    <label class="form-label">Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags'] ?>">
  </div>
  
  <div>
      <input name="submit" type="submit" class="btn btn-primary" value="Submit">
      <a href="index.php" class="btn btn-outline-dark">Cancel</a>
      <input name="delete" type="submit" class="btn btn-danger" value="Delete">
  </div>
</form>

<?php
include 'includes/footer.php';
?>