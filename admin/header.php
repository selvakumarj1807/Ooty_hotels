
<?php 
	
 require 'db.php';
$username = $_SESSION["username"];
$company_name="kavin Online Market";

if(!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
 {
     header("Location:index.php");
     exit();
 }

?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Best Ooty Hotel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      
      
        
      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo"><b>Best Ooty Hotels</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
     
              <!-- Notifications: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>-->
                  <span class="hidden-xs"><label>Welcome <?php echo $username; ?> </label></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
        
                  <!-- Menu Body -->
        
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>

      </header>
      
      
      
      
      
      
      
      
      
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $username; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           
            <!--<li class="active treeview">
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>-->
           
           
            
            <li class="active treeview">
              <a href="dashboard.php">
                <i class="fa fa-edit"></i> <span>Dashboard</span>
                <!----<i class="fa fa-angle-left pull-right"></i>------>
              </a>
            </li>
        
      
			<li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Hotels</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
			  <?php 
				$result =mysqli_query($conn,"SELECT * FROM hotels");
				while ($row_result=mysqli_fetch_array($result))
				{	
					$h_id=$row_result['h_id'];
					$hotel_name=$row_result['hotel_name'];
					$image=$row_result['image'];
          $address=$row_result['hotel_address'];

			  ?>	  
             <ul class="treeview-menu"> 
			 <input type="hidden" id="cid" name="cid" value="<?php echo $c_id;?>"/>
				<li><a href="about_hotel.php?hotel_name=<?php echo $hotel_name;?>&address=<?php echo $address;?>"/><?php echo $hotel_name;?></a></li>
             </ul>
				<?php }?>
            </li>
		
             <!-----<li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Video Gallery</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="viewvideo.php">Video</a></li>
                </ul>
            </li>-->
             <!--<li class="treeview">
              <a href="checkout.php">
                <span>Checkout</span>           
              </a>             
            </li>
			 <li class="treeview">
              <a href="cart.php">
                <span>Cart</span>           
              </a>             
            </li>
               <li class="treeview">
              <a href="register.php">
                <span>Registers</span>           
              </a>             
            </li> -->
		<!--	<li class="treeview">
              <a href="offer_image.php">
                <span>Offer image</span>           
              </a>             
            </li> -->
		<!--	<li class="treeview">
              <a href="contactus.php">
                <span>Contact us</span>           
              </a>             
            </li>
			<li class="treeview">
              <a href="delivery.php">
                <span>Delivery</span>           
              </a>             
            </li>
            <li class="treeview">
              <a href="aboutus.php">
                <span>AboutUs</span>           
              </a>             
            </li>
        -->
           
            <li class="treeview">
              <a href="changepassword.php">
                <i class="fa fa-laptop"></i>
                <span>Change Password</span>           
              </a>             
            </li>
            <li class="treeview">
              <a href="logout.php">
                <i class="fa fa-laptop"></i>
                <span>Logout</span>            
              </a>             
            </li>
        </section>
        <!-- /.sidebar -->
      </aside>
     