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


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from booking.webestica.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:08:00 GMT -->

<head>
	<title>Best Ooty hotels</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Online Booking - Designed by Tamil info Technology">
	<!-- Add this line in the head section of your HTML file -->
	<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
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
	<link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">


	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body class="has-navbar-mobile">

	<!-- Header START -->

	<?php include 'header.php'; ?>

	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Main Banner START -->
		<section class="pt-3 pt-lg-5">
			<div class="container">
				<!-- Content and Image START -->
				<div class="row g-4 g-lg-5">
					<!-- Content -->
					<div class="col-lg-6 position-relative mb-4 mb-md-0">
						<!-- Title -->
						<h1 class="mb-4 mt-md-5 display-5">Find the top
							<span class="position-relative z-index-9">Hotels in Ooty.
								<!-- SVG START -->
								<span class="position-absolute top-50 start-50 translate-middle z-index-n1 d-none d-md-block mt-4">
									<svg width="390.5px" height="21.5px" viewBox="0 0 445.5 21.5">
										<path class="fill-primary opacity-7" d="M409.9,2.6c-9.7-0.6-19.5-1-29.2-1.5c-3.2-0.2-6.4-0.2-9.7-0.3c-7-0.2-14-0.4-20.9-0.5 c-3.9-0.1-7.8-0.2-11.7-0.3c-1.1,0-2.3,0-3.4,0c-2.5,0-5.1,0-7.6,0c-11.5,0-23,0-34.5,0c-2.7,0-5.5,0.1-8.2,0.1 c-6.8,0.1-13.6,0.2-20.3,0.3c-7.7,0.1-15.3,0.1-23,0.3c-12.4,0.3-24.8,0.6-37.1,0.9c-7.2,0.2-14.3,0.3-21.5,0.6 c-12.3,0.5-24.7,1-37,1.5c-6.7,0.3-13.5,0.5-20.2,0.9C112.7,5.3,99.9,6,87.1,6.7C80.3,7.1,73.5,7.4,66.7,8 C54,9.1,41.3,10.1,28.5,11.2c-2.7,0.2-5.5,0.5-8.2,0.7c-5.5,0.5-11,1.2-16.4,1.8c-0.3,0-0.7,0.1-1,0.1c-0.7,0.2-1.2,0.5-1.7,1 C0.4,15.6,0,16.6,0,17.6c0,1,0.4,2,1.1,2.7c0.7,0.7,1.8,1.2,2.7,1.1c6.6-0.7,13.2-1.5,19.8-2.1c6.1-0.5,12.3-1,18.4-1.6 c6.7-0.6,13.4-1.1,20.1-1.7c2.7-0.2,5.4-0.5,8.1-0.7c10.4-0.6,20.9-1.1,31.3-1.7c6.5-0.4,13-0.7,19.5-1.1c2.7-0.1,5.4-0.3,8.1-0.4 c10.3-0.4,20.7-0.8,31-1.2c6.3-0.2,12.5-0.5,18.8-0.7c2.1-0.1,4.2-0.2,6.3-0.2c11.2-0.3,22.3-0.5,33.5-0.8 c6.2-0.1,12.5-0.3,18.7-0.4c2.2-0.1,4.4-0.1,6.7-0.1c11.5-0.1,23-0.2,34.6-0.4c7.2-0.1,14.4-0.1,21.6-0.1c12.2,0,24.5,0.1,36.7,0.1 c2.4,0,4.8,0.1,7.2,0.2c6.8,0.2,13.5,0.4,20.3,0.6c5.1,0.2,10.1,0.3,15.2,0.4c3.6,0.1,7.2,0.4,10.8,0.6c10.6,0.6,21.1,1.2,31.7,1.8 c2.7,0.2,5.4,0.4,8,0.6c2.9,0.2,5.8,0.4,8.6,0.7c0.4,0.1,0.9,0.2,1.3,0.3c1.1,0.2,2.2,0.2,3.2-0.4c0.9-0.5,1.6-1.5,1.9-2.5 c0.6-2.2-0.7-4.5-2.9-5.2c-1.9-0.5-3.9-0.7-5.9-0.9c-1.4-0.1-2.7-0.3-4.1-0.4c-2.6-0.3-5.2-0.4-7.9-0.6 C419.7,3.1,414.8,2.9,409.9,2.6z" />
									</svg>
								</span>
								<!-- SVG END -->
							</span>
						</h1>
						<!-- Info -->
						<br>
						<!-- Buttons -->
						<div class="hstack gap-4 flex-wrap align-items-center">
							<!-- Button -->
							<!-- Story button -->
							<a data-glightbox="" data-gallery="office-tour" href="https://youtu.be/q-tRUaROefw?si=DPM86EAWlULGsuk6" class="d-block">
								<!-- Avatar -->
								<div class="avatar avatar-md z-index-1 position-relative me-2">
									<img class="avatar-img rounded-circle" src="images/12.jpg" alt="avatar">
									<!-- Video button -->
									<div class="btn btn-xs btn-round btn-white shadow-sm position-absolute top-50 start-50 translate-middle z-index-9 mb-0">
										<i class="fas fa-play"></i>
									</div>
								</div>
								<div class="align-middle d-inline-block">
									<h6 class="btn btn-primary-soft mb-0">Watch our story</h6>
								</div>
							</a>
						</div>
					</div>

					<!-- Image -->
					<div class="col-lg-6 position-relative">

						<img src="images/banner_img5.jpg" class="rounded" alt="">



						<!-- Support guid -->
						<div class="position-absolute top-0 end-0 z-index-1 mt-n4">
							<div class="bg-blur border border-light rounded-3 text-center shadow-lg p-3">
								<!-- Title -->
								<i class="bi bi-headset text-danger fs-3"></i>
								<h5 class="text-dark mb-1">24 / 7</h5>
								<h6 class="text-dark fw-light small mb-0">Guide Supports</h6>
							</div>
						</div>

						<!-- Round image group -->
						<div class="vstack gap-5 align-items-center position-absolute top-0 start-0 d-none d-md-flex mt-4 ms-n3">
							<img class="icon-lg shadow-lg border border-3 border-white rounded-circle" src="images/banner_imges.jpeg" alt="avatar">
							<img class="icon-xl shadow-lg border border-3 border-white rounded-circle" src="images/banner_inside_img2.jpg" alt="avatar">
						</div>
					</div>
				</div>
				<!-- Content and Image END -->

				<!-- Search START -->
				<div class="row">
					<div class="col-xl-11 position-relative mt-n3 mt-xl-n9">
						<!-- Title -->
						<h6 class="d-none d-xl-block mb-3">Check Availability</h6>

						<!-- Booking from START -->
						<form role="form" action="hotel-grid1.php" method="POST" class="card shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4" enctype="multipart/form-data">
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

												<option value="">Select location</option>

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
											<input type="text" name="check_in_out" class="form-control flatpickr" data-mode="range" dateFormat="d M Y" placeholder="Select date">
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
												<input type="text" name="guests_rooms" class="form-guest-selector form-control selection-result" value="1 Adult 1 Room 0 Child" data-bs-auto-close="outside" data-bs-toggle="dropdown">

												<!-- dropdown items -->
												<ul class="dropdown-menu guest-selector-dropdown">
													<!-- Adult -->
													<li class="d-flex justify-content-between">
														<div>
															<h6 class="mb-0">Adults</h6>
															<small>Ages 13 or above</small>
														</div>

														<div class="hstack gap-1 align-items-center">
															<button type="button" class="btn btn-link adult-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
															<h6 class="guest-selector-count mb-0 adults">1</h6>
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
															<h6 class="guest-selector-count mb-0 child">0</h6>
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
															<h6 class="guest-selector-count mb-0 rooms">1</h6>
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
				<!-- Search END -->
			</div>
		</section>
		<!-- =======================
