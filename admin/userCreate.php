<?php 
	$genders=1;
	require '../database.php';

	if ( !empty($_POST)) {
		// keep track post values
		$username = $_POST['username'];
		$role=$_POST['role'];
		$password=$_POST['password'];
		$fullname=$_POST['fullname'];
		$genders=$_POST['genders'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$birthday=$_POST['birthday'];
		$atm=$_POST['atm'];
		$begindate=$_POST['begindate'];
		$status='work';

		// insert data
		$conn = Data::connect();
		$result=Data::selectTable($conn,'user','username',$username);
		if($result->num_rows>0){
			echo '<script language="javascript">';
			echo 'alert("Username đã tồn tại !")';
			echo '</script>';
			Database::disconnect();
		}
		else
		{
			$password=md5($password);
			$sql = "INSERT INTO `user`(`username`, `password`, `fullName`, `genders`, `role`, `phone`, `email`, `address`, `birthday`, `atm`, `beginDate`, `status`) VALUES('$username', '$password', '$fullname', '$genders', '$role', '$phone', '$email', '$address', '$birthday', '$atm', '$begindate', '$status')";
			$conn->query($sql);
			echo '<script language="javascript">';
			echo 'alert("Nhân viên được tạo mới thành công !")';
			echo '</script>';
			Data::disconnect();
			header("Location: index.php");
		}
		
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include'include/css_js_head.php'; ?>
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
        		<form class="form-horizontal" action="userCreate.php" method="post">
			<legend><h3>Create a Customer</h3></legend>
				<!-- / show list role -->
				<div class="control-group"> 
					<label class="control-label">Chức Vụ</label>
					<div class="control">
					    <select name="role" required="">
					    	<option value="">Lựa chọn chức vụ</option>
					    	<?php
					    		$conn=Data::connect();
					    		$sql = "SELECT * FROM role";
								$results = mysqli_query($conn, $sql);
								if (mysqli_num_rows($results) > 0) {
								    // output data of each row
								    while($row = $results->fetch_assoc()) {
								    		echo "<option value='".$row['id']."'>";
								    		echo $row['name'];
								    		echo '</option>';
								    }
								}
								Data::disconnect();
					    	?>
					    </select>
				    </div>
				</div> <!-- end show role -->
				<!-- username -->
				<div class="control-group">
				    <label class="control-label">Username</label>
				    <div class="controls">
				      	<input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
				    </div>
			  	</div>
			  	<!-- password -->
			  	<div class="control-group">
				    <label class="control-label">Password</label>
				    <div class="controls">
				      	<input name="password" type="password"  placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
				    </div>
			  	</div>
			  	<!-- full name -->
			  	<div class="control-group">
				    <label class="control-label">Full Name</label>
				    <div class="controls">
				      	<input name="fullname" type="text"  placeholder="Full Name" value="<?php echo !empty($fullname)?$fullname:'';?>">
				    </div>
			  	</div>
			  	<!-- genders -->
			  	<div class="control-group">
				    <label class="control-label">Genders</label>
				    <div class="controls">
				    	<input type="radio" name="genders" value="1" <?php if($genders==1) echo 'checked' ;?> > Male
  						<input type="radio" name="genders" value="0" <?php if($genders==0) echo 'checked' ;?> > Female
				    </div>
			  	</div>
			  	<!-- phone -->
			  	<div class="control-group">
				    <label class="control-label">Phone Number</label>
				    <div class="controls">
				      	<input name="phone" type="text"  placeholder="Phone Number" value="<?php echo !empty($phone)?$phone:'';?>">
				    </div>
			  	</div>
			  	<!-- email -->
			  	<div class="control-group">
				    <label class="control-label">Email Address</label>
				    <div class="controls">
				      	<input name="email" type="email"  placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
				    </div>
			  	</div>
			  	<!-- address -->
			  	<div class="control-group">
				    <label class="control-label">Address</label>
				    <div class="controls">
				      	<input name="address" type="text"  placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
				    </div>
			  	</div>
			  	<!-- birthday -->
			  	<div class="control-group">
				    <label class="control-label">Birthday</label>
				    <div class="controls">
				      	<input name="birthday" type="date" value="<?php echo !empty($birthday)?$birthday:'';?>">
				    </div>
			  	</div>
			  	<!-- atm -->
			  	<div class="control-group">
				    <label class="control-label">ATM</label>
				    <div class="controls">
				      	<input name="atm" type="text"  placeholder="ATM" value="<?php echo !empty($atm)?$atm:'';?>">
				    </div>
			  	</div>
			  	<!-- beginDate -->
			  	<div class="control-group">
				    <label class="control-label">Begin Date</label>
				    <div class="controls">
				      	<input name="begindate" type="date" value="<?php echo !empty($begindate)?$begindate:'';?>">
				    </div>
			  	</div>
			  	<!-- status -->

			  	<!-- action -->
			  	<div class="form-actions">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>

</body>
</html>