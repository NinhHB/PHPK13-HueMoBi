<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý Sản phẩm</title>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
		<div class="row">
			<h3>Danh sách các sản phẩm</h3>
		</div>
		<div class="row">
			<p>
				<a href="productCreate.php" class="btn btn-success">Tạo mới</a>
			</p>
			
			<table class="table table-striped table-bordered">
              	<thead>
	                <tr>
	                  	<th>Tên sản phẩm</th>
	                  	<th>Giá</th>
	                  	<th>Nhà sản xuất</th>
	                  	<th>Danh mục</th>
	                  	<th>Ngày nhập kho</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql = "SELECT * FROM product";
				$results = mysqli_query($conn, $sql);
				if ($results->num_rows > 0) {
				    // output data of each row
				    while($row = $results->fetch_assoc()) {
				        echo '<tr>';
					   	echo '<td>'. $row['name'] . '</td>';
					   	echo '<td>'. $row['prices'] . '</td>';
					   	echo '<td>'. $row['idProducer'] . '</td>';
					   	echo '<td>'. $row['idCategory'] . '</td>';
					   	echo '<td>'. $row['importDay'] . '</td>';
					   	echo '<td width=250>';
					   	echo '<a class="btn" href="productRead.php?id='.$row['id'].'" target="blank">Xem chi tiết</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-success" href="productUpdate.php?id='.$row['id'].'">Cập nhật</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-danger" href="productDelete.php?id='.$row['id'].'">Xóa</a>';
					   	echo '</td>';
					   	echo '</tr>';
				    }
				} else {
				    echo "0 results";
				}
			   	Database::disconnect();
			  	?>
			    </tbody>
            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>