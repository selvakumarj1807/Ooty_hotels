<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "RV Satellite Network";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}

?>
<?php include('header.php') ?>
<!-- Left side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Change Password

    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!--action="update_password.php"-->
          <div class="box box-warning">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="update_password.php" method="POST">
                <!-- text input -->
                <input type="hidden" name="user" id="user" class="form-control" value="<?php echo $username; ?>" />

                <div class="form-group">
                  <label>New Password</label>
                  <input type="text" name="new_password" id="new_password" class="form-control" placeholder="Enter New Password" />
                </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password" class="validate" />
                </div>

                <div class="box-footer" style="text-align:right">
                  <button type="submit" id="sbtn" name="submit" class="btn btn-primary">Update Password</button>
                </div>


                <div id="message"></div>


            </div><!-- /.box-body -->
          </div>

        </div><!--/.col (left) -->

        </form>
      </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.content -->



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

<script>
  $('#new_password, #confirm_password').on('keyup', function() {

    if ($('#new_password').val() == $('#confirm_password').val()) {
      $('#sbtn').removeAttr("disabled");
      $('#message').html(' ').css('color', 'red');

    } else {
      $('#message').html('Note : New Password and Retype Passwords are Not Matching.').css('color', 'red');
      $('#sbtn').prop('disabled', true);
    }
  });
</script>