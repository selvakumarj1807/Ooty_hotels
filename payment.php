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

    <div class="card shadow">
        <!-- Card header -->
        <div class="card-header border-bottom p-4">
            <!-- Title -->
            <h4 class="card-title mb-0"><i class="bi bi-wallet-fill me-2"></i>Payment Options</h4>
        </div>

        <!-- Card body START -->
        <div class="card-body p-4 pb-0">
            <!-- Action box START -->

            <!-- Action box END -->

            <!-- Accordion START -->
            <div class="accordion accordion-icon accordion-bg-light" id="accordioncircle">
                <!-- Credit or debit card START -->
                <div class="accordion-item mb-3">
                    <h6 class="accordion-header" id="heading-1">
                        <button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                            <i class="bi bi-credit-card text-primary me-2"></i> <span class="me-5">Credit or Debit Card</span>
                        </button>
                    </h6>
                    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordioncircle">
                        <!-- Accordion body -->
                        <div class="accordion-body">

                            <!-- Card list -->
                            <div class="d-sm-flex justify-content-sm-between my-3">
                                <h6 class="mb-2 mb-sm-0">We Accept:</h6>
                                <ul class="list-inline my-0">
                                    <li class="list-inline-item"> <a href="#"><img src="assets/images/element/visa.svg" class="h-30px" alt=""></a></li>
                                    <li class="list-inline-item"> <a href="#"><img src="assets/images/element/mastercard.svg" class="h-30px" alt=""></a></li>
                                    <li class="list-inline-item"> <a href="#"><img src="assets/images/element/expresscard.svg" class="h-30px" alt=""></a></li>
                                </ul>
                            </div>

                            <!-- Form START -->
                            <form class="row g-3">
                                <!-- Card number -->
                                <div class="col-12">
                                    <label class="form-label"><span class="h6 fw-normal">Card Number *</span></label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" maxlength="14" placeholder="XXXX XXXX XXXX XXXX">
                                        <img src="assets/images/element/visa.svg" class="w-30px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
                                    </div>
                                </div>
                                <!-- Expiration Date -->
                                <div class="col-md-6">
                                    <label class="form-label"><span class="h6 fw-normal">Expiration date *</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" maxlength="2" placeholder="Month">
                                        <input type="text" class="form-control" maxlength="4" placeholder="Year">
                                    </div>
                                </div>
                                <!--Cvv code  -->
                                <div class="col-md-6">
                                    <label class="form-label"><span class="h6 fw-normal">CVV / CVC *</span></label>
                                    <input type="text" class="form-control" maxlength="3" placeholder="xxx">
                                </div>
                                <!-- Card name -->
                                <div class="col-12">
                                    <label class="form-label"><span class="h6 fw-normal">Name on Card *</span></label>
                                    <input type="text" class="form-control" aria-label="name of card holder" placeholder="Enter card holder name">
                                </div>

                                <!-- Alert box START -->

                                <!-- Alert box END -->

                                <!-- Buttons -->
                                <div class="col-12">
                                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                                        <h4>$1800 <span class="small fs-6">Due now</span></h4>
                                        <button class="btn btn-primary mb-0">Pay Now</button>
                                    </div>
                                </div>

                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                </div>
                <!-- Credit or debit card END -->

                <!-- Net banking START -->
                <div class="accordion-item mb-3">
                    <h6 class="accordion-header" id="heading-2">
                        <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                            <i class="bi bi-globe2 text-primary me-2"></i> <span class="me-5">Pay with Net Banking</span>
                        </button>
                    </h6>
                    <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordioncircle">
                        <!-- Accordion body -->
                        <div class="accordion-body">

                            <!-- Form START -->
                            <form class="row g-3 mt-1">

                                <!-- Popular bank -->
                                <ul class="list-inline mb-0">

                                    <li class="list-inline-item">
                                        <h6 class="mb-0">Popular Bank:</h6>
                                    </li>
                                    <!-- Rent -->
                                    <li class="list-inline-item">
                                        <input type="radio" class="btn-check" name="options" id="option1">
                                        <label class="btn btn-light btn-primary-soft-check" for="option1">
                                            <img src="assets/images/element/13.svg" class="h-20px me-2" alt="">Bank of America
                                        </label>
                                    </li>
                                    <!-- Sale -->
                                    <li class="list-inline-item">
                                        <input type="radio" class="btn-check" name="options" id="option2">
                                        <label class="btn btn-light btn-primary-soft-check" for="option2">
                                            <img src="assets/images/element/15.svg" class="h-20px me-2" alt="">Bank of Japan
                                        </label>
                                    </li>
                                    <!-- Buy -->
                                    <li class="list-inline-item">
                                        <input type="radio" class="btn-check" name="options" id="option3">
                                        <label class="btn btn-light btn-primary-soft-check" for="option3">
                                            <img src="assets/images/element/14.svg" class="h-20px me-2" alt="">VIVIV Bank
                                        </label>
                                    </li>
                                </ul>

                                <p class="mb-1">In order to complete your transaction, we will transfer you over to Booking secure servers.</p>
                                <p class="my-0">Select your bank from the drop-down list and click proceed to continue with your payment.</p>
                                <!-- Select bank -->
                                <div class="col-md-6">
                                    <select class="form-select form-select-sm js-choice border-0">
                                        <option value="">Please choose one</option>
                                        <option>Bank of America</option>
                                        <option>Bank of India</option>
                                        <option>Bank of London</option>
                                    </select>
                                </div>

                                <!-- Button -->
                                <div class="d-grid">
                                    <button class="btn btn-success mb-0">Pay $1800</button>
                                </div>

                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                </div>
                <!-- Net banking END -->

                <!-- Paypal START -->
                <div class="accordion-item mb-3">
                    <h6 class="accordion-header" id="heading-3">
                        <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                            <i class="bi bi-paypal text-primary me-2"></i><span class="me-5">Pay with Paypal</span>
                        </button>
                    </h6>
                    <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordioncircle">
                        <!-- Accordion body -->
                        <div class="accordion-body">
                            <div class="card card-body border align-items-center text-center mt-4">
                                <!-- Image -->
                                <img src="assets/images/element/paypal.svg" class="h-70px mb-3" alt="">
                                <p class="mb-3"><strong>Tips:</strong> Simply click on the payment button below to proceed to the PayPal payment page.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary mb-0">Pay with paypal</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Paypal END -->
            </div>
            <!-- Accordion END -->
        </div>
        <!-- Card body END -->

        <div class="card-footer p-4 pt-0">
            <!-- Condition link -->
            <p class="mb-0">By processing, You accept Booking <a href="#">Terms of Services</a> and <a href="#">Policy</a></p>
        </div>
    </div>


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

</body>

<!-- Mirrored from booking.webestica.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 05:08:46 GMT -->

</html>