<?php
session_start();
error_reporting(0);
require('db.php');

$hotel_address = $_GET['hotel_address'];

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

$hotel_address = $_GET['hotel_address'];
$hotel_addr = $_GET['hotel_addr'];
//echo "$hotel_address";
//echo "jkh";

/*
echo "$check_in_out";
echo "<br>";
echo "$hotel_name";
echo "<br>";
echo "$guests_rooms";

*/

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
                    <form role="form" action="about_hotel.php" class="card shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4" enctype="multipart/form-data">
                        <div class="row g-4 align-items-center">
                            <!-- Location -->
                            <div class="col-lg-4">
                                <div class="form-control-border form-control-transparent form-fs-md d-flex">
                                    <!-- Icon -->
                                    <i class="bi bi-geo-alt fs-3 me-2 mt-2"></i>
                                    <!-- Select input -->
                                    <div class="flex-grow-1">

                                        <label class="form-label">Location</label>
                                        <input type="hidden" name="hotel_name" value="<?php echo $hotel_address; ?>" />
                                        <input type="hidden" name="hotel_address" value="<?php echo $hotel_addr; ?>" />

                                        <select class="form-select js-choice" data-search-enabled="true" name="hotel_addr" disabled>
                                            <option value="<?php echo $hotel_addr; ?>"><?php echo $hotel_addr; ?></option>

                                            <option value="">Select location</option>


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
                        </div>
                        <!-- Button -->
                        <div class="btn-position-md-middle">
                            <button type="submit" class="icon-lg btn btn-round btn-primary mb-0"><i class="bi bi-search fa-fw"></i></button>
                        </div>
                    </form>

                    <!-- Booking from END -->
                </div>

                <!-- Search END -->
            </div>
        </section>
        <!-- =======================
Main Banner END -->
        <!-- =======================
Main Banner END -->








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