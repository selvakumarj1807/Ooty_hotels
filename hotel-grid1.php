<?php
session_start();
error_reporting(0);
require('db.php');

// Check if user is logged in
if (!isset($_SESSION['email']) && isset($_COOKIE['email']) && isset($_COOKIE['user_name'])) {
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['user_name'] = $_COOKIE['user_name'];
}

$_COOKIE['email'] = $_SESSION['email'];
$_COOKIE['user_name'] = $_SESSION['user_name'];

/*$username = strstr($email, '@', true);

$_SESSION['user_name'] = $username;
$_COOKIE['user_names'] = $_SESSION['user_name'];*/
?>

<?php
//session_start();
//require 'db.php';

$check_in_out = $_POST['check_in_out'];
$hotel_address = $_POST['hotel_address'];
$guests_rooms = $_POST['guests_rooms'];

list($guest, $room, $child) = sscanf($guests_rooms, "%d Adult %d Room %d Child");

/*
echo "$check_in_out";
echo "<br>";
echo "$hotel_address";
echo "<br>";
echo "$guests_rooms";
*/


?>

<?php
// Input string
$hotel_address_split = "$hotel_address";

// Explode the string into an array using "to" as the delimiter
$dateRange = explode(',', $hotel_address_split);

// Convert the dates to the desired format
$hotel_district = $dateRange[0];
//$hotel_state = $dateRange[1];

// Output the results
//echo "Check-in: $hotel_district<br>";
//echo "Check-out: $hotel_state";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from booking.webestica.com/hotel-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:09:05 GMT -->

