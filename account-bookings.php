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

$email = $_COOKIE['email'];
$user_name = $_COOKIE['user_name'];

//echo $email;
//echo $user_name;

/*$username = strstr($email, '@', true);

$_SESSION['user_name'] = $username;
$_COOKIE['user_names'] = $_SESSION['user_name'];*/
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from booking.webestica.com/account-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2024 04:59:33 GMT -->

<head>
	<title>Booking - Multipurpose Online Booking Theme</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Booking - Multipurpose Online Booking Theme">

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

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body class="dashboard">

	<!-- Header START -->
	<?php include 'header.php'; ?>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Content START -->
		<section class="pt-3">
			<div class="container">
				<div class="row g-2 g-lg-4">

					<!-- Sidebar START -->

					<!-- Sidebar END -->

					<!-- Main content START -->
					<div class="col-lg-8 col-xl-9 ps-xl-5">

						<!-- Offcanvas menu button -->
						<!--<div class="d-grid mb-0 d-lg-none w-100">
							<button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
								<i class="fas fa-sliders-h"></i> Menu
							</button>
						</div>-->

						<div class="card border bg-transparent">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h4 class="card-header-title">My Bookings</h4>
							</div>

							<!-- Card body START -->
							<div class="card-body p-0">

								<!-- Tabs -->
								<ul class="nav nav-tabs nav-bottom-line nav-responsive nav-justified">


									<li class="nav-item">
										<a class="nav-link mb-0 active" data-bs-toggle="tab" href="#tab-3"><i class="bi bi-patch-check fa-fw me-1"></i>Completed Booking</a>
									</li>
									<li class="nav-item">
										<a class="nav-link mb-0" data-bs-toggle="tab" href="#tab-2"><i class="bi bi-x-octagon fa-fw me-1"></i>Canceled Booking</a>
									</li>
								</ul>


								<!-- Tabs content START -->
								<div class="tab-content p-2 p-sm-4" id="nav-tabContent">

									<!-- Tab content item START -->

									<!-- Tabs content item END -->

									<!-- Tab content item START -->
									<div class="tab-pane fade" id="tab-2">

										<?php
										require('db.php');
										$result = mysqli_query($conn, "SELECT * FROM guests WHERE guest_email = '$email' AND b_status = 'Cancel'");
										$num_rows = mysqli_num_rows($result);
										if ($num_rows == 0) {
										?>
											<div class="bg-mode shadow p-4 rounded overflow-hidden">
												<div class="row g-4 align-items-center">
													<!-- Content -->
													<div class="col-md-9">
														<h6>Looks like you have never booked with BOOKING</h6>
														<h4 class="mb-2">When you book your trip will be shown here.</h4>
														<a href="hotel-grid.php" class="btn btn-primary-soft mb-0">Start booking now</a>
													</div>
													<!-- Image -->
													<div class="col-md-3 text-end">
														<img src="assets/images/element/17.svg" class="mb-n5" alt="">
													</div>
												</div>
											</div>
										<?php
										} else { ?>

											<?php
											require('db.php');
											$slno = 0;
											$result = mysqli_query($conn, "SELECT * FROM guests where guest_email = '$email' AND b_status = 'Cancel'");
											while ($row_result = mysqli_fetch_array($result)) {
												$slno++;
												$booking_id = $row_result['booking_id'];

												$hotel_names = $row_result['hotel_names'];

												$check_in_out = $row_result['check_in_out'];
												$first_name = $row_result['first_name'];
												$last_name = $row_result['last_name'];
												$district = $row_result['district'];
												$full_name = $first_name . ' ' . $last_name

											?>
												<?php
												// Input string
												$check_in_out_split = "$check_in_out";

												// Explode the string into an array using "to" as the delimiter
												$dateRange = explode(' to ', $check_in_out_split);

												// Convert the dates to the desired format
												$check_in = date('j F', strtotime($dateRange[0]));
												$check_out = date('j F', strtotime($dateRange[1]));

												// Output the results
												//echo "Check-in: $check_in<br>";
												//echo "Check-out: $check_out";
												?>
												<!--<h6>Cancelled booking (1)</h6>-->

												<!-- Card item START -->
												<div class="card border">
													<!-- Card header -->
													<div class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
														<!-- Icon and Title -->
														<div class="d-flex align-items-center">
															<div class="icon-lg bg-light rounded-circle flex-shrink-0"><i class="fa-solid fa-hotel"></i></div>
															<!-- Title -->
															<div class="ms-2">
																<h6 class="card-title mb-0"><?php echo $hotel_names; ?> - <?php echo $district; ?></h6>
																<ul class="nav nav-divider small">
																	<li class="nav-item">Booking ID: <?php echo $booking_id; ?></li>
																	<!--<li class="nav-item">AC</li>-->
																</ul>
															</div>
														</div>

														<!-- Button -->
														<div class="mt-2 mt-md-0">
															<a href="re_booking.php?booking_id=<?php echo $booking_id; ?>" class="btn btn-primary-soft mb-0">Manage Booking</a>
															<p class="text-danger text-md-end mb-0">Booking cancelled</p>
														</div>
													</div>

													<!-- Card body -->
													<div class="card-body">
														<div class="row g-3">
															<div class="col-sm-6 col-md-4">
																<span>Check in time</span>
																<h6 class="mb-0"><?php echo $check_in; ?></h6>
															</div>

															<div class="col-sm-6 col-md-4">
																<span>Check out time</span>
																<h6 class="mb-0"><?php echo $check_out; ?></h6>
															</div>

															<div class="col-md-4">
																<span>Booked by</span>
																<h6 class="mb-0"><?php echo $full_name; ?></h6>
															</div>
														</div>
													</div>
												</div>
												<!-- Card item END -->
											<?php
											}
											?>

										<?php
										}
										?>

									</div>



									<!-- Tabs content item END -->
									<div class="tab-pane fade show active" id="tab-3">
										<?php
										require('db.php');
										$result = mysqli_query($conn, "SELECT * FROM guests WHERE guest_email = '$email' AND b_status = 'Booked'");
										$num_rows = mysqli_num_rows($result);
										if ($num_rows == 0) {
										?>
											<div class="bg-mode shadow p-4 rounded overflow-hidden">
												<div class="row g-4 align-items-center">
													<!-- Content -->
													<div class="col-md-9">
														<h6>Looks like you have never booked with BOOKING</h6>
														<h4 class="mb-2">When you book your trip will be shown here.</h4>
														<a href="hotel-grid.php" class="btn btn-primary-soft mb-0">Start booking now</a>
													</div>
													<!-- Image -->
													<div class="col-md-3 text-end">
														<img src="assets/images/element/17.svg" class="mb-n5" alt="">
													</div>
												</div>
											</div>
										<?php
										} else { ?>
											<?php
											require('db.php');
											$slno = 0;
											$result = mysqli_query($conn, "SELECT * FROM guests where guest_email = '$email' AND b_status = 'Booked'");
											while ($row_result = mysqli_fetch_array($result)) {
												$slno++;
												$booking_id = $row_result['booking_id'];

												$hotel_names = $row_result['hotel_names'];

												$check_in_out = $row_result['check_in_out'];
												$first_name = $row_result['first_name'];
												$last_name = $row_result['last_name'];
												$district = $row_result['district'];
												$full_name = $first_name . ' ' . $last_name

											?>

												<?php
												// Input string
												$check_in_out_split = "$check_in_out";

												// Explode the string into an array using "to" as the delimiter
												$dateRange = explode(' to ', $check_in_out_split);

												// Convert the dates to the desired format
												$check_in = date('j F', strtotime($dateRange[0]));
												$check_out = date('j F', strtotime($dateRange[1]));

												// Output the results
												//echo "Check-in: $check_in<br>";
												//echo "Check-out: $check_out";
												?>
												<!-- Tab content item START -->

												<!--<div class="bg-mode shadow p-4 rounded overflow-hidden">
												<div class="row g-4 align-items-center">-->
												<!-- Content -->
												<!--<div class="col-md-9">
														<h6>Looks like you have never booked with BOOKING</h6>
														<h4 class="mb-2">When you book your trip will be shown here.</h4>
														<a href="index.php" class="btn btn-primary-soft mb-0">Start booking now</a>
													</div>-->
												<!-- Image -->
												<!--<div class="col-md-3 text-end">
														<img src="assets/images/element/17.svg" class="mb-n5" alt="">
													</div>
												</div>
											</div>-->

												<!-- Card item START -->
												<div class="card border">
													<!-- Card header -->
													<div class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
														<!-- Icon and Title -->
														<div class="d-flex align-items-center">
															<div class="icon-lg bg-light rounded-circle flex-shrink-0"><i class="fa-solid fa-hotel"></i></div>
															<!-- Title -->
															<div class="ms-2">
																<h6 class="card-title mb-0"><?php echo $hotel_names; ?> - <?php echo $district; ?></h6>
																<ul class="nav nav-divider small">
																	<li class="nav-item">Booking ID: <?php echo $booking_id; ?></li>
																	<!--<li class="nav-item">AC</li>-->
																</ul>
															</div>
														</div>

														<!-- Button -->
														<div class="mt-2 mt-md-0">
															<a href="cancel_booking.php?booking_id=<?php echo $booking_id; ?>" class="btn btn-primary-soft mb-0">Manage Booking</a>
															<!--<p class="text-danger text-md-end mb-0">Booking cancelled</p>-->
														</div>
													</div>

													<!-- Card body -->
													<div class="card-body">
														<div class="row g-3">
															<div class="col-sm-6 col-md-4">
																<span>Check in time</span>
																<h6 class="mb-0"><?php echo $check_in; ?></h6>
															</div>

															<div class="col-sm-6 col-md-4">
																<span>Check out time</span>
																<h6 class="mb-0"><?php echo $check_out; ?></h6>
															</div>

															<div class="col-md-4">
																<span>Booked by</span>
																<h6 class="mb-0"><?php echo $full_name; ?></h6>
															</div>
														</div>
													</div>
												</div>
												<!-- Card item END -->
											<?php
											}
											?>
										<?php
										}
										?>
									</div>
									<!-- Tabs content item END -->
								</div>

							</div>
							<!-- Card body END -->
						</div>

					</div>
					<!-- Main content END -->
				</div>
			</div>
		</section>
		<!-- =======================
Content END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="bg-dark p-3">
		<div class="container">
			<div class="row align-items-center">

				<!-- Widget -->
				<div class="col-md-4">
					<div class="text-center text-md-start mb-3 mb-md-0">
						<a href="index.php"> <img class="h-30px" src="assets/images/logo-light.svg" alt="logo"> </a>
					</div>
				</div>

				<!-- Widget -->
				<div class="col-md-4">
					<div class="text-body-secondary text-primary-hover"> Copyrights ©2023 Booking. Build by <a href="https://www.tamilinfotechnology.com/" class="text-body-secondary">Tamil Info technology</a>. </div>
				</div>

				<!-- Widget -->
				<div class="col-md-4">
					<ul class="list-inline mb-0 text-center text-md-end">
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-facebook"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-instagram"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-linkedin-in"></i></a></li>
						<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- =======================
Footer END -->

	<!-- Back to top -->
	<div class="back-top"></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from booking.webestica.com/account-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2024 04:59:34 GMT -->

</html>