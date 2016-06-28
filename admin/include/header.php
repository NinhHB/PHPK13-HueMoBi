<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php" style="color:violet;font-weight:bold;">Huế Mobile</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              

              <li class="dropdown"> <!-- User -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="userCreate.php"><i class="icon-plus"></i> Add User</a></li>
                  <li><a href="#"><i class="icon-th-list"></i> List User</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="i"></i> Manage User</a></li>
                </ul>
              </li>

              <li class="dropdown"> <!-- producer -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Producer <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="producerCreate.php"><i class="icon-plus"></i> Add Producer</a></li>
                  <li><a href="producerIndex.php"><i class="icon-th-list"></i> List Producer</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="i"></i> Manage Producer</a></li>
                </ul>
              </li>

              <li class="dropdown"> <!-- category -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="categoryCreate.php"><i class="icon-plus"></i> Add Category</a></li>
                  <li><a href="categoryList.php"><i class="icon-th-list"></i> List Category</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="i"></i> Manage Category</a></li>
                </ul>
              </li>
              <li><a href="#about">About</a></li>
            </ul> <!-- end ul -->

            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link" style="color:yellow;text-decoration:none;">Username :: Admin</a>
              <button style="background:blue;border:1px solid #fff;margin-left:25px;"><a href="logout.php" style="color:#fff;text-decoration:none;">Log Out</a></button>
            </p>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>