<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Ecom";

//$id = $_REQUEST["id"];

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}

?>
<?php include('header.php') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ABOUT HOTEL
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-warning">
          <div class="box-body">

            <?php
            $hotel_name = $_GET['hotel_name'];
            $address = $_GET['address'];

            ?>
            <form role="form" action="about_hotel_save.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="ban">Hotel </label>

                <input type="text" class="form-control" name="hotel_name" value="<?php echo $hotel_name; ?>">


              </div>

              <div class="form-group">
                <label for="ban">Hotel Address</label>

                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">


              </div>

              <div class="form-group">
                <label for="hotel_description">Hotel Description</label>
                <textarea class="form-control" id="hotel_description" name="hotel_description" rows="6" placeholder="Enter the hotel description"></textarea>

                <br>
              </div>


              <div class="form-group">
                <label for="ban">Amenities</label>
                <label for="ban">Activities</label>
                <input class="form-control" id="ban" name="activities[]" value="Swimming pool, Spa, Kids' play area, Gym
" />
                <br>
              </div>
              <div class="form-group">
                <label for="ban">Amenities</label>
                <label for="ban">Services</label>
                <input class="form-control" id="ban" name="services[]" value="Dry cleaning, Room Service, Special service, Waiting Area, Laundry facilities, Ironing Service
" />
                <br>

              </div>

              <div class="form-group">
                <label for="save">Images</label>
                <input type="file" name="image[]" multiple>
                <input class="file-path validate" type="hidden" placeholder="Choose your profile image">

              </div>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <a href="product.php?category=<?php echo $category; ?>"><button type="button" class="btn btn-primary">Back</button></a>

          </div><!-- /.box-body -->
        </div>
        </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!--/.col (right) -->
</div> <!-- /.row -->
</section><!-- /.content -->
</div>


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