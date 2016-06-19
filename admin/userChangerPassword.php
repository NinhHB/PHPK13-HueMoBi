<?php 
$namePage="Changer Password::HueMobi";
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php");
}

require '../database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// keep track post values
	$password_old = $_POST['password_old'];
	$password_new = $_POST['password_new'];
	$password_reply = $_POST['password_reply'];
	
	// update data
	$conn = Database::connect();
	$result=Database::selectTable($conn,'user','id',$id);
	if($result->num_rows>0){
		if(md5($password_old)!=$result->fetch_assoc()['password'])
		{
			echo '<script language="javascript">';
			echo 'alert("password củ không trùng khớp !")';
			echo '</script>';
		}
		else
		{
			if($password_new!=$password_reply){
				echo '<script language="javascript">';
				echo 'alert("Password nhập lại không trùng khớp !")';
				echo '</script>';
			}
			else
			{
				$password_new=md5($password_new);
				$sql="UPDATE user SET password='$password_new' WHERE id=$id";
				$conn->query($sql);
				header("Location: index.php");
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include'include/css_js_head.php'; ?>
</head>

<body>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>

  	<div class="container-fluid">
      	<div class="row-fluid">
      	<!-- / Include menu -->
        	<?php include'include/menu_left.php'; ?>

        	<div class="span10">
        	<!-- / Include Form action -->
        		<form class="form-horizontal" action="userChangerPassword.php?id=<?php echo $data['id']?>" method="post">
        		<legend>Changer Password</legend>
				<div class="control-group">
					<label class="control-label">Password Old</label>
					<div class="controls">
						<input name="password_old" type="password"  placeholder="Password Old" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Password New</label>
					<div class="controls">
						<input name="password_new" type="password" placeholder="Password New<" ">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Password Reply</label>
					<div class="controls">
						<input name="password_reply" type="password" placeholder="Password Reply" >
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Changer</button>
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