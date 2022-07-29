<?php
include 'includes/header.php';
?>

<?php 
$id = $_GET['id'];
//Create DB Object
$db = new Database();
//Create query
$query = "SELECT * FROM categories WHERE id = " . $id;
//run query
$category = $db->select($query)->fetch_assoc();
//Create query
$query = "SELECT * FROM categories";
//run query
$categories = $db->select($query);
?>

<?php 
if(isset($_POST['submit'])){
  // die('the submit is pressed');
  //Assign Vars and sanytize
  $name = mysqli_real_escape_string($db->link, $_POST['name']);//Escape special character in a string for use in SQL statement
  
  //Simple Validation
  if($name == ''){

    //Set Error
    $error = 'Please fill out all required fields';
  }else{
    $query = "UPDATE categories SET 
              name = '$name'
              WHERE id = " . $id;

    $update_row = $db->update($query);
  }
}
?>

<?php 
  if(isset($_POST['delete'])){
    $query = "DELETE FROM categories WHERE id =" . $id;
    $delete_row = $db->delete($query);
  }
?>

<!--content-->
<form role="form" method="post" action="edit_category.php?id= <?php echo $id; ?>">
  <div class="mb-3 form-group">
    <label class="form-label">Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name'] ?>">
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