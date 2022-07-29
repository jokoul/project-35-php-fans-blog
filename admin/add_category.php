<?php
include 'includes/header.php';
?>

<?php 

//Create DB Object
$db = new Database();

if(isset($_POST['submit'])){
  // die('the submit is pressed');
  //Assign Vars and sanytize
  $name = mysqli_real_escape_string($db->link, $_POST['name']);//Escape special character in a string for use in SQL statement

  //Simple Validation
  if($name == ''){
    //Set Error
    $error = 'Please fill out all required fields';
  }else{
    $query = "INSERT INTO categories(name) VALUES ('$name')";
    $update_row = $db->update($query);
  }
}
?>

<!--content-->
<form role="form" method="post" action="add_category.php">
  <div class="mb-3 form-group">
    <label class="form-label">Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category">
  </div>
  
  <div>
     <input name="submit" type="submit" class="btn btn-primary" value="Submit">
      <a href="index.php" class="btn btn-outline-dark">Cancel</a>
  </div>
</form>

<?php
include 'includes/footer.php';
?>