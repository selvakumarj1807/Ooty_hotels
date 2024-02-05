<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Ecom";
$id = $_REQUEST["id"];

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
      Edit Hotel
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- <div class="row">
            
           
            <div class="col-lg-12">

             <div class="box box-warning">
                <div class="box-header">
                  
                </div>
                //<!/.box-header -->
    <div class="box-body">
      <form role="form" action="update_hotel.php" method="POST" enctype="multipart/form-data">

        <?php
        require('db.php');
        $slno = 0;
        $result = mysqli_query($conn, "SELECT * FROM hotels where id= '$id'");
        while ($row_result = mysqli_fetch_array($result)) {
          $slno++;
          $item_id = $row_result['id'];

          $address = $row_result['hotel_address'];

          $hotel_name = $row_result['hotel_name'];
          $image = $row_result['image_path'];
          $original_cost = $row_result['original_cost'];
          $discount_cost = $row_result['discount_cost'];

          $tax_amount = $row_result['tax_amount'];
          $adult = $row_result['adult'];
          $child = $row_result['child'];

          $district = $row_result['district'];
          $state = $row_result['hotel_state'];
          $pincode = $row_result['pincode'];
          $phone = $row_result['phone'];

        ?>
        <?php
        }
        ?>
        <!-- text input -->

        <input type="hidden" name="id" value="<?php echo $id; ?>" />


        <!-- textarea -->




        <div class="col-md-4">


          <div class="form-group">
            <label for="ban">Hotel</label>
            <input class="form-control" type="text" name="hotel_name" value="<?php echo $hotel_name; ?>" />

            <label for="ban">City</label>
            <input class="form-control" type="text" name="city" value="<?php echo $address; ?>" />
            <br>

            <label for="ban">District</label>
            <input class="form-control" type="text" name="district" value="<?php echo $district; ?>" />
            <br>

            <label for="ban">State</label>
            <input class="form-control" type="text" name="state" value="<?php echo $state; ?>" />
            <br>

            <label for="ban">Pincode</label>
            <input class="form-control" type="text" name="pincode" value="<?php echo $pincode; ?>" />
            <br>

            <label for="ban">Mobile Number</label>
            <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" />
            <br>

            <label for="ban">Original Cost per day</label>
            <input class="form-control" type="text" name="original_cost" value="<?php echo $original_cost; ?>" />
            <br>

            <label for="ban">Discount Cost per day</label>
            <input class="form-control" type="text" name="discount_cost" value="<?php echo $discount_cost; ?>" />
            <br>

            <label for="ban">Tax amount</label>
            <input class="form-control" type="text" name="tax_amount" value="<?php echo $tax_amount; ?>" />
            <br>

            <label for="ban">Cost per Adult</label>
            <input class="form-control" type="text" name="adult" value="<?php echo $adult; ?>" />
            <br>

            <label for="ban">Cost per Child</label>
            <input class="form-control" type="text" name="child" value="<?php echo $child; ?>" />
            <br>


            <div class="input-wrap">
              <label for="save">Image </label>
              <input type="file" name="image" accept="image/jpeg" value="<?php echo $image; ?>">
              <input class="file-path validate" type="hidden" placeholder="Choose your profile image">
            </div>
          </div>

          <br>
          <br>
          <br>


          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="hotel.php"><button type="button" class="btn btn-primary">Back</button></a>


        </div><!-- /.box-body -->
    </div>





    </form>

</div> <!-- /.row -->
</section><!-- /.content -->

<!--/////////////////////////////////////////////////////////////////////////-->
</div>

</body>
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


</html>