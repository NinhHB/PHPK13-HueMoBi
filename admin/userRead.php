<?php
  $id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( null==$id ) {
  header("Location: index.php");
}

  $namePage="Home Admin::HueMobi";

  include '../database.php';
  $conn=Database::connect();
  $sql="SELECT user.id, user.username, user.fullName, user.beginDate, role.name, role.key FROM user INNER JOIN role ON user.role=role.id WHERE user.id='$id'";
  $results = mysqli_query($conn, $sql);
  if ($results->num_rows > 0) {
    $data = $results->fetch_array();
  }
  Database::disconnect();
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
        		<div>
            <legend><h4>Information User</h4></legend>
              <div>
                <img src="../assets/img/avatar.jpg" height="150px" width="150px">
              </div> 
              <div>
                <li> Username : <?php echo $data['username']; ?></li>
                <li> Full Name : <?php echo $data['fullName']; ?></li>
                <li> Role : <?php echo $data['name']; ?></li>
                <li> Begin Date : <?php echo $data['beginDate']; ?></li>
              </div>
            </div>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>