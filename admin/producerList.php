<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link   href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    
	<title>Hãng sãn xuất</title>
</head>
<body>
<?php include'../include/menu.html'; ?>

    <div class="container">
		<div class="row">
			<h3>PRODUCERS </h3>
		</div>
		<div class="row">
			<p>
				<a href="producerCreate.php" class="btn btn-success">Create</a>
			</p>
			
			<table class="table table-striped table-bordered">
              	<thead>
	                <tr>
	                	<th>Logo</th>
	                  	<th>Name</th>
	                  	<th>Website</th>
	                  	<th>Email Address</th>
	                  	<th>Phone Number</th>
	                  	<th>Action</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
				   	include '../database.php';
				   	$conn = Data::connect();
					$results = Data::selectTable($conn,"producer","","");
					if ($results!=null) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($results)) {
					        echo '<tr>';
					        echo '<td><div style="width:60px; height:60px; text-align:center"><img src="'.$row['avatar'].'" width="50px" height="50px"></div></td>';
						   	echo '<td>'. $row['name'] . '</td>';
						   	echo '<td><a 	href="'. $row['website'] .'"  target = "_blank">'. $row['website'] . '</a></td>';
						   	echo '<td>'. $row['email'] . '</td>';
						   	echo '<td>'. $row['phone'] . '</td>';
						   	echo '<td width=100px >';
						   	echo '<a class="btn btn-small btn-success" href="producerUpdate.php?id='.$row['id'].'"><i class="icon-edit"></i></a>';
						   	echo '<a class="btn btn-small btn-danger" href="producerDelete.php?id='.$row['id'].'" style="margin-left:5px"><i class="icon-remove-circle"></i></a>';
						   	echo '</td>';
						   	echo '</tr>';
					    }
					} else {
					    echo "<td colspan='6'style='text-align: center; font-size:20px; color: red'>No Data</td>";
					}
				   	Data::disconnect();
			  	?>
			      </tbody>
            </table>
    	</div>

    </div> <!-- /container -->
  </body>
</html>