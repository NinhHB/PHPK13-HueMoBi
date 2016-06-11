<?php
require 'database_huemobi.php';

if( !empty($_POST))
{
	//keep track post values
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idProducer = $_POST['idProducer'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];

	//insert data
	$conn = Database::connect();
	$sql = "INSERT INTO info (name, prices, idProducer, idCategory, importDay) values('$name', '$prices', '$idProducer', '$idCategory', '$importDay')";
	$conn->query($sql);
	Database::disconnect();
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trang nhập sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="crud/css/bootstrap.min.css">
	<script type="text/javascript" src="crud/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Nhập sản phẩm</h3>
			</div>

			<form class="form-horizontal" action="create_form.php" method="post">
				<div class="control-group">
					<label class="control-label">Tên sản phẩm</label>
					<div class="controls">
						<input name="name" type="text" placeholder="Tên sản phẩm" value="<?php echo !empty($name)?$name:'';?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Giá sản phẩm</label>
					<div class="controls">
						<input type="text" name="prices" placeholder="Giá sản phẩm" value="<?php echo !empty($prices)?$prices:'';?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Id Nhà sản xuất</label>
					<div class="controls">
						<input type="text" name="idProducer" placeholder="Id Nhà sản xuất" value="<?php echo !empty($idProducer)?$idProducer:'';?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Id Danh mục</label>
					<div class="controls">
						<input type="text" name="idCategory" placeholder="Id Danh mục" value="<?php echo !empty($idCategory)?$idCategory:'';?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Ngày nhập hàng</label>
					<div class="controls">
						<input type="text" name="importDay" placeholder="Ngày nhập hàng" value="<?php echo !empty($importDay)?$importDay:'';?>">
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Tạo</button>
					<a class="btn" href="index.php">Trở lại</a>
				</div>
			</form>
			
		</div>
	</div> <!-- container -->

</body>

</html>