<?php

include_once "lib/Session.php";

// require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
use lib\Session;

// Session::checkLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TransitWise</title>
    <!-- add bootstrap css file -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>
    <!-- navbar -->
    <?php include_once('inc/navbar.php'); ?>

    <!-- header -->
    <header class="header ">
        <div class="overlay"></div>
        <div class="container">
            <div class="description ">
                <h1>
                    TransitWise
                    <br>
                    <p>A ride sharing and booking service. We offer convenient, affordable and safe commute.</p>

                    <!-- <a class="btn btn-outline-secondary btn-lg" href="signUp.php">Register Now!</a> -->

                    <a href="signUp.php" class="btn  btn-secondary btn-lg" style="border: 1px solid rgb(7, 43, 88);
    background: rgb(7, 43, 88);">Register Now!</a>
                </h1>
            </div>
        </div>

    </header>

    <!-- about section -->
    <div class="about" id="about">
        <div class="container">
            <h1 class="text-center">About Us</h1>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="images/background.jpeg" class="img-fluid">
                    <span class="text-justify">TransitWise</span>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 desc">

                    <p>
                        TransitWise, a ride-booking and ride-sharing website, it can revolutionize transportation,
                        offering convenience, affordability, and safety. It is suitable for daily commute to the office
                        and university. It is more comfortable than public transport and cheaper than other rides in
                        the market. Moreover, it can reduce traffic congestion and create income opportunities for
                        drivers. Overall, it can improve mobility, encourage shared rides, and drive technological
                        innovation in the transportation industry.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- portfolio -->
    <div class="review" id="review">
        <div class="container">
            <div class="row">

                <div class="container">
                    <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
                        <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" contenteditable="false">Read Customer Reviews</h1>
                    </div>

                    <ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm">
                        <li>
                            <img src="images/w2.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                            <p class="fs-110 font-cond-l" contenteditable="false">" Fast and reliable service! I've used this ride-sharing service multiple times, and they never disappoint. The drivers are professional and always arrive promptly. Highly recommend for hassle-free commuting. "</p>
                            <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Smita Anwar</h5>
                            <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Business Woman</small>
                        </li>

                        <li>
                            <img src="images/rsz_1download.jpg" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                            <p class="fs-110 font-cond-l" contenteditable="false">" Affordable and convenient option for city travel! This ride-sharing service offers competitive prices and easy booking through their user-friendly app. It's my go-to choice for short trips around town. "</p>
                            <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Arian Chowdhuty</h5>
                            <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Manager</small>
                        </li>

                        <li>
                            <img src="images/w1.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                            <p class="fs-110 font-cond-l" contenteditable="false">" Great safety measures in place! As a frequent traveler, safety is paramount to me. This ride-sharing service ensures that all drivers undergo background checks, and their vehicles are well-maintained. I feel secure using their service."</p>
                            <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Mayehsa Ahmed</h5>
                            <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">AIUB student</small>
                        </li>

                    </ul>

                </div>

            </div>
        </div>
    </div>

    <!-- Team section -->
    <div class="team" id="team">
        <div class="container">
            <h1 class="text-center">Our Team</h1>
            <div class="row">


                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/T1.1.png" class="img-fluid" alt="team">
                    <div class="des">
                        Jariatun Islam
                    </div>
        
                    <span class="text-muted">Project Manager</span>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/T2.png" class="img-fluid" alt="team">
                    <div class="des">
                        Nur Mohammad
                    </div>
                    <span class="text-muted">Lead Developer</span>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/T3.png" class="img-fluid" alt="team">
                    <div class="des">
                        Sandip Misra
                    </div>
                    <span class="text-muted">Front End Developer</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="images/5.png" class="img-fluid" alt="team">
                    <div class="des">
                        MD Reasat Ahmed
                    </div>
                    <span class="text-muted">Back End Developer</span>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('inc/contact.php'); ?>
    <?php include_once('inc/footer.php'); ?>