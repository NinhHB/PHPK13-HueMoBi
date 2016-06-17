<?php
require '../database.php';
if( !empty($_POST)){
	//keep track post values
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idProducer = $_POST['idProducer'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];
	

	//insert data
	$conn = Database::connect();
	$sql = "INSERT INTO product (name, prices, idProducer, idCategory, importDay) values('$name', '$prices', '$idProducer', '$idCategory', '$importDay')";
	$conn->query($sql);
	Database::disconnect();
	header("Location: productIndex.php");
}

?>


<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Tạo mới sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Tạo một sản phẩm mới</h3>
			</div>

			<form class="form-horizontal" action="productCreate.php" method="post">
				<div class="control-group">
					<label class="control-label">Tên sản phẩm</label>
					<div class="controls">
						<input name="name" required="required" type="text" placeholder="Nhập tên sản phẩm" value="<?php echo !empty($name)?$name:'';?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Giá</label>
					<div class="controls">
						<input type="number" required="required" name="prices" placeholder="Nhập giá sản phẩm" value="<?php echo !empty($prices)?$prices:'';?>">
					</div>
				</div>


				<div class="control-group">
					<label class="control-label">Chọn nhà sản xuất</label>
					<div class="controls">
						<select name="idProducer" size = 1 >
							<?php 
							$conn = Database::connect();
							$sql = "SELECT * FROM producer";
							$results = mysqli_query($conn, $sql);

							if($results->num_rows > 0) {
								while ($row = $results->fetch_assoc()) {
									echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
								}
							}

							?>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Chọn danh mục</label>
					<div class="controls">
						<select name="idCategory" size = 1 >
							<?php
							$sql = "SELECT * FROM category";
							$results = mysqli_query($conn, $sql);
							
							// var_dump($results); die; kiếm tra giá trị của biến

							if ($results->num_rows > 0) {
								while($row = $results->fetch_assoc()) {
									echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';

								}
							}
							
							Database::disconnect();
						
							?>
						</select>
						
					</div>
				</div>
				

				<div class="control-group">
					<label class="control-label">Ngày nhập kho</label>
					<div class="controls">
						<input type="date" name="importDay" required="required" placeholder="Ngày nhập kho" value="<?php echo !empty($importDay)?$importDay:'';?>" min="2016-06-15" min="2016-12-31" >
					</div>
				</div>

				
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Tạo</button>
					<a class="btn" href="productIndex.php">Trở lại</a>
				</div>
			</form>
			
		</div>

	</div> <!-- container -->
</body>
</html>

<!-- <input type="password" name="" value="" size="30" /> -->