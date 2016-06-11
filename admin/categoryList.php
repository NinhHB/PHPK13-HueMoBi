
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
		<div class="row">
			<h3>Category </h3>
		</div>
		<div class="row">
			<p>
				<a href="categoryCreate.php" class="btn btn-success">Create</a>
			</p>
			
			<table class="table table-striped table-bordered">
              	<thead>
	                <tr>
	                	<th>ID</th>
	                  	<th>Name</th>
	                  	<th>In Category</th>
	                  	<th>Action</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Data::connect();
				$results = Data::selectTable($conn,"category","","");
				if ($results!=null) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($results)) {
				        echo '<tr>';
				        echo '<td>'. $row['id'] . '</td>';
					   	echo '<td>'. $row['name'] . '</td>';
					   	echo '<td>'. $row['idCategory'] . '</td>';
					   	echo '<td width=100px >';
					   	echo '<a class="btn btn-small btn-success" href="categoryUpdate.php?id='.$row['id'].'"><i class="icon-edit"></i></a>';
					   	echo '<a class="btn btn-small btn-danger" href="categoryDelete.php?id='.$row['id'].'" style="margin-left:5px"><i class="icon-remove-circle"></i></a>';
					   	echo '</td>';
					   	echo '</tr>';
				    }
				} else {
				    echo "<td colspan='4' style='text-align: center; font-size:20px; color: red'>No Data</td>";
				}
			   	Data::disconnect();
			  	?>
			      </tbody>
            </table>
    	</div>
    </div> <!-- /container -->
 </body>
 </html>