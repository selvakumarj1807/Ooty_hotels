<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "kavin Online Market";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}






$row1 = mysqli_query($conn, "Select * from hotels");
$cat = mysqli_num_rows($row1);
//echo $cont;
/*

$row4 = mysqli_query($conn, "Select * from cart");
$car = mysqli_num_rows($row4);

$row5 = mysqli_query($conn, "Select * from checkout");
$ch = mysqli_num_rows($row5);

$row6 = mysqli_query($conn, "Select * from delivery");
$de = mysqli_num_rows($row6);

$row7 = mysqli_query($conn, "Select * from products");
$product = mysqli_num_rows($row7);
*/

?>
<?php include('header.php') ?>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>



  <section class="content">
    <div class="row">


      

      <div class="col-lg-3 col-xs-6">
        <!- small box ->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>ADD Hotels</h4>
              <h4 style="color:white;text-align:center;font-size: 40px;"><?php echo $cat; ?></h4>
              <h4>&nbsp;</h4>
            </div>
            <div class="icon">
              <img src="img/pin.png" width='60' height='60' />
            </div>
            <a href="hotel.php" class="small-box-footer">Add Hotels <i class="fa fa-arrow-circle-right"></i></a>


          </div>
      </div>
      
      
      
      







      <!---------<div class="col-lg-3 col-xs-6">
              <!-small box->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4>ADD PRODUCT</h4>
<h4>&nbsp;</h4>
                </div>
                <div class="icon">
                  <img src="img/statistics.png" width='60' height='60' />
                </div>
                <a href="product.php" class="small-box-footer">Add Product <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>------------>

      <!-- /.row -->
      <!-- Main row -->





      <!-- jQuery 2.1.3 -->
      <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
      <!-- jQuery UI 1.11.2 -->
      <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.2 JS -->
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- Morris.js charts -->
      <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
      <!-- Sparkline -->
      <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
      <!-- jvectormap -->
      <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
      <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
      <!-- daterangepicker -->
      <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
      <!-- datepicker -->
      <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
      <!-- iCheck -->
      <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
      <!-- Slimscroll -->
      <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src='plugins/fastclick/fastclick.min.js'></script>
      <!-- AdminLTE App -->
      <script src="dist/js/app.min.js" type="text/javascript"></script>

      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js" type="text/javascript"></script>
      </body>

      </html>