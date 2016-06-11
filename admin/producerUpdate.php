
<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: producerList.php");
	}
	require '../database.php';
	$conn=Data::connect();
	if(isset($_POST['btn_save'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$website=$_POST['website'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$changer=$_POST['changer'];
		$logo=$_POST['logo'];
			if($changer==1){
				if($FILES['avatar']['tmp_name']!=null){
					if(unlink($logo)){
						$avatar='../upload/producer/'.basename($_FILES['avatar']['name']);
						if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar)){
							$sql="UPDATE `producer` SET `name`='$name',`website`='$website',`phone`='$phone',`email`='$email', `avatar`='$avatar' WHERE id='$id'";
						}
					}
				}
				else{
					echo '<script language="javascript">';
					echo 'alert("No File Avatar !")';
					echo '</script>';
				}
			}
			else{
				$sql="UPDATE `producer` SET `name`='$name',`website`='$website',`phone`='$phone',`email`='$email' WHERE id='$id'";
			}
			mysqli_query($conn,$sql);
			Data::disconnect();
			header("Location: producerList.php");
	}
	else{
		$results=Data::selectTable($conn,"producer","id",$id);
		if($results!=null){
			$data = mysqli_fetch_array($results);
		}
		Data::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    
	<title>Hãng sãn xuất</title>
</head>
<body>
	<div class="container">
		<div class="span10 offset1" >
			<div class="row">
    			<h3>Cập nhật Hãng sãn xuất</h3>
    		</div>
		<hr>
			<form class="form-horizontal" action="producerUpdate.php" method="post" enctype="multipart/form-data">
			 <div style="float:left; width:300px">
			 <input type="hidden" name="id" value="<?php echo $id;?>"/>
			 <input type="hidden" name="logo" value="<?php echo $data['avatar'];?>"/>
			  <div class="control-group">
			    <label class="control-label">Tên Hãng sản xuất</label>
			    <div class="controls">
			      	<input name="name" type="text" required="" placeholder="Tên Hãng" value="<?php if($data!=null)echo $data['name']; //else echo !empty($name)?$name:'';?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Email</label>
			    <div class="controls">
			      	<input name="email" type="email" placeholder="Email Address" value="<?php if($data!=null) echo $data['email'];// else echo !empty($email)?$email:'';?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Số điện thoại</label>
			    <div class="controls">
			      	<input name="phone" type="text"  placeholder="Phone Number" value="<?php if($data!=null) echo $data['phone']; //else echo !empty($phone)?$phone:'';?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Website</label>
			    <div class="controls">
			      	<input name="website" type="url"  placeholder="Nhập Website" value="<?php if($data!=null) echo $data['website']; //else echo !empty($website)?$website:'';?>">
			    </div>
			  </div>
			  </div>
			  <div style="margin-left:450px;width:160px; height:200px">
				<div style="width:150px;height:150px; text-align:center"><img id="blah" alt="your image" width="128px" height="128px" class="img-polaroid" src="<?php echo $data['avatar'];?>"/></div>
				<div>
				<script>
					$(document).ready(function(){
					    $("#hide").click(function(){
					        $("#upfile").hide();
					    });
					    $("#show").click(function(){
					        $("#upfile").show();
					    });
					});
				</script>
					Changer Logo Producer: 
					<input type="radio" id="show" name="changer" value="1" checked> Yes
					<input type="radio" id="hide" name="changer" value="0" > No
  					<br>
  					<input type="file" id="upfile" accept="image/*" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
				</div>
			</div>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-success" name="btn_save">Lưu lại</button>
				  <a class="btn" href="producerList.php">Trở lại</a>
				</div>
			</form>
		</div>
    </div> <!-- /container -->
</body>
</html>