Main Banner END -->

		<!-- =======================
Best deal START -->
		<section class="pb-2 pb-lg-5">
			<div class="container">
				<!-- Slider START -->
				<div class="tiny-slider arrow-round arrow-blur arrow-hover">
					<div class="tiny-slider-inner" data-autoplay="true" data-arrow="true" data-edge="2" data-dots="false" data-items-xl="3" data-items-lg="2" data-items-md="1">
						<!-- Slider item -->
						<div>
							<div class="card border rounded-3 overflow-hidden">
								<div class="row g-0 align-items-center">
									<!-- Image -->
									<div class="col-sm-6">
										<img src="images/offer/01.jpg" class="card-img rounded-0" alt="">
									</div>

									<!-- Title and content -->
									<div class="col-sm-6">
										<div class="card-body px-3">
											<h6 class="card-title"><a href="#" class="stretched-link">Daily 50 Lucky Winners get a Free Stay</a></h6>
											<p class="mb-0">Valid till: 15 Nov</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Slider item -->
						<div>
							<div class="card border rounded-3 overflow-hidden">
								<div class="row g-0 align-items-center">
									<!-- Image -->
									<div class="col-sm-6">
										<img src="images/offer/04.jpg" class="card-img rounded-0" alt="">
									</div>

									<!-- Title and content  offer-detail.html-->
									<div class="col-sm-6">
										<div class="card-body px-3">
											<h6 class="card-title"><a href="#" class="stretched-link">Up to 60% OFF</a></h6>
											<p class="mb-0">On Hotel Bookings Online</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Slider item -->
						<div>
							<div class="card border rounded-3 overflow-hidden">
								<div class="row g-0 align-items-center">
									<!-- Image -->
									<div class="col-sm-6">
										<img src="images/offer/03.jpg" class="card-img rounded-0" alt="">
									</div>

									<!-- Title and content -->
									<div class="col-sm-6">
										<div class="card-body px-3">
											<h6 class="card-title"><a href="#" class="stretched-link">Book & Enjoy</a></h6>
											<p class="mb-0">20% Off on the best available room rate</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Slider item -->
						<div>
							<div class="card border rounded-3 overflow-hidden">
								<div class="row g-0 align-items-center">
									<!-- Image -->
									<div class="col-sm-6">
										<img src="images/offer/02.jpg" class="card-img rounded-0" alt="">
									</div>

									<!-- Title and content -->
									<div class="col-sm-6">
										<div class="card-body px-3">
											<h6 class="card-title"><a href="#" class="stretched-link">Hot Summer Nights</a></h6>
											<p class="mb-0">Up to 3 nights free!</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Slider END -->
			</div>
		</section>
		<!-- =======================
