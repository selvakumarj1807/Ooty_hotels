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
$email_pass = $_COOKIE['email'];
/*$username = strstr($email, '@', true);

$_SESSION['user_name'] = $username;
$_COOKIE['user_names'] = $_SESSION['user_name'];*/
?>
<?php

if (isset($_COOKIE['email'])) {
    $email_address = $_COOKIE['email'];
    $user_name = $_COOKIE['user_name'];
} else {
    $email_address = "sample@gmail.com";
    $user_name = "Guest";
}
//echo $email_address;
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from booking.webestica.com/account-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:10:09 GMT -->

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
<?php
// Debugging statements
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if login was successful
// Initialize variables before the conditional block
$userFullName = '';
$userEmail = '';

if (isset($_GET['login_success']) && $_GET['login_success'] === 'true') {
    // Your authentication logic here...
    if (isset($userProfile) && method_exists($userProfile, 'getEmail')) {
        // Assuming $userProfile->getEmail() contains the user's email address
        $userEmail = $userProfile->getEmail();

        // Extract name from email (example assumes email is in the format "john.doe@example.com")
        $emailParts = explode('@', $userEmail);
        $nameParts = explode('.', $emailParts[0]);

        // Combine name parts
        $fullName = implode(' ', array_map('ucfirst', $nameParts));

        // Set the user's name in the session
        $_SESSION['user_name'] = $fullName;

        // Display the welcome pop-up
        echo '<script>alert("Welcome, ' . $_SESSION['user_name'] . '!");</script>';

        $userFullName = $userProfile->getFullName() ?? ''; // Use null coalescing operator
        $userEmail = $userProfile->getEmail() ?? '';
    }
}

?>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->

<?php

// Check if user data is stored in the session
if (isset($_SESSION['userProfile'])) {
    $userProfile = $_SESSION['userProfile'];

    // Use the $userProfile object to populate form fields
    $fullName = $userProfile->getName();
    $emailAddress = $userProfile->getEmail();
    // ... (other fields)

    // Optionally, you can echo JavaScript code to trigger autofill
    echo '<script>
            document.getElementById("full_name").value = "' . $fullName . '";
            document.getElementById("email_address").value = "' . $emailAddress . '";
            // ... (other fields)
          </script>';
}

?>
<?php
include('header.php'); ?>

<body class="dashboard">

    <!-- Header START -->


    <main>
        <!-- =======================
