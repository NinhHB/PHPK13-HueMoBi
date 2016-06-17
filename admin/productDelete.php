<?php
require '../database.php';
$id = 0;

if( !empty($_GET['id']))
{
	$id = $_REQUEST['id'];
}

if( !empty($_POST))
{
	$id = $_POST['id'];
	//delete data
	
	$conn = Database::connect();
	$sql = "DELETE * FROM product WHERE id=$id";
	$conn->query($sql);

	Database::disconnect();
	header("Location: productIndex.php");
}
?>

<!DOCTYPE html>
<html lang = "vi">
<head>
	<title>Xóa sản phẩm</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" scr="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Xóa một sản phẩm</h3>				
			</div>

			<form class="form-horizontal" action="productDelete.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<p class="alert alert-error">Bạn có chắc muốn xóa sản phẩm này?</p>
				<div class="form-actions">
					<button type="submit" class="btn btn-danger">Có</button>
					<a class="btn" href="productIndex.php">Không</a>
				</div>
			</form>
			
		</div>
		
	</div> <!-- container -->

</body>
</html>