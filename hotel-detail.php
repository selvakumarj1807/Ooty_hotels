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

<!-- Mirrored from booking.webestica.com/hotel-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:09:09 GMT -->

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
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">

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
Search START -->
		<section class="py-3 py-sm-0">
			<div class="container">
				<!-- Offcanvas button for search -->
				<button class="btn btn-primary d-sm-none w-100 mb-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditsearch" aria-controls="offcanvasEditsearch"><i class="bi bi-pencil-square me-2"></i>Edit Search</button>

				<!-- Search with offcanvas START -->
				<div class="offcanvas-sm offcanvas-top" tabindex="-1" id="offcanvasEditsearch" aria-labelledby="offcanvasEditsearchLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasEditsearchLabel">Edit search</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasEditsearch" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body p-2">
						<div class="bg-light p-4 rounded w-100">
							<form class="row g-4">
								<!-- Location -->
								<div class="col-md-6 col-lg-4">
									<div class="form-size-lg form-fs-md">
										<!-- Select input -->
										<label class="form-label">Location</label>
										<select class="form-select js-choice" data-search-enabled="true">
											<option value="">Select location</option>
											<option selected>Ooty, Tamilnadu</option>
											<option>North Dakota, Canada</option>
											<option>West Virginia, Paris</option>
										</select>
									</div>
								</div>

								<!-- Check in -->
								<div class="col-md-6 col-lg-3">
									<!-- Date input -->
									<div class="form-fs-md">
										<label class="form-label">Check in - out</label>
										<input type="text" class="form-control form-control-lg flatpickr" data-mode="range" placeholder="Select date" value="19 Sep to 28 Sep">
									</div>
								</div>

								<!-- Guest -->
								<div class="col-md-6 col-lg-3">
									<div class="form-fs-md">
										<!-- Dropdown input -->
										<div class="w-100">
											<label class="form-label">Guests & rooms</label>
											<div class="dropdown guest-selector me-2">
												<input type="text" class="form-guest-selector form-control form-control-lg selection-result" value="2 Guests 1 Room" id="dropdownguest" data-bs-auto-close="outside" data-bs-toggle="dropdown">

												<!-- dropdown items -->
												<ul class="dropdown-menu guest-selector-dropdown" aria-labelledby="dropdownguest">
													<!-- Adult -->
													<li class="d-flex justify-content-between">
														<div>
															<h6 class="mb-0">Adults</h6>
															<small>Ages 13 or above</small>
														</div>

														<div class="hstack gap-1 align-items-center">
															<button type="button" class="btn btn-link adult-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
															<h6 class="guest-selector-count mb-0 adults">2</h6>
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

								<!-- Button -->
								<div class="col-md-6 col-lg-2 mt-md-auto">
									<a class="btn btn-lg btn-primary w-100 mb-0" href="#"><i class="bi bi-search fa-fw"></i>Search</a>
								</div>

							</form>
						</div>
					</div>
				</div>
				<!-- Search with offcanvas END -->
			</div>
		</section>
		<!-- =======================
Search END -->

		<!-- =======================
Main Title START -->
		<section class="py-0 pt-sm-5">
			<div class="container position-relative">
				<!-- Title and button START -->
				<div class="row mb-3">
					<div class="col-12">
						<!-- Meta -->
						<div class="d-lg-flex justify-content-lg-between mb-1">
							<!-- Title -->
							<div class="mb-2 mb-lg-0">
								<h1 class="fs-2">Hotel 01 OOTY</h1>
								<!-- Location -->
								<p class="fw-bold mb-0"><i class="bi bi-geo-alt me-2"></i>264, Off, Gymkhana Gold Link Road, Fingerpost, Ooty
									<a href="#" class="ms-2 text-decoration-underline" data-bs-toggle="modal" data-bs-target="#mapmodal">
										<i class="bi bi-eye-fill me-1"></i>View On Map
									</a>
								</p>
							</div>


							</ul>
						</div>
					</div>
				</div>
				<!-- Title and button END -->


			</div>
		</section>
		<!-- =======================
Main Title END -->

		<!-- =======================