Best deal END -->


		<!-- =======================
Featured Hotels START -->
		<section>
			<div class="container">

				<!-- Title -->
				<div class="row mb-4">
					<div class="col-12 text-center">
						<!--<h2 class="mb-0">Featured Hotels</h2>-->
					</div>
				</div>

				<div class="row g-4">
					<!-- Hotel item -->
					<div class="col-sm-6 col-xl-3">
						<!-- Card START -->
						<div class="card card-img-scale overflow-hidden bg-transparent">
							<!-- Image and overlay -->
							<div class="card-img-scale-wrapper rounded-3">
								<!-- Image -->
								<img src="images/property/01.jpg" class="card-img" alt="hotel image">
								<!-- Badge -->
								<div class="position-absolute bottom-0 start-0 p-3">
									<div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i class="bi bi-geo-alt me-2"></i>Ooty Tamilnadu</div>
								</div>
							</div>

							<!-- Card body -->
							<div class="card-body px-2">
								<!-- Title -->
								<h5 class="card-title"><a href="hotel-grid.php" class="stretched-link">Hotels</a></h5>
								<!-- Price and rating -->
								<div class="d-flex justify-content-between align-items-center">
									<h6 class="text-success mb-0"> <small class="fw-light"></small> </h6>
									<h6 class="mb-0">4.5<i class="fa-solid fa-star text-warning ms-1"></i></h6>
								</div>
							</div>
						</div>
						<!-- Card END -->
					</div>

					<!-- Hotel item -->
					<div class="col-sm-6 col-xl-3">
						<!-- Card START -->
						<div class="card card-img-scale overflow-hidden bg-transparent">
							<!-- Image and overlay -->
							<div class="card-img-scale-wrapper rounded-3">
								<!-- Image -->
								<img src="images/property/02.jpg" class="card-img" alt="hotel image">
								<!-- Badge -->
								<div class="position-absolute bottom-0 start-0 p-3">
									<div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i class="bi bi-geo-alt me-2"></i>Ooty Tamilnadu</div>
								</div>
							</div>

							<!-- Card body -->
							<div class="card-body px-2">
								<!-- Title -->
								<h5 class="card-title"><a href="#" class="stretched-link">Apartments</a></h5>
								<!-- Price and rating -->
								<div class="d-flex justify-content-between align-items-center">
									<h6 class="text-success mb-0"> <small class="fw-light"></small> </h6>
									<h6 class="mb-0">4.8<i class="fa-solid fa-star text-warning ms-1"></i></h6>
								</div>
							</div>
						</div>
						<!-- Card END -->
					</div>

					<!-- Hotel item -->
					<div class="col-sm-6 col-xl-3">
						<!-- Card START -->
						<div class="card card-img-scale overflow-hidden bg-transparent">
							<!-- Image and overlay -->
							<div class="card-img-scale-wrapper rounded-3">
								<!-- Image -->
								<img src="images/property/03.jpg" class="card-img" alt="hotel image">
								<!-- Badge -->
								<div class="position-absolute bottom-0 start-0 p-3">
									<div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i class="bi bi-geo-alt me-2"></i>Ooty Tamilnadu</div>
								</div>
							</div>

							<!-- Card body -->
							<div class="card-body px-2">
								<!-- Title -->
								<h5 class="card-title"><a href="#" class="stretched-link">Resorts</a></h5>
								<!-- Price and rating -->
								<div class="d-flex justify-content-between align-items-center">
									<h6 class="text-success mb-0"> <small class="fw-light"></small> </h6>
									<h6 class="mb-0">4.6<i class="fa-solid fa-star text-warning ms-1"></i></h6>
								</div>
							</div>
						</div>
						<!-- Card END -->
					</div>

					<!-- Hotel item -->
					<div class="col-sm-6 col-xl-3">
						<!-- Card START -->
						<div class="card card-img-scale overflow-hidden bg-transparent">
							<!-- Image and overlay -->
							<div class="card-img-scale-wrapper rounded-3">
								<!-- Image -->
								<img src="images/property/04.jpg" class="card-img" alt="hotel image">
								<!-- Badge -->
								<div class="position-absolute bottom-0 start-0 p-3">
									<div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i class="bi bi-geo-alt me-2"></i>Ooty Tamilnadu</div>
								</div>
							</div>

							<!-- Card body -->
							<div class="card-body px-2">
								<!-- Title -->
								<h5 class="card-title"><a href="#" class="stretched-link">Villas</a></h5>
								<!-- Price and rating -->
								<div class="d-flex justify-content-between align-items-center">
									<h6 class="text-success mb-0"> <small class="fw-light"></small> </h6>
									<h6 class="mb-0">4.8<i class="fa-solid fa-star text-warning ms-1"></i></h6>
								</div>
							</div>
						</div>
						<!-- Card END -->
					</div>

				</div> <!-- Row END -->
			</div>
		</section>
		<!-- =======================
