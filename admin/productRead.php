<?php
$id = null;
if( !empty($_GET['id'])){
	$id = $_REQUEST['id'];
}

include '../database.php';
$conn = Database::connect();	

if ( null==$id || !(is_numeric($id))) {
	header("Location: productRead.php");
} else {
	$sql = "SELECT * FROM product WHERE id=$id";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data = $results->fetch_array();
	}
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Xem sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Danh sách các sản phẩm</h3>
			</div>

			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Tên sản phẩm</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['name'];?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Giá</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['prices']; ?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Nhà sản xuất</label>
					<div class="controls">
						<label class="checkbox">
							<?php
							
							$sql = "SELECT * FROM producer";
							$results = mysqli_query($conn, $sql);
							
							
							// var_dump($results); die; kiếm tra giá trị của biến
							if($results->num_rows > 0)
							{	
								while($row = $results->fetch_assoc())
								{
									if($row['id']==$data['idProducer'])
									{
										echo $row['name'];	
									}
								
								}
							}
						
							?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Danh mục</label>
					<div class="controls">
						<label class="checkbox">
							<?php
							$sql = "SELECT * FROM category";
							$results = mysqli_query($conn, $sql);
							

							// var_dump($results); die; kiếm tra giá trị của biến
							
							if($results->num_rows > 0)
							{
								while($row = $results->fetch_assoc())
								{
									if($row['id']==$data['idCategory'])
									{
										echo $row['name'];
									}
								}
							
							}
							

							?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Ngày nhập kho</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['importDay']; ?>
						</label>
					</div>
				</div>


				<div class="form-actions">
					<a class="btn" href="productIndex.php">Trở lại</a>
				</div>
			</div>
			
		</div>

	</div> <!-- container -->
</body>
</html>