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
<?php
//session_start();
//require 'db.php';

$check_in_out = $_GET['check_in_out'];
$hotel_name = $_GET['hotel_name'];
$guests_rooms = $_GET['guests_rooms'];
/*
echo "$check_in_out";
echo "<br>";
echo "$hotel_name";


echo "$guests_rooms";
echo "<br>";*/
list($guest, $room, $child) = sscanf($guests_rooms, "%d Adult %d Room %d Child");
/*
echo "$guest";
echo "<br>";
echo "$room";
echo "<br>";
echo "$child";
*/
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

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from booking.webestica.com/hotel-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:09:13 GMT -->

<head>
	<title>Booking - Multipurpose Online Booking Theme</title>

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
	<script>
		// JavaScript code to add new guest input fields dynamically
		document.addEventListener('DOMContentLoaded', function() {
			// Counter to keep track of the number of guests
			let guestCount = 0;

			// Function to add new guest input fields
			function addNewGuest() {
				guestCount++;

				// Create elements for first name input
				const firstNameInput = document.createElement('input');
				firstNameInput.setAttribute('type', 'text');
				firstNameInput.setAttribute('class', 'form-control form-control-lg');
				firstNameInput.setAttribute('placeholder', 'Enter your first name');
				firstNameInput.setAttribute('name', 'guestFirstName' + guestCount);

				// Create elements for last name input
				const lastNameInput = document.createElement('input');
				lastNameInput.setAttribute('type', 'text');
				lastNameInput.setAttribute('class', 'form-control form-control-lg');
				lastNameInput.setAttribute('placeholder', 'Enter your last name');
				lastNameInput.setAttribute('name', 'guestLastName' + guestCount);

				// Create elements for remove button
				const removeButton = document.createElement('button');
				removeButton.setAttribute('type', 'button');
				removeButton.setAttribute('class', 'btn btn-danger btn-sm');
				removeButton.textContent = 'Remove';
				removeButton.addEventListener('click', function() {
					guestDiv.remove(); // Remove the entire guest div
					guestCount--; // Decrease guest count
				});

				// Create a new div to hold the input fields and remove button
				const guestDiv = document.createElement('div');
				guestDiv.setAttribute('class', 'row g-4');
				guestDiv.appendChild(firstNameInput);
				guestDiv.appendChild(lastNameInput);
				guestDiv.appendChild(removeButton);

				// Append the new guest div to the guest container
				document.getElementById('guestContainer').appendChild(guestDiv);
			}

			// Event listener for the "Add New Guest" button
			document.getElementById('addGuestBtn').addEventListener('click', function() {
				addNewGuest();
			});
		});
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
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">

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
Page banner START -->
		<section class="py-0">
			<div class="container">
				<!-- Card START -->
				<div class="card bg-light overflow-hidden px-sm-5">
					<div class="row align-items-center g-4">

						<!-- Content -->
						<div class="col-sm-9">
							<div class="card-body">
								<!-- Breadcrumb -->
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb breadcrumb-dots mb-0">
										<li class="breadcrumb-item"><a href="index.php"><i class="bi bi-house me-1"></i> Home</a></li>
										<li class="breadcrumb-item">Hotel detail</li>
										<li class="breadcrumb-item active">Booking</li>
									</ol>
								</nav>
								<!-- Title -->
								<h1 class="m-0 h2 card-title">Review your Booking</h1>
							</div>
						</div>

						<!-- Image -->
						<div class="col-sm-3 text-end d-none d-sm-block">
							<img src="images/17.svg" class="mb-n4" alt="">
						</div>
					</div>
				</div>
				<!-- Card END -->
			</div>
		</section>
		<!-- =======================
Page banner END -->

		<!-- =======================
