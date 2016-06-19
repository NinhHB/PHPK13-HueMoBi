<?php 
	session_start();
	if($_SESSION['login']==null){
		header("Location: login.php");
	}
 ?>
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

        	<div class="span10">
        	<!-- / Include Form action -->
        		<table class="table table-striped table-bordered">
        		<caption>
        			<h3>List User</h3>
        		</caption>
              	<thead>
	                <tr>
	                  	<th>User Name</th>
	                  	<th>Full Name</th>
	                  	<th>Role</th>
	                  	<th>Begin Date</th>
	                  	<th>Action</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql="SELECT user.id, user.username, user.fullName, user.beginDate, role.name FROM user INNER JOIN role ON user.role=role.id";
				$results = mysqli_query($conn, $sql);
				if ($results->num_rows > 0) {
				    // output data of each row
				    while($row = $results->fetch_assoc()) {
				        echo '<tr>';
					   	echo '<td>'. $row['username'] . '</td>';
					   	echo '<td>'. $row['fullName'] . '</td>';
					   	echo '<td>'. $row['name'] . '</td>';
					   	echo '<td>'. $row['beginDate'] . '</td>';
					   	echo '<td width=250>';
					   	echo '<a class="btn" href="userRead.php?id='.$row['id'].'">Read</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-success" href="userUpdate.php?id='.$row['id'].'">Update</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-danger" href="userDelete.php?id='.$row['id'].'">Delete</a>';
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

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
  </body>
</html>
