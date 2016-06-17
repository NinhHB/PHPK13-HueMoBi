<!DOCTYPE html>
<html lang="en">
<head>
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
        		<table class="table table-striped table-bordered">
        		<caption>List Producer</caption>
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

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>
