
<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: categoryList.php");
	}
	require '../database.php';
	$conn=Data::connect();
	if(isset($_POST['btn_save'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$typecategory=$_POST['typecategory'];
			$sql="UPDATE `category` SET `name` = '$name', `idCategory`='$typecategory' WHERE `id`='$id'";
			mysqli_query($conn,$sql);
			Data::disconnect();
			header("Location : categoryList.php");	
		}

	}
	else{
		$results=Data::selectTable($conn,"category","id",$id);
		if($results!=null){
			$data = mysqli_fetch_array($results);
		}
		Data::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
	<title>Category</title>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
    			<h3>Update Category: <?php echo $data['name'] ?></h3>
    		</div>
		<hr>
		<form class="form-horizontal" action="categoryUpdate.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
			<div class="control-group">
			    <label class="control-label">Name Category</label>
			    <div class="controls">
			      	<input name="name" type="text" required="" placeholder="Input Name Category" value="<?php echo $data['name']; ?>" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Type Category</label>
			    <div class="controls">
			      	<select name="typecategory" required="">
			      		<option value="">Select Type</option>
			      		<option value="0">Original Category </option>
			      		<?php 
			      			$conn = Data::connect();
			      			$results=Data::selectTable($conn,"category","idCategory","0");
			      			if($results!=null){
				      			while($row = mysqli_fetch($results)) {
				      				echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				      			}
			      			}
			      		 ?>
			      	</select>
			    </div>
			  </div>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-success" name="btn_save">Save</button>
				  <a class="btn" href="categoryList.php">Back</a>
				</div>
		</form>
		</div>
	</div>
</body>
</html>
