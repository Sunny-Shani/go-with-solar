<?php
if (!session_id()) {
    session_start();
}
// Check if the user is logged in, if not then redirect him to login page
//if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
// header("location: login.php");
// exit();
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . "/partials/favicon.php"; ?>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script async defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Home | Go with Solar</title>

    <style>
        /*go to top*/
        #myBtn {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Fixed/sticky position */
            bottom: 20px;
            /* Place the button at the bottom of the page */
            right: 10px;
            /* Place the button 30px from the right */
            z-index: 99;
            /* Make sure it does not overlap */
            border: none;
            /* Remove borders */
            outline: none;
            /* Remove outline */
            background-color: #6969ec;
            /* Set a background color */
            color: white;
            /* Text color */
            cursor: pointer;
            /* Add a mouse pointer on hover */
            padding: 5px;
            /* Some padding */
            border-radius: 50%;
            /* Rounded corners */
        }

        #myBtn:hover {
            background-color: #555;
            /* Add a dark-grey background on hover */
        }

        /* Override site */
        #main {
            width: 100%;
            padding: 0;
        }

        .content-asset p {
            margin: 0 auto;
        }

        .breadcrumb {
            display: none;
        }

        /* Helpers */
        /**************************/
        .margin-top-10 {
            padding-top: 10px;
        }

        .margin-bot-10 {
            padding-bottom: 10px;
        }

        /* Typography */
        /**************************/
        #parallax-world-of-ugg h1 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 24px;
            font-weight: 400;
            text-transform: uppercase;
            color: black;
            padding: 0;
            margin: 0;
        }

        #parallax-world-of-ugg h2 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 70px;
            letter-spacing: 10px;
            text-align: center;
            color: white;
            font-weight: 400;
            text-transform: uppercase;
            z-index: 10;
            opacity: .9;
        }

        #parallax-world-of-ugg h3 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 14px;
            line-height: 0;
            font-weight: 400;
            letter-spacing: 8px;
            text-transform: uppercase;
            color: black;
        }

        #parallax-world-of-ugg p {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 400;
            font-size: 16.5px;
            line-height: 1.7;
        }

        .first-character {
            font-weight: 400;
            float: left;
            font-size: 84px;
            line-height: 64px;
            padding-top: 4px;
            padding-right: 8px;
            padding-left: 3px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .sc {
            color: #3b8595;
        }

        .ny {
            color: #3d3c3a;
        }

        .atw {
            color: #c48660;
        }

        /* Section - Title */
        /**************************/
        #parallax-world-of-ugg .title {
            padding: 60px;
            margin: 0 auto;
            text-align: center;
            background-color: whitesmoke;
        }

        #parallax-world-of-ugg .title h1 {
            font-size: 35px;
            letter-spacing: 8px;
        }

        /* Section - Block */
        /**************************/
        #parallax-world-of-ugg .block {
            background: whitesmoke;
            padding: 60px;
            width: 820px;
            margin: 0 auto;
            text-align: justify;
        }

        .section-class {
            color: whitesmoke;
        }

        #parallax-world-of-ugg .block-gray {
            background: #f2f2f2;
            padding: 60px;
        }

        #parallax-world-of-ugg .section-overlay-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0.70;
        }

        /* Section - Parallax */
        /**************************/
        #parallax-world-of-ugg .parallax-one {
            padding-top: 200px;
            padding-bottom: 160px;
            overflow: hidden;
            position: relative;
            width: 100%;
            background-image: url(files/solarpanel.webp);
            background-attachment: fixed;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
        }

        #parallax-world-of-ugg .parallax-two {
            padding-top: 200px;
            padding-bottom: 200px;
            overflow: hidden;
            position: relative;
            width: 100%;
            background-image: url(files/renewable.webp);
            background-attachment: fixed;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        #parallax-world-of-ugg .parallax-three {
            padding-top: 200px;
            padding-bottom: 200px;
            overflow: hidden;
            position: relative;
            width: 100%;
            background-image: url(files/forest.webp);
            background-attachment: fixed;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        #parallax-world-of-ugg .parallax-four {
            padding-top: 200px;
            padding-bottom: 200px;
            overflow: hidden;
            position: relative;
            width: 100%;
            background-image: url(files/saving.webp);
            background-attachment: fixed;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        @media only screen and (max-device-width: 1000px) {

            #parallax-world-of-ugg .parallax-one,
            #parallax-world-of-ugg .parallax-two,
            #parallax-world-of-ugg .parallax-three,
            #parallax-world-of-ugg .parallax-four {
                background-attachment: scroll;
            }
        }

        /* Extras */
        /**************************/
        #parallax-world-of-ugg .line-break {
            border-bottom: 1px solid black;
            width: 150px;
            margin: 0 auto;
        }

        /* Media Queries */
        /**************************/
        @media screen and (max-width: 959px) and (min-width: 768px) {
            #parallax-world-of-ugg .block {
                padding: 40px;
                width: 620px;
            }
        }

        @media screen and (max-width: 767px) {
            #parallax-world-of-ugg .block {
                padding: 30px;
                width: 420px;
            }

            #parallax-world-of-ugg h2 {
                font-size: 30px;
            }

            #parallax-world-of-ugg .block {
                padding: 30px;
            }

            #parallax-world-of-ugg .parallax-one,
            #parallax-world-of-ugg .parallax-two,
            #parallax-world-of-ugg .parallax-three {
                padding-top: 100px;
                padding-bottom: 100px;
            }

            #parallax-world-of-ugg p {
                font-size: 14.6px;
            }
        }

        @media screen and (max-width: 479px) {
            #parallax-world-of-ugg .block {
                padding: 30px 15px;
                width: 290px;
            }
        }

        .link-class {
            color: grey;
            text-decoration: none;
        }

        .link-class:hover {
            color: whitesmoke;
        }

        #footer-div {
            background-color: #141d2a;
            color: whitesmoke;
        }

        #footer-span {
            color: whitesmoke;
            padding-left: 2px;
        }
    </style>