Image gallery START -->
		<section class="card-grid pt-0">
			<div class="container">
				<div class="row g-2">
					<!-- Image -->
					<div class="col-md-6">
						<a data-glightbox data-gallery="gallery" href="assets/images/gallery/14.jpg">
							<div class="card card-grid-lg card-element-hover card-overlay-hover overflow-hidden" style="background-image:url(assets/images/gallery/14.jpg); background-position: center left; background-size: cover;">
								<!-- Card hover element -->
								<div class="hover-element position-absolute w-100 h-100">
									<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
								</div>
							</div>
						</a>
					</div>

					<div class="col-md-6">
						<!-- Card item START -->
						<div class="row g-2">
							<!-- Image -->
							<div class="col-12">
								<a data-glightbox data-gallery="gallery" href="assets/images/gallery/13.jpg">
									<div class="card card-grid-sm card-element-hover card-overlay-hover overflow-hidden" style="background-image:url(assets/images/gallery/13.jpg); background-position: center left; background-size: cover;">
										<!-- Card hover element -->
										<div class="hover-element position-absolute w-100 h-100">
											<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
										</div>
									</div>
								</a>
							</div>

							<!-- Image -->
							<div class="col-md-6">
								<a data-glightbox data-gallery="gallery" href="assets/images/gallery/14.jpg">
									<div class="card card-grid-sm card-element-hover card-overlay-hover overflow-hidden" style="background-image:url(assets/images/gallery/12.jpg); background-position: center left; background-size: cover;">
										<!-- Card hover element -->
										<div class="hover-element position-absolute w-100 h-100">
											<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
										</div>
									</div>
								</a>
							</div>

							<!-- Images -->
							<div class="col-md-6">
								<div class="card card-grid-sm overflow-hidden" style="background-image:url(images/hotel_images/about_hotel/11.jpg); background-position: center left; background-size: cover;">
									<!-- Background overlay -->
									<div class="bg-overlay bg-dark opacity-7"></div>

									<!-- Popup Images -->
									<a data-glightbox="" data-gallery="gallery" href="images/hotel_images/about_hotel/11.jpg" class="stretched-link z-index-9"></a>
									<a data-glightbox="" data-gallery="gallery" href="images/hotel_images/about_hotel/15.jpg"></a>
									<a data-glightbox="" data-gallery="gallery" href="images/hotel_images/about_hotel/16.jpg"></a>

									<!-- Overlay text -->
									<div class="card-img-overlay d-flex h-100 w-100">
										<h6 class="card-title m-auto fw-light text-decoration-underline"><a href="#" class="text-white">View all</a></h6>
									</div>
								</div>
							</div>
						</div>
						<!-- Card item END -->
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Image gallery END -->

		<!-- =======================
