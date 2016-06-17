<?php

$id = null;

if( !empty($_GET['id']))
{
	$id = $_REQUEST['id'];
}

if( null==$id){
	header("Location: productIndex.php");
}

require '../database.php';
$conn = Database::connect();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idProducer = $_POST['idProducer'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];

	
	$sql = "UPDATE product SET name='$name', prices='$prices', idProducer='$idProducer', idCategory='$idCategory', importDay='$importDay' WHERE id=$id";
	$conn->query($sql);
	header("Location: productIndex.php");
} else {
	$sql = "SELECT * FROM product WHERE id=$id";
	$results = mysqli_query($conn, $sql);

	if($results->num_rows > 0)
	{
		$data = $results->fetch_array();
	}

}

?>


<!DOCTYPE html>
<html lang = "vi">
<head>
	<title>Cập nhật sản phẩm</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href = "css/bootstrap.min.css">
	<script scr="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Cập nhật sản phẩm</h3>
			</div>
			<form class="form-horizontal" action="productUpdate.php?id=<?php echo $data['id']?>" method="post">
				<div class="control-group">
					<label class="control-label">Tên sản phẩm</label>
					<div class="controls">
						<input type="text" name="name" placeholder="Nhập tên sản phẩm" value="<?php echo $data['name']?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Giá</label>
					<div class="controls">
						<input type="number" name="prices" placeholder="Nhập giá sản phẩm" value="<?php echo $data['prices']?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Nhà sản xuất</label>
					<div class="controls">
						<select name="idProducer">
						<?php
						$sql = "SELECT * FROM producer";
						$results = mysqli_query($conn, $sql);

						// var_dump($results); die;
						if ($results->num_rows>0) {
							while ($row = $results->fetch_assoc()) {
								echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
							}
						}
						?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Danh mục</label>
					<div class="controls">
						<select name="idCategory">
						<?php
						$sql = "SELECT * FROM category";
						$results = mysqli_query($conn, $sql);

						if($results->num_rows > 0)
						{
							while ($row = $results->fetch_assoc()) {
								echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
							}
						}
						?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Ngày nhập kho</label>
					<div class="controls">
						<input type="date" name="importDay" placeholder="Nhập ngày tháng năm" value="<?php echo $data['importDay']?>">
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Cập nhật</button>
					<a class="btn" href="productIndex.php">Trở lại</a>
				</div>

			</form>

		</div>


	</div>


</body>

</html>