Content START -->
        <section class="pt-3">
            <div class="container">
                <div class="row">

                    <!-- Sidebar END -->

                    <!-- Main content START -->

                    <!-- Offcanvas menu button 
				<div class="d-grid mb-0 d-lg-none w-100">
					<button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
						<i class="fas fa-sliders-h"></i> Menu
					</button>
				</div>-->

                    <div class="vstack gap-4">
                        <!-- Verified message -->
                        <div class="bg-light rounded p-3">
                            <!-- Progress bar -->
                            <div class="overflow-hidden">
                                <h6>Complete Your Profile</h6>
                                <div class="progress progress-sm bg-success bg-opacity-10">
                                    <div class="progress-bar bg-success aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                        <span class="progress-percent-simple h6 fw-light ms-auto">85%</span>
                                    </div>
                                </div>
                                <p class="mb-0">Get the best out of booking by adding the remaining details!</p>
                            </div>
                            <!-- Content
						<div class="bg-body rounded p-3 mt-3">
							<ul class="list-inline hstack flex-wrap gap-2 justify-content-between mb-0">
								<li class="list-inline-item h6 fw-normal mb-0"><a href="#"><i class="bi bi-check-circle-fill text-success me-2"></i>Verified Email</a></li>
								<li class="list-inline-item h6 fw-normal mb-0"><a href="#"><i class="bi bi-check-circle-fill text-success me-2"></i>Verified Mobile Number</a></li>
								<li class="list-inline-item h6 fw-normal mb-0"><a href="#" class="text-primary"><i class="bi bi-plus-circle-fill me-2"></i>Complete Basic Info</a></li>
							</ul>
						</div> -->
                        </div>

                        <!-- Personal info START -->
                        <div class="card border">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Personal Information</h4>
                            </div>
                            <?php
                            require('db.php');
                            $slno = 0;
                            $result = mysqli_query($conn, "SELECT * FROM user where email ='$email_address'");
                            while ($row_result = mysqli_fetch_array($result)) {
                                $slno++;
                                $full_name = $row_result['full_name'];

                                $email = $row_result['email'];

                                $profile_photo_path = $row_result['profile_photo_path'];
                                $mobile_number = $row_result['mobile_number'];
                                $nationality = $row_result['nationality'];
                                $date_of_birth = $row_result['date_of_birth'];
                                $gender = $row_result['gender'];
                                $address = $row_result['address'];
                                $password = $row_result['password'];
                                $cpass = $row_result['cpass'];

                            ?>
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Form START -->
                                    <form role="form" class="row g-3" method="post" action="save_details.php" enctype="multipart/form-data">

                                        <input type="hidden" name="password" value="<?php echo $password; ?>">
                                        <input type="hidden" name="cpass" value="<?php echo $cpass; ?>">
                                        <input type="hidden" name="email_pass" value="<?php echo $_COOKIE['email']; ?>">
                                        <input type="hidden" name="image_default" value="<?php echo $profile_photo_path; ?>">

                                        <!-- Profile photo -->
                                        <div class="col-12">
                                            <label class="form-label">Upload your profile photo<span class="text-danger">*</span></label>
                                            <div class="d-flex align-items-center">
                                                <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                                    <!-- Avatar place holder -->
                                                    <span class="avatar avatar-xl">
                                                        <img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="Upload/<?php echo $profile_photo_path; ?>" alt="user_profile">
                                                    </span>
                                                </label>
                                                <!-- Upload button -->
                                                <label class="btn btn-sm btn-primary-soft mb-0" for="uploadfile-1">Change</label>
                                                <input id="uploadfile-1" class="form-control d-none" type="file" name="image" accept="image/jpeg">
                                                <input class="file-path validate" type="hidden" placeholder="Choose your profile image">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="full_name">Full Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="<?php echo $full_name; ?>" id="full_name" name="full_name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email_address">Email Address<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" value="<?php echo $email; ?>" id="email_address" name="email_address" required>
                                        </div>


                                        <!-- Mobile -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="<?php echo $mobile_number; ?>" placeholder="Enter your mobile number" name="mobile_number" id="mobile_number">
                                        </div>

                                        <!-- Nationality -->
                                        <div class="col-md-6">
                                            <label class="form-label">Nationality<span class="text-danger">*</span></label>
                                            <select class="form-select js-choice" name="nationality" id="nationality">
                                                <option value="<?php echo $nationality; ?>"><?php echo $nationality; ?></option>
                                                <option value="USA">USA</option>
                                                <option value="Paris">Paris</option>
                                                <option value="India">India</option>
                                                <option value="UK">UK</option>
                                            </select>
                                        </div>

                                        <!-- Date of birth -->
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control flatpickr" value="<?php echo $date_of_birth; ?>" placeholder="Enter date of birth" data-date-format="d M Y" name="date_of_birth" id="date_of_birth">
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-md-6">
                                            <label class="form-label">Select Gender<span class="text-danger">*</span></label>
                                            <div class="d-flex gap-4">
                                                <div class="form-check radio-bg-light">
                                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" checked="">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check radio-bg-light">
                                                    <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check radio-bg-light">
                                                    <input class="form-check-input" type="radio" name="gender" value="others" id="flexRadioDefault3">
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Others
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" rows="3" spellcheck="false" name="address" id="address"><?php echo $address; ?></textarea>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary mb-0" id="savePersonalInfo" name="savePersonalInfo">Save Changes</button>
                                        </div>
                                    </form>
                                    <?php
                                    /* echo '<script>
        function autofillForm() {
            document.getElementById("full_name").value = "' . $full_name . '";
            document.getElementById("email_address").value = "' . $email . '";
            // ... (other fields)
        }

        window.addEventListener("load", function() {
            autofillForm();
        });
      </script>';*/
                                    ?>

                                    <!-- Form END -->
                                </div>
                                <!-- Card body END -->
                        </div>
                        <!-- Personal info END -->

                        <!-- Update email START -->

                        <!-- Update email END -->

                        <!-- Update Password START -->
                        <div class="card border">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Update Password</h4>
                                <p class="mb-0">Your current email address is <span class="text-primary"><?php echo $email_address; ?></span></p>
                            </div>

                            <!-- Card body START -->
                            <form class="card-body" role="form" method="post" action="update_password.php" enctype="multipart/form-data">
                                <input type="hidden" name="password" value="<?php echo $password; ?>">
                                <input type="hidden" name="email" value="<?php echo $email_address; ?>">

                                <!-- Current password -->
                                <div class="mb-3">
                                    <label class="form-label">Current password</label>
                                    <input class="form-control" type="current_password" placeholder="Enter current password" name="current_pass">
                                </div>
                                <!-- New password -->
                                <div class="mb-3">
                                    <label class="form-label"> Enter new password</label>
                                    <div class="input-group">
                                        <input class="form-control fakepassword" placeholder="Enter new password" type="password" name="new_pass" id="psw-input">
                                        <span class="input-group-text p-0 bg-transparent">
                                            <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- Confirm -->
                                <div class="mb-3">
                                    <label class="form-label">Confirm new password</label>
                                    <input class="form-control" type="password" placeholder="Confirm new password" name="confirm_pass">
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary mb-0">Change Password</button>
                                </div>
                            </form>
                            <!-- Card body END -->
                        </div>
                        <!-- Update Password END -->
                    </div>
                </div>
                <!-- Main content END -->
            <?php
                            }
            ?>
            </div>
            </div>
        </section>
        <!-- =======================
Content END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- =======================
Footer START -->
    <?php include('footer.php'); ?>
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

<!-- Mirrored from booking.webestica.com/account-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:10:10 GMT -->

</html>