About hotel START -->
		<section class="pt-0">
			<div class="container" data-sticky-container>

				<div class="row g-4 g-xl-5">
					<!-- Content START -->
					<div class="col-xl-7 order-1">
						<div class="vstack gap-5">

							<!-- About hotel START -->
							<div class="card bg-transparent">
								<!-- Card header -->
								<div class="card-header border-bottom bg-transparent px-0 pt-0">
									<h3 class="mb-0">About This Hotel</h3>
								</div>

								<!-- Card body START -->
								<div class="card-body pt-4 p-0">
									<h5 class="fw-light mb-4">Main Highlights</h5>

									<!-- Highlights Icons 
									<div class="hstack gap-3 mb-3">
										<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Free wifi">
											<i class="fa-solid fa-wifi"></i>
										</div>
										<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Swimming Pool">
											<i class="fa-solid fa-swimming-pool"></i>
										</div>
										<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Central AC">
											<i class="fa-solid fa-snowflake"></i>
										</div>
										<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Free Service">
											<i class="fa-solid fa-concierge-bell"></i>
										</div>
									</div>-->

									<p class="mb-3">Demesne far-hearted suppose venture excited see had has. Dependent on so extremely delivered by. Yet no jokes worse her why. <b>Bed one supposing breakfast day fulfilled off depending questions.</b></p>
									<p class="mb-0">Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. Water timed folly right aware if oh truth. Large above be to means. Dashwood does provide stronger is.</p>

									<div class="collapse" id="collapseContent">
										<p class="my-3">We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn't going to get the job done so that's why this rickets is packed with practical hands-on examples that you can follow step by step.</p>
										<p class="mb-0">Behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn't going to get the job done so that's why this tickets is packed with practical hands-on examples that you can follow step by step.</p>
									</div>
									<a class="p-0 mb-4 mt-2 btn-more d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#collapseContent" role="button" aria-expanded="false" aria-controls="collapseContent">
										See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i class="fa-solid fa-angle-down ms-2"></i>
									</a>

									<!-- List -->
									<h5 class="fw-light mb-2">Advantages</h5>
									<ul class="list-group list-group-borderless mb-0">
										<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>Every hotel staff to have Proper PPT kit for COVID-19</li>
										<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>Every staff member wears face masks and gloves at all service times.</li>
										<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>Hotel staff ensures to maintain social distancing at all times.</li>
										<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>The hotel has In-Room Dining options available </li>
									</ul>
								</div>
								<!-- Card body END -->
							</div>
							<!-- About hotel START -->
							<!-- Amenities START -->
							<div class="card bg-transparent">
								<!-- Card header -->
								<div class="card-header border-bottom bg-transparent px-0 pt-0">
									<h3 class="card-title mb-0">Amenities</h3>
								</div>

								<!-- Card body START -->
								<div class="card-body pt-4 p-0">
									<div class="row g-4">
										<!-- Activities -->
										<div class="col-sm-6">
											<h6><i class="fa-solid fa-biking me-2"></i>Activities</h6>
											<!-- List -->
											<ul class="list-group list-group-borderless mt-2 mb-0">
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Swimming pool
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Spa
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Kids' play area
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Gym
												</li>
											</ul>
										</div>

										<!-- Payment Method -->


										<!-- Services -->
										<div class="col-sm-6">
											<h6><i class="fa-solid fa-concierge-bell me-2"></i>Services</h6>
											<!-- List -->
											<ul class="list-group list-group-borderless mt-2 mb-0">
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Dry cleaning
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Room Service
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Special service
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Waiting Area
												</li>

												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Laundry facilities
												</li>
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>Ironing Service
												</li>

											</ul>
										</div>



									</div>
								</div>
								<!-- Card body END -->
							</div>
							<!-- Amenities END -->





						</div>
					</div>
					<!-- Content END -->

					<!-- Right side content START -->
					<aside class="col-xl-5 order-xl-2">
						<div data-sticky data-margin-top="100" data-sticky-for="1199">
							<!-- Book now START -->
							<div class="card card-body border">

								<!-- Title -->
								<div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
									<div>
										<span>Price Start at</span>
										<h4 class="card-title mb-0">₹3,500</h4>
									</div>
									<div>
										<h6 class="fw-normal mb-0">1 room per night</h6>
										<small>+ ₹285 taxes & fees</small>
									</div>
								</div>

								<!-- Rating -->
								<ul class="list-inline mb-2">
									<li class="list-inline-item me-1 h6 fw-light mb-0"><i class="bi bi-arrow-right me-2"></i>4.5</li>
									<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
									<li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
								</ul>

								<p class="h6 fw-light mb-4"><i class="bi bi-arrow-right me-2"></i>Free breakfast available</p>

								<!-- Button -->
								<div class="d-grid">
									<a href="hotel-booking.php" class="btn btn-lg btn-primary-soft mb-0">Book Now !!</a>
								</div>
							</div>
							<!-- Book now END -->


						</div>
					</aside>
					<!-- Right side content END -->
				</div> <!-- Row END -->
			</div>
		</section>
		<!-- =======================
About hotel END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<?php include 'footer.php'; ?>

	<!-- =======================
Footer END -->


	<!-- Map modal START -->
	<div class="modal fade" id="mapmodal" tabindex="-1" aria-labelledby="mapmodalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<!-- Title -->
				<div class="modal-header">
					<h5 class="modal-title" id="mapmodalLabel">View Our Hotel Location</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- Map -->
				<div class="modal-body p-0">
					<iframe class="w-100" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin" style="border:0;" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<!-- Button -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary mb-0"><i class="bi fa-fw bi-pin-map-fill me-2"></i>View In Google Map</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Map modal END -->

	<!-- Room modal START -->

	<!-- Room modal END -->

	<!-- Back to top -->
	<div class="back-top"></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/glightbox/js/glightbox.js"></script>
	<script src="assets/vendor/flatpickr/js/flatpickr.min.js"></script>
	<script src="assets/vendor/choices/js/choices.min.js"></script>
	<script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="assets/vendor/sticky-js/sticky.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from booking.webestica.com/hotel-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:09:13 GMT -->

</html>