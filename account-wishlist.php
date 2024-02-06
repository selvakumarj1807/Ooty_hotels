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
$user_name = $_SESSION['user_name'];

/*$username = strstr($email, '@', true);

$_SESSION['user_name'] = $username;
$_COOKIE['user_names'] = $_SESSION['user_name'];*/
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from booking.webestica.com/account-wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2024 04:59:34 GMT -->

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
	<link rel="stylesheet" type="text/css" href="assets/vendor/aos/aos.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">

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
				<div class="row">

					<!-- Sidebar START -->
					<!-- Sidebar END -->

					<!-- Main content START -->
					<div class="col-lg-8 col-xl-9">

						<!-- Offcanvas menu button -->

						<!-- Wishlist START -->
						<div class="card border bg-transparent">
							<!-- Card header -->
							<div class="card-header bg-transparent border-bottom">
								<h4 class="card-header-title">My Wishlist</h4>
							</div>

							<!-- Card body START -->
							<div class="card-body vstack gap-4">
								<!-- Select and button -->
								<!--<form class="d-flex justify-content-between">
									<div class="col-6 col-xl-3">
										<select class="form-select form-select-sm js-choice border-0">
											<option value="">Sort by</option>
											<option>Recently search</option>
											<option>Most popular</option>
											<option>Top rated</option>
										</select>
									</div>-->
								<!-- Button -->
								<button class="btn btn-danger-soft mb-0"><i class="fas fa-trash me-2"></i>Remove all</button>
								</form>
								<?php
								require('db.php');
								$slno = 0;
								$result = mysqli_query($conn, "SELECT * FROM wishlist where email = '$email'");
								while ($row_result = mysqli_fetch_array($result)) {
									$slno++;
									$hotel_name = $row_result['hotel_name'];

									$hotel_img = $row_result['hotel_img'];

									$hotel_add = $row_result['hotel_add'];
									$orignal_cost = $row_result['orignal_cost'];
									$discount_Cost = $row_result['discount_Cost'];
								?>
									<!-- Wishlist item START -->
									<div class="card shadow p-2">
										<div class="row g-0">
											<!-- Card img -->
											<div class="col-md-3">
												<img src="admin/Upload/<?php echo $hotel_img; ?>" class="card-img rounded-2" alt="Card image">
											</div>

											<!-- Card body -->
											<div class="col-md-9">
												<div class="card-body py-md-2 d-flex flex-column h-100">

													<!-- Rating and buttons -->
													<div class="d-flex justify-content-between align-items-center">
														<ul class="list-inline small mb-0">
															<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
														</ul>

														<ul class="list-inline mb-0">
															<!-- Heart icon -->
															<li class="list-inline-item">
																<a href="#" class="btn btn-sm btn-round btn-danger mb-0"><i class="fa-solid fa-fw fa-heart"></i></a>
															</li>
															<!-- Share icon -->

														</ul>
													</div>

													<!-- Title -->
													<h5 class="card-title mb-1"><a href="hotel-detail.html"><?php echo $hotel_name; ?></a></h5>
													<small><i class="bi bi-geo-alt me-2"></i><?php echo $hotel_add; ?></small>

													<!-- Price and Button -->
													<div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
														<!-- Button -->
														<div class="d-flex align-items-center">
															<h5 class="fw-bold mb-0 me-1"><?php echo $discount_Cost; ?></h5>
															<span class="mb-0 me-2">/day</span>
														</div>
														<!-- Price -->
														<div class="mt-3 mt-sm-0">
															<a href="hotel-detail.html" class="btn btn-sm btn-primary w-100 mb-0">View hotel</a>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Wishlist item END -->
								<?php
								}
								?>
								<!-- Wishlist item START -->
								
								<!-- Wishlist item END -->

							</div>
							<!-- Card body END -->
						</div>
						<!-- Wishlist END -->

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
						<a href="index-2.html"> <img class="h-30px" src="assets/images/logo-light.svg" alt="logo"> </a>
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

	<!-- Vendors -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/flatpickr/js/flatpickr.min.js"></script>
	<script src="assets/vendor/choices/js/choices.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from booking.webestica.com/account-wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2024 04:59:34 GMT -->

</html>