Featured Hotels END -->





		<!-- =======================
Download app START -->
		<section class="bg-light">
			<div class="container">
				<div class="row g-4">

					<!-- Help -->
					<div class="col-md-6 col-xxl-4">
						<div class="bg-body d-flex rounded-3 h-100 p-4">
							<h3><i class="fa-solid fa-hand-holding-heart"></i></h3>
							<div class="ms-3">
								<h5>24x7 Help</h5>
								<p class="mb-0">If we fall short of your expectation in any way, let us know</p>
							</div>
						</div>
					</div>

					<!-- Trust -->
					<div class="col-md-6 col-xxl-4">
						<div class="bg-body d-flex rounded-3 h-100 p-4">
							<h3><i class="fa-solid fa-hand-holding-usd"></i></h3>
							<div class="ms-3">
								<h5>Payment Trust</h5>
								<p class="mb-0">All refunds come with no questions asked guarantee</p>
							</div>
						</div>
					</div>

					<!-- Download app -->


				</div>
			</div>
		</section>
		<!-- =======================
Download app END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->

	<?php include 'footer.php'; ?>


	<!-- =======================
Footer END -->


	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.js"></script>
	<script src="assets/vendor/flatpickr/js/flatpickr.min.js"></script>
	<script src="assets/vendor/choices/js/choices.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>


	<!-- Initialize Choices.js -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var locationSelect = new Choices('#locationSelect', {
				searchEnabled: true,
			});
		});
	</script>

</body>

<!-- Mirrored from booking.webestica.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:08:46 GMT -->

</html>