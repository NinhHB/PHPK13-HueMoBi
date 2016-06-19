<?php
/**
* 
*/
class Database
{	
	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "";
	private static $dbname = "datahuemobi";
	private static $conn = null;

	public function __construct(){
		exit('Init function is not allowed');
	}

	public static function connect()
	{	// Create connection

		if(null == self::$conn)
		{

			self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
			self::$conn->set_charset("utf8");
			if(self::$conn->connect_error)
			{
				die("Connection failed: " . self::$conn->connect_error);
			}
			return self::$conn;

		}
	}
	public static function disconnect()
	{

		self::$conn->close();
	}
	public static function selectTable($conn,$nametable,$id,$dataid)//lấy dữ liệu từ $nametable có điều kiện hoặc không, nếu có điều kiện thì theo $id có dữ liệu kiểm tra là $dataid, ngược lại không có diều kiện các biến chuổi rổng "" xảy ra lổi nếu có kết quả null -> dùng để kiểm tra mã id
		{
			if ($conn!=null&&$nametable!=null) {
				if($id!="")
				{
					$sql="SELECT * FROM ".$nametable." WHERE ".$id."='$dataid'";
				}
				else
				{
					$sql="SELECT * FROM ".$nametable;
				}
				$result = $conn->query($sql);
				if($result!=null){
					if($result->num_rows > 0){
						return $result;
					}
					else
						return null;
				}
				else
					return null;
			}
			else
				return null;
		}

}
?>