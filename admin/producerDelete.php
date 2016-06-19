<?php 
	$namePage="Delete Producer::HueMobi";
	require '../database.php';
	$id = 0;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	$conn = Database::connect();
	$results=Database::selectTable($conn,"producer","id",$id);
	if($results!=null)
	{
		$data=mysqli_fetch_array($results);
	}
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		$avatar=$_POST['avatar'];
		
		// delete data
		
			if(unlink($avatar)){
				$sql = "DELETE FROM producer WHERE id=$id";
				mysqli_query($conn,$sql);
				Database::disconnect();
				header("Location: producerList.php");
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Không thể xóa Hãng sản xuất: '.$data['name'].'  !")';
				echo '</script>';
			}
	
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
		<div class="span10 offset1">
			<div class="row">
    			<h3>Delete a Producer</h3>
    		</div>
			<form class="form-horizontal" action="producerDelete.php" method="post">
			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
			  <input type="hidden" name="avatar" value="<?php echo $data['avatar'];?>"/>
			  <p class="alert alert-error">Are you sure to delete producer : <?php echo $data['name']?> ?</p>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-danger">Yes</button>
				  <a class="btn" href="producerList.php">No</a>
				</div>
			</form>
		</div>
    </div> <!-- /container -->
  </body>
</html>