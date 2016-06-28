<?php 
	include "../database.php";
	if(isset($_POST['btn_add']))
	{
		$conn=Database::connect();
		$name=$_POST['name'];
		$typecategory=$_POST['typecategory'];
		if (Database::selectTable($conn,"category","name",$name)!=null) {
			# Kiem tra xem ten danh muc da ton tai chua
			Database::disconnect();
			echo '<script language="javascript">';
			echo 'alert("Danh mục : '.$name.' đã tồn tại !")';
			echo '</script>';
		}
		else{
			//creat new category
			$conn=Database::connect();
			$sql="INSERT INTO `category`(`name`, `idCategory`) VALUES ('$name','$typecategory')";
			mysqli_query($conn,$sql);
			Database::disconnect();
			echo '<script language="javascript">';
			echo 'alert("Danh mục : '.$name.' tạo mới thành công !")';
			echo '</script>';
			header("Location : categoryList.php");
		}

	}
	
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Tạo danh mục</title>
	<?php include 'include/css_js_head.php'; ?>

</head>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>

  	<div class="container-fluid">
      	<div class="row-fluid">
      	<!-- / Include menu -->
        	<?php include'include/menu_left.php'; ?>

        	<div class="span9">
        	<!-- / Include Form action -->
        		<form class="form-horizontal" action="categoryCreate.php" method="POST">
        			<legend><h3>Create New Category</h3></legend>
					<div class="control-group">
					    <label class="control-label">Name Category</label>
					    <div class="controls">
					      	<input name="name" type="text" required="rterterter" placeholder="Input Name Category" value="<?php echo !empty($name)?$name:'';?>">
					    </div>
					</div>
					<div class="control-group">
						<label class="control-label">Type Category</label>
						<div class="controls">
						  	<select name="typecategory" required="">
						  		<option value="">Select Type</option>
						  		<option value="0">Original Category </option>
						  		<?php
						    		$conn=Database::connect();
						    		$sql = "SELECT * FROM category";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<option value='".$row['id']."'>";
									        echo $row['name'];
									        echo '</option>';
									    }
									} else {
									}
									Database::disconnect();
						    	?>
						  	</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success" name="btn_add">Create</button>
						<a class="btn" href="categoryList.php">Back</a>
					</div>
				
				</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>