Page content START -->
		<section>
			<div class="container">
				<div class="row g-4 g-lg-5">

					<!-- Left side content START -->
					<div class="col-xl-8">
						<div class="vstack gap-5">
							<!-- Hotel information START -->
							<div class="card shadow">
								<!-- Card header -->
								<div class="card-header p-4 border-bottom">
									<!-- Title -->
									<h3 class="mb-0"><i class="fa-solid fa-hotel me-2"></i>Hotel Information</h3>
								</div>

								<!-- Card body START -->
								<div class="card-body p-4">
									<!-- Card list START -->
									<?php
									require('db.php');
									$slno = 0;
									$result = mysqli_query($conn, "SELECT * FROM hotels where hotel_name = '$hotel_name'");
									while ($row_result = mysqli_fetch_array($result)) {
										$slno++;
										$item_id = $row_result['id'];

										$address = $row_result['hotel_address'];

										$hotel_names = $row_result['hotel_name'];
										$image = $row_result['image_path'];
										$district = $row_result['district'];
										$state = $row_result['hotel_state'];
										$pincode = $row_result['pincode'];
										$phone = $row_result['phone'];
										//$original_cost = $row_result['original_cost'];
										//$discount_cost = $row_result['discount_cost'];

									?>
										<div class="card mb-4">
											<div class="row align-items-center">
												<!-- Image -->
												<div class="col-sm-6 col-md-3">
													<img src="admin/Upload/<?php echo $image; ?>" class="card-img" alt="">
												</div>

												<!-- Card Body -->
												<div class="col-sm-6 col-md-9">
													<div class="card-body pt-3 pt-sm-0 p-0">
														<!-- Title -->
														<h5 class="card-title"><a href="#"><?php echo $hotel_names; ?></a></h5>
														<p class="small mb-2"><i class="bi bi-geo-alt me-2"></i><?php echo $address; ?>,<?php echo $district; ?> - <?php echo $pincode; ?></p>
														<p><i style="font-size:20px" class="fa">&#xf095;</i><?php echo $phone; ?></p>
														<!-- Rating star -->
														<ul class="list-inline mb-0">
															<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
															<li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
															<li class="list-inline-item ms-2 h6 small fw-bold mb-0">4.5/5.0</li>
														</ul>
													</div>
												</div>

											</div>
										</div>

										<!-- Card list END -->

										<!-- Information START -->
										<div class="row g-4">
											<!-- Item -->
											<div class="col-lg-4">
												<div class="bg-light py-3 px-4 rounded-3">
													<h6 class="fw-light small mb-1">Check-in</h6>
													<h5 class="mb-1"><?php echo $check_in; ?></h5>
													<!--<small><i class="bi bi-alarm me-1"></i>12:30 pm</small>-->
												</div>
											</div>

											<!-- Item -->
											<div class="col-lg-4">
												<div class="bg-light py-3 px-4 rounded-3">
													<h6 class="fw-light small mb-1">Check out</h6>
													<h5 class="mb-1"><?php echo $check_out; ?></h5>
													<!--<small><i class="bi bi-alarm me-1"></i>4:30 pm</small>-->
												</div>
											</div>

											<!-- Item -->
											<div class="col-lg-4">
												<div class="bg-light py-3 px-4 rounded-3">
													<h6 class="fw-light small mb-1">Rooms & Guests</h6>
													<h5 class="mb-1"><?php echo $guests_rooms; ?></h5>
													<!--<small><i class="bi bi-brightness-high me-1"></i>3 Nights - 4 Days</small>-->
												</div>
											</div>
										</div>
										<!-- Information END -->

										<!-- Card START -->

										<!-- Card END -->
								</div>
								<!-- Card body END -->
							</div>
							<!-- Hotel information END -->

							<!-- Guest detail START -->
							<div class="card shadow">
								<!-- Card header -->
								<div class="card-header border-bottom p-4">
									<h4 class="card-title mb-0"><i class="bi bi-people-fill me-2"></i>Guest Details</h4>
								</div>

								<!-- Card body START -->
								<div class="card-body p-4">
									<!-- Form START -->
									<form action="payment.php" class="row g-4" role="form" method="POST" enctype="multipart/form-data">
										<!-- Title -->
										<div class="col-12">
											<div class="bg-light rounded-2 px-4 py-3">
												<h6 class="mb-0">Main Guest</h6>
											</div>
										</div>

										<!-- Select -->
										<input type="hidden" placeholder="Choose your values" name="hotel_names" value="<?php echo $hotel_names; ?>">
										<input type="hidden" placeholder="Choose your values" name="address" value="<?php echo $address; ?>">
										<input type="hidden" placeholder="Choose your values" name="district" value="<?php echo $district; ?>">
										<input type="hidden" placeholder="Choose your values" name="state" value="<?php echo $state; ?>">
										<input type="hidden" placeholder="Choose your values" name="pincode" value="<?php echo $pincode; ?>">
										<input type="hidden" placeholder="Choose your values" name="phone" value="<?php echo $phone; ?>">
										<input type="hidden" placeholder="Choose your values" name="check_in_out" value="<?php echo $check_in_out; ?>">
										<input type="hidden" placeholder="Choose your values" name="guests_rooms" value="<?php echo $guests_rooms; ?>">
										<input type="hidden" placeholder="Choose your values" name="image" value="<?php echo $image; ?>">


										<!-- Input -->
										<div class="col-md-5">
											<label class="form-label">First Name</label>
											<input type="text" class="form-control form-control-lg" name="first_name" placeholder="Enter your name" value="<?php echo $_COOKIE['user_name']; ?>">
										</div>

										<!-- Input -->
										<div class="col-md-5">
											<label class="form-label">Last Name</label>
											<input type="text" class="form-control form-control-lg" name="last_name" placeholder="Enter your name">
										</div>

										<!-- Button -->
										<div class="col-12">
											<!--<a href="#" class="btn btn-link mb-0 p-0"><i class="fa-solid fa-plus me-2"></i>Add New Guest</a>-->
											<a id="addGuestBtn" class="btn btn-link mb-0 p-0"><i class="fa-solid fa-plus me-2"></i>Add New Guest</a>

										</div>
										<div id="guestContainer">
											<!-- Guest input fields will be added here dynamically -->
										</div>

										<!-- Input -->
										<div class="col-md-6">
											<label class="form-label">Email id</label>
											<input type="email" class="form-control form-control-lg" name="guest_email" placeholder="Enter your email" value="<?php echo $_COOKIE['email']; ?>">
											<div id="emailHelp" class="form-text">(Booking voucher will be sent to this email ID)</div>
										</div>

										<!-- Input -->
										<div class="col-md-6">
											<label class="form-label">Mobile number</label>
											<input type="text" class="form-control form-control-lg" name="gust_phone" placeholder="Enter your mobile number">
										</div>

										<button class="btn btn-primary mb-0">Pay now</button>
									</form>
									<!-- Form END -->

									<!-- Alert START 
									<div class="alert alert-info my-4" role="alert">
										<a href="sign-up.html" class="alert-heading h6">Login</a> to prefill all details and get access to secret deals
									</div>-->
									<!-- Alert END -->

									<!-- Special request START -->

									<!-- Special request END -->
								</div>
								<!-- Card body END -->
							</div>
							<!-- Guest detail END -->

							<!-- Payment Options START -->

							<!-- Payment Options END -->
						</div>
					</div>
					<!-- Left side content END -->

					<?php
										$tax_amount = $row_result['tax_amount'];
										$discountCost = $row_result['discount_cost'];
										$adult_cost = $row_result['adult'];
										$child_cost = $row_result['child'];
										/*
										echo "$guest";
										echo "<br>";
										echo "$room";
										echo "<br>";
										echo "$child";
 
*/

										$amount = ($discountCost * $room) + ($adult_cost * $guest) + ($child_cost * $child);

										$totalCost = $tax_amount + $amount;

					?>
					<!-- Right side content START -->
					<aside class="col-xl-4">
						<div class="row g-4">

							<!-- Price summary START -->
							<div class="col-md-6 col-xl-12">
								<div class="card shadow rounded-2">
									<!-- card header -->
									<div class="card-header border-bottom">
										<h5 class="card-title mb-0">Price Summary</h5>
									</div>

									<!-- Card body -->
									<div class="card-body">
										<ul class="list-group list-group-borderless">
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="h6 fw-light mb-0">Room Charges</span>
												<span class="fs-5">₹<?php echo $amount; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="h6 fw-light mb-0">Total Discount<span class="badge text-bg-danger smaller mb-0 ms-2">10% off</span></span>
												<span class="fs-5 text-success">-₹0</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="h6 fw-light mb-0">Price after discount</span>
												<span class="fs-5">₹<?php echo $amount; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												<span class="h6 fw-light mb-0">Taxes % Fees</span>
												<span class="fs-5">+ ₹<?php echo $tax_amount; ?></span>
											</li>
										</ul>
									</div>

									<!-- Card footer -->
									<div class="card-footer border-top">
										<div class="d-flex justify-content-between align-items-center">
											<span class="h5 mb-0">Total amount</span>
											<span class="h5 mb-0">₹<?php echo $totalCost; ?></span>
										</div>
									</div>
								</div>
							</div>
							<!-- Price summary END -->
						<?php
									}
						?>
						<!-- Offer and discount START -->
						<div class="col-md-6 col-xl-12">
							<div class="card shadow">
								<!-- Card header -->
								<div class="card-header border-bottom">
									<div class="cardt-title">
										<h5 class="mb-0">Offer &amp; Discount</h5>
									</div>
								</div>
								<!-- Card body -->
								<div class="card-body">

									<!-- Radio -->

									<!-- Input group -->
									<div class="input-group mt-3">
										<input class="form-control form-control" placeholder="Coupon code">
										<button type="button" class="btn btn-primary">Apply</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Offer and discount END -->

						<!-- Information START -->
						<div class="col-md-6 col-xl-12">
							<div class="card shadow">
								<!-- Card header -->
								<div class="card-header border-bottom">
									<h5 class="card-title mb-0">Why Sign up or Log in</h5>
								</div>

								<!-- Card body -->
								<div class="card-body">
									<!-- List -->
									<ul class="list-group list-group-borderless">
										<li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
											<span class="h6 fw-normal">Get Access to Secret Deal</span>
										</li>

										<li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
											<span class="h6 fw-normal">Book Faster</span>
										</li>

										<li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
											<span class="h6 fw-normal">Manage Your Booking</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Information END -->

						</div>
					</aside>
					<!-- Right side content END -->
				</div> <!-- Row END -->
			</div>
		</section>
		<!-- =======================
Page content START -->

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
	<script src="assets/vendor/choices/js/choices.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from booking.webestica.com/hotel-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:09:15 GMT -->

</html>