<head>
	<title>Best Ooty hotels</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Online Booking - Designed by Tamil info Technology">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function(theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
			var el = document.querySelector('.theme-icon-active');
			if (el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
					const activeThemeIcon = document.querySelector('.theme-icon-active use')
					const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
					const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

					document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
						element.classList.remove('active')
					})

					btnToActive.classList.add('active')
					activeThemeIcon.setAttribute('href', svgOfActiveBtn)
				}

				window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
					if (storedTheme !== 'light' || storedTheme !== 'dark') {
						setTheme(getPreferredTheme())
					}
				})

				showActiveTheme(getPreferredTheme())

				document.querySelectorAll('[data-bs-theme-value]')
					.forEach(toggle => {
						toggle.addEventListener('click', () => {
							const theme = toggle.getAttribute('data-bs-theme-value')
							localStorage.setItem('theme', theme)
							setTheme(theme)
							showActiveTheme(theme)
						})
					})

			}
		})
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Poppins:wght@400;500;700&amp;display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/nouislider/nouislider.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

	<!-- Header START -->

	<?php include 'header.php'; ?>

	<!-- Header END -->


	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Main Banner START -->
		<section class="pt-0">
			<div class="container">
				<!-- Background image -->
				<div class="rounded-3 p-3 p-sm-5" style="background-image: url(images/05.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
					<!-- Banner title -->
					<div class="row my-2 my-xl-5">
						<div class="col-md-8 mx-auto">
							<h1 class="text-center text-white">100 Hotels in Ooty</h1>
						</div>
					</div>

					<!-- Booking from START -->
					<form role="form" action="hotel-grid1.php" method="POST" class="bg-mode shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4 mb-4" enctype="multipart/form-data">
						<div class="row g-4 align-items-center">
							<!-- Location -->
							<div class="col-lg-4">
								<div class="form-control-border form-control-transparent form-fs-md d-flex">
									<!-- Icon -->
									<i class="bi bi-geo-alt fs-3 me-2 mt-2"></i>
									<!-- Select input -->
									<div class="flex-grow-1">
										<label class="form-label">Location</label>
										<select class="form-select js-choice" data-search-enabled="true" name="hotel_address">
											<option value="<?php echo $hotel_address; ?>"><?php echo $hotel_address; ?></option>
											<?php
											// hotel_navbar.php
											require('db.php');
											$slno = 0;
											$result = mysqli_query($conn, "SELECT distinct district,hotel_state FROM hotels");
											while ($row_result = mysqli_fetch_array($result)) {
												$slno++;
												$district = $row_result['district'];
												$hotel_state = $row_result['hotel_state'];

											?>
												<option><?php echo $district; ?>,<?php echo $hotel_state; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>

							<!-- Check in -->
							<div class="col-lg-4">
								<div class="d-flex">
									<!-- Icon -->
									<i class="bi bi-calendar fs-3 me-2 mt-2"></i>
									<!-- Date input -->
									<div class="form-control-border form-control-transparent form-fs-md">
										<label class="form-label">Check in - out</label>
										<input type="text" name="check_in_out" class="form-control flatpickr" data-mode="range" value="<?php echo $check_in_out; ?>">
									</div>
								</div>
							</div>

							<!-- Guest -->
							<div class="col-lg-4">
								<div class="form-control-border form-control-transparent form-fs-md d-flex">
									<!-- Icon -->
									<i class="bi bi-person fs-3 me-2 mt-2"></i>
									<!-- Dropdown input -->
									<div class="w-100">
										<label class="form-label">Guests & rooms</label>
										<div class="dropdown guest-selector me-2">
											<input type="text" name="guests_rooms" class="form-guest-selector form-control selection-result" id="dropdownShare" data-bs-auto-close="outside" data-bs-toggle="dropdown" value="<?php echo $guests_rooms; ?>">

											<!-- dropdown items -->
											<ul class="dropdown-menu guest-selector-dropdown" aria-labelledby="dropdownShare">
												<!-- Adult -->
												<li class="d-flex justify-content-between">
													<div>
														<h6 class="mb-0">Adults</h6>
														<small>Ages 13 or above</small>
													</div>

													<div class="hstack gap-1 align-items-center">
														<button type="button" class="btn btn-link adult-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
														<h6 class="guest-selector-count mb-0 adults"><?php echo $guest; ?></h6>
														<button type="button" class="btn btn-link adult-add p-0 mb-0"><i class="bi bi-plus-circle fs-5 fa-fw"></i></button>
													</div>
												</li>

												<!-- Divider -->
												<li class="dropdown-divider"></li>

												<!-- Child -->
												<li class="d-flex justify-content-between">
													<div>
														<h6 class="mb-0">Child</h6>
														<small>Ages 13 below</small>
													</div>

													<div class="hstack gap-1 align-items-center">
														<button type="button" class="btn btn-link child-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
														<h6 class="guest-selector-count mb-0 child"><?php echo $child; ?></h6>
														<button type="button" class="btn btn-link child-add p-0 mb-0"><i class="bi bi-plus-circle fs-5 fa-fw"></i></button>
													</div>
												</li>

												<!-- Divider -->
												<li class="dropdown-divider"></li>

												<!-- Rooms -->
												<li class="d-flex justify-content-between">
													<div>
														<h6 class="mb-0">Rooms</h6>
														<small>Max room 8</small>
													</div>

													<div class="hstack gap-1 align-items-center">
														<button type="button" class="btn btn-link room-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
														<h6 class="guest-selector-count mb-0 rooms"><?php echo $room; ?></h6>
														<button type="button" class="btn btn-link room-add p-0 mb-0"><i class="bi bi-plus-circle fs-5 fa-fw"></i></button>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Button -->
						<div class="btn-position-md-middle">
							<button type="submit" class="icon-lg btn btn-round btn-primary mb-0"><i class="bi bi-search fa-fw"></i></button>
						</div>
					</form>
					<!-- Booking from END -->
				</div>
			</div>
		</section>
		<!-- =======================
Main Banner END -->



		<!-- =======================
Hotel grid START -->
		<section class="pt-0">
			<div class="container">
				<div class="row g-4">




					<?php
					require('db.php');

					// Fetch data from the 'hotels' table
					$result = mysqli_query($conn, "SELECT * FROM hotels where district = '$hotel_district'");

					while ($row_result = mysqli_fetch_array($result)) {
						// Extract necessary details
						$hotelName = $row_result['hotel_name'];
						$originalCost = $row_result['original_cost'];
						$discountCost = $row_result['discount_cost'];

						$image = $row_result['image_path'];

						// Other details...

						// Now, you can use these details to populate your card item
					?>
						<!-- Card item START -->
						<div class="col-md-6 col-xl-4">
							<div class="card shadow p-2 pb-0 h-100">
								<a href="about_hotel.php?hotel_name=<?php echo $hotelName; ?>&check_in_out=<?php echo $check_in_out; ?>&guests_rooms=<?php echo $guests_rooms; ?>&hotel_address=<?php echo $hotel_address; ?>">
									<!-- Image -->
									<img src="admin/Upload/<?php echo $image; ?>" class="rounded-2" alt="Card image">
								</a>
								<!-- Card body START -->
								<div class="card-body px-3 pb-0">
									<!-- Rating and cart -->
									<!-- Other details... -->

									<!-- Title -->
									<h5 class="card-title"><a href="about_hotel.php?hotel_name=<?php echo $hotelName; ?>&check_in_out=<?php echo $check_in_out; ?>&guests_rooms=<?php echo $guests_rooms; ?>&hotel_address=<?php echo $hotel_address; ?>"><?php echo $hotelName; ?></a></h5>

									<!-- List -->
									<!-- List -->
									<ul class="nav nav-divider mb-2 mb-sm-3">
										<li class="nav-item">Air Conditioning</li>
										<li class="nav-item">Wifi</li>
										<li class="nav-item">Kitchen</li>
										<li class="nav-item">Pool</li>
									</ul>
									<!-- Other details... -->
								</div>
								<!-- Card body END -->

								<!-- Card footer START-->
								<div class="card-footer pt-0">
									<!-- Price and Button -->
									<div class="d-sm-flex justify-content-sm-between align-items-center">
										<!-- Price -->
										<div class="d-flex align-items-center">
											<h5 class="fw-normal text-success mb-0 me-1">₹<?php echo $discountCost; ?></h5>
											<span class="mb-0 me-2">/day</span>
											<span class="text-decoration-line-through">₹<?php echo $originalCost; ?></span>
										</div>
										<!-- Button -->
										<div class="mt-2 mt-sm-0 z-index-2">
											<a href="about_hotel.php?hotel_name=<?php echo $hotelName; ?>&check_in_out=<?php echo $check_in_out; ?>&guests_rooms=<?php echo $guests_rooms; ?>&hotel_address=<?php echo $hotel_address; ?>" class="btn btn-sm btn-primary-soft mb-0 w-100">View Detail<i class="bi bi-arrow-right ms-2"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Card item END -->
					<?php
					}
					?>


				</div> <!-- Row END -->

				<!-- Pagination -->
				<!--	<div class="row">
					<div class="col-12">
						<nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
							<ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
								<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fa-solid fa-angle-left"></i></a></li>
								<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
								<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
								<li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
								<li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
								<li class="page-item mb-0"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>-->

			</div>
		</section>
		<!-- =======================
Hotel grid END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<?php include 'footer.php'; ?>

	<!-- =======================
Footer END -->

	<!-- Back to top -->
	<div class="back-top"></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/flatpickr/js/flatpickr.min.js"></script>
	<script src="assets/vendor/choices/js/choices.min.js"></script>
	<script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="assets/vendor/nouislider/nouislider.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from booking.webestica.com/hotel-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:09:09 GMT -->

</html>