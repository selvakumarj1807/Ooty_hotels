<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Kavin Online Market";
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
      Add Hotels </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">


      <div class="col-lg-12">

        <div class="box box-warning">
          <div class="box-header">

          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="save_hotel.php" method="POST" enctype="multipart/form-data">


              <!-- text input -->


              <!-- textarea -->
              <div class="form-group">
                <label for="ban">Hotel Name</label>
                <input class="form-control" id="ban" name="hotel_name" placeholder="Hotel 01" />
                <br>

                <label for="ban">City</label>
                <input class="form-control" id="ban" name="city" placeholder="Enter the hotel Address" />
                <br>

                <label for="ban">District</label>
                <input class="form-control" id="ban" name="district" placeholder="Enter the hotel Address" />
                <br>
                
                <label for="ban">State</label>
                <input class="form-control" id="ban" name="state" placeholder="Enter the hotel Address" />
                <br>
                
                <label for="ban">Pincode</label>
                <input class="form-control" id="ban" name="pincode" placeholder="Enter the hotel Address" />
                <br>

                <label for="ban">Mobile Number</label>
                <input class="form-control" id="ban" name="phone" placeholder="Enter the hotel Address" />
                <br>

                <label for="ban">Original Cost / day</label>
                <input class="form-control" id="ban" name="original_cost" placeholder="2000" />
                <br>

                <label for="ban">Discount Cost / day</label>
                <input class="form-control" id="ban" name="discount_cost" placeholder="1500" />
                <br>

                <label for="ban">Tax amount</label>
                <input class="form-control" id="ban" name="tax_amount" placeholder="2000" />
                <br>

                <label for="ban">Cost per Adult</label>
                <input class="form-control" id="ban" name="adult" placeholder="1500" />
                <br>

                <label for="ban">Cost per Child</label>
                <input class="form-control" id="ban" name="child" placeholder="1500" />
                <br>

                <div class="input-wrap">
                  <label for="save">Images</label>
                  <input type="file" name="image" accept="image/jpeg" required>
                  <input class="file-path validate" type="hidden" placeholder="Choose your profile image">

                </div>

                <br>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>


              </div><!-- /.box-body -->
          </div>





          </form>

          <section class="content-header">
            <h3>
              Hotel List
            </h3>
          </section>
          <br>
          <br />


          <div id="table-content">
            <table class="table table-hover table-bordered">
              <thead class="thead-light ">
                <tr>
                  <th>Id</th>
                  <th>Hotel_name</th>
                  <th>Address</th>
                  <th>Original Cost</th>
                  <th>Discount Cost</th>
                  <th>Images</th>

                  <th class="text-center">Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php
                require('db.php');
                $slno = 0;
                $result = mysqli_query($conn, "SELECT * FROM hotels");
                while ($row_result = mysqli_fetch_array($result)) {
                  $slno++;
                  $item_id = $row_result['id'];

                  $address = $row_result['hotel_address'];

                  $hotel_name = $row_result['hotel_name'];
                  $image = $row_result['image_path'];
                  $original_cost = $row_result['original_cost'];
                  $discount_cost = $row_result['discount_cost'];

                ?>
                  <tr>
                    <td><?php echo $slno; ?></td>

                    <td><?php echo $hotel_name; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $original_cost; ?></td>
                    <td><?php echo $discount_cost; ?></td>


                    <td><img class="img-responsive" width="40" height="55" src="Upload/<?php echo $image; ?>" /></td>
                    <td class="text-center">
                      <a href="edit_hotel.php?id=<?php echo $row_result['id']; ?>">Edit<i class="fa fa-edit" style="color:red"></i></a> &nbsp;&nbsp;&nbsp;
                      <a href="remove_hotel.php?id=<?php echo $row_result['id']; ?>">Remove<i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
                    </td>


                  </tr>
                <?php
                }
                ?>
              </tbody>
              <table>


          </div>



        </div><!-- /.box -->
      </div><!--/.col (right) -->
    </div> <!-- /.row -->
  </section><!-- /.content -->

  <!--/////////////////////////////////////////////////////////////////////////-->
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