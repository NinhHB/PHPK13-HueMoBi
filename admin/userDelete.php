<?php 
require '../database.php';
$id = 0;

if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( !empty($_POST)) {
	// keep track post values
	$id = $_POST['id'];
	
	// delete data
	$conn = Database::connect();
	$sql = "DELETE FROM user WHERE id=$id";
	$conn->query($sql);
	Database::disconnect();
	header("Location: index.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/css_js_head.php'; ?>
</head>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>

  	<div class="container-fluid">
      	<div class="row-fluid">
      	<!-- / Include menu -->
        	<?php include'include/menu_left.php'; ?>

        	<div class="span10">
        	<!-- / Include Form action -->
        		<form class="form-horizontal" action="userDelete.php" method="post">
        		<legend><h3>Delete User</h3></legend>
			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
			  <p class="alert alert-error">Are you sure to delete ?</p>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-danger">Yes</button>
				  <a class="btn" href="index.php">No</a>
				</div>
			</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>