</head>

<body>
    <div class="alert alert-info alert-dismissible fade show m-0" role="alert">
        <center>📢 This site has been updated recently <a href="https://github.com/Sunny-Shani/go-with-solar/tree/main" target="_blank" class="alert-link">View the update log</a>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </center>
    </div>
    <?php
    include_once "header.php";
    ?>
    <div id="parallax-world-of-ugg">
        <section>
            <div class="parallax-one">
                <h2 style="font-weight:500;">What is your future? <br>
                    <span style="color:#fda62d">Solar</span> is the answer
                </h2> <br><br>
                <center>
                    <div class="text-wrap px-1" style="max-width:40rem;">
                        <p style="color:whitesmoke;">Calculate how much power you need to light up your home with our solar calculators to
                            estimate the size and the cost of the solar panel array needed for your home energy usage.
                        </p>
                    </div>
                    <br><br>
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2" style="background-color:#5b78f4;" onclick="window.location = 'calculator.php' ">Get started ->
                    </button>
                </center>
            </div>
        </section>

        <section>
            <div class="title">
                <h3>But Why ?</h3>
                <h1>SOLAR</h1>
            </div>
        </section>

        <section>
            <div class="parallax-two">
                <h2>RENEWABLE ENERGY</h2>
            </div>
        </section>

        <section style="background-color:whitesmoke;">
            <div class="block">
                <p><span class="first-character ny">R</span>enewable energy is defined as energy from a source that is not depleted when used. The sun is one of the largest energy sources for our Earth. However, it has only been recently that solar energy has been used more to the best of our advantage. Renewable energy is a great way to have a constant energy source. The energy sources that we have created are not renewable and extremely harmful to the world around us. Rather than creating new, harmful energy sources we can use the primary one we have to create a cleaner world.</p>
                <p class="line-break margin-top-10"></p>
            </div>
        </section>

        <section>
            <div class="parallax-three">
                <h2>NO EMISSIONS</h2>
            </div>
        </section>

        <section style="background-color:whitesmoke;">
            <div class="block">
                <p><span class="first-character atw">S</span>olar panels give off zero carbon emissions. Compared to other energy sources, solar panels are proven to be one of the cleanest energy sources. The cleanliness of solar energy allows us to slow down the predicament of global warming. Zero greenhouse gases are released into the atmosphere when you are powering your home with solar energy. To do our part at Go with Solar we want to do our best to spread the positivity of solar energy. With your solar panel installation you can know that you are also doing your part to help the environment around you.</p>
                <p class="line-break margin-top-10"></p>
            </div>
        </section>

        <section>
            <div class="parallax-four">
                <h2>SAVINGS</h2>
            </div>
        </section>

        <section style="background-color:whitesmoke;">
            <div class="block">
                <p><span class="first-character atw">E</span>lectricity costs can make up a large portion of your monthly expenses. With a solar panel system, you will generate free power for your system entire 25+ year lifespan. Even if you do not produce 100 percent of the energy you consume, solar still reduces your utility bills, meaning you will save a lot of money.</p>
                <p class="line-break margin-top-10"></p>
            </div>
        </section>

    </div>

    <!-- "Go to Top" button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
            <path fill="#e6e6e6" fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5" />
        </svg>
    </button>
    <script async>
        // Get the button:
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>
