<?php 
	require_once("../database.php");
	$conn=Data::connect();
	if(isset($_POST['btn_add']))
	{
		$name=$_POST['name'];
		$typecategory=$_POST['typecategory'];
		if (Data::selectTable($conn,"category","name",$name)!=null) {
			# Kiem tra xem ten danh muc da ton tai chua
			echo '<script language="javascript">';
			echo 'alert("Danh mục : '.$name.' đã tồn tại !")';
			echo '</script>';
		}
		else{
			//creat new category
			$sql="INSERT INTO `category`(`name`, `idCategory`) VALUES ('$name','$typecategory')";
			mysqli_query($conn,$sql);
			echo '<script language="javascript">';
			echo 'alert("Danh mục : '.$name.' tạo mới thành công !")';
			echo '</script>';
			header("Location : categoryList.php");
		}

	}
	Data::disconnect();
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
    			<h3>Create New Category</h3>
    		</div>
		<hr>
		<form class="form-horizontal" action="categoryCreate.php" method="POST">
			<div class="control-group">
			    <label class="control-label">Name Category</label>
			    <div class="controls">
			      	<input name="name" type="text" required="" placeholder="Input Name Category" value="<?php echo !empty($name)?$name:'';?>">
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
			      			$sql="SELECT * FROM category";
			      			$results=mysqli_query($conn,$sql);
			      			if(mysqli_num_rows($results) > 0){
				      			while($row = mysqli_fetch($results)) {
				      				if($row['idCategory']==0){
				      					echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
				      				}
				      			}
			      			}
			      		 ?>
			      	</select>
			    </div>
			  </div>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-success" name="btn_add">Create</button>
				  <a class="btn" href="categoryList.php">Back</a>
				</div>
		</form>
		</div>
	</div>
</body>
</html>
