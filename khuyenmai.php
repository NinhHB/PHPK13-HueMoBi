<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ĐIỆN THOẠI HUẾ</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/ico/logohuemobi16x16.png">
    <link rel="stylesheet" href="assets/css/khuyenmai.css">
</head>

<body>
    <div id="container">
    
        <div id="header">
            <?php include 'header.php';?>
        </div>
        <!--....................................header.........................................................-->
        
        <div class="content">
            <img src="assets/img/banner/khuyenmai.png" alt="khuyến mãi"/>
            <div class="comment">
                <div class="submitcomment">
                    <form action="#" method="post" name="comment"> 
                    <span class="binhluan">Bình luận</span><br/>
                    <span>Tên của bạn</span><br/>
                    <input type="text" name="yourname" placeholder="hãy nhập tên của bạn" /><br>
                    <span>Địa chỉ email:</span><br/>
                    <input type="text" name="email" placeholder="nhập địa chỉ email"/><br/>
                    <span>Bình luận:</span><br/>
                    <textarea name="comment" id="comment" cols="50" rows="2" tabindex="4" placeholder="Viết bình luận vào đây"></textarea><br/>
                    <input type="submit" name="submit" value="Gửi"/>
                    </form>
                </div>
                <div class="printcomment">
                    <p>Họ và tên</p>
                    <p>bình luận</p>
                </div>
            </div><!--bình luận-->
        </div><!--content-->
        <!--..................................................conten..............................................-->
         <div id="footer">
            <?php include 'footer.php';?>
         </div>
        <!--..........................................footer....................................................-->
        
    </div><!--contener-->
</body>
</html>