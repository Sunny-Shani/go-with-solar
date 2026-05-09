<?php
// Initialize the session
if (!session_id()) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . "/partials/favicon.php"; ?>
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script async defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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

        .para-text {
            line-height: 1.6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #rays {
            animation: rotate 5s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* footer */
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
    <?php include_once "header.php" ?>
    <div class="container col-md-8 col-sm-8 col-11 mt-3 mb-5">
        <h1 class="display-5" style="text-align: center;"> Privacy Policy</h1>
        <h4 class="text-muted" style="margin-top: 40px;">Privacy Policy for Go with Solar</h4>
        <p class="para-text">
            At Go with Solar, accessible at gowithsolar.in, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Website and how we use it.
            <br><br> If you have additional questions or require more information about our Privacy Policy, do not hesitate to <a href="contact.php">Contact Us</a>
            <br><br> This privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Website. This policy is not applicable to any information collected offline or via channels other than this website.
        </p>

        <h4 class="text-muted" style="margin-top: 40px;">Consent</h4>
        <p class="para-text">
            By using our website, you hereby consent to our Privacy Policy and agree to its terms.
        </p>

        <h4 class="text-muted" style="margin-top: 40px;">Privacy Policy</h4>

        <p class="para-text">
            Most interactive websites use cookies to let us retrieve the user's details for each visit. Although cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may use cookies.
        </p>

        <h4 class="text-muted" style="margin-top: 40px;">Information we collect</h4>
        <p class="para-text">
            The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<br> <br>
            If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to
            provide. <br><br>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.
        </p>

        <h4 class="text-muted" style="margin-top: 40px;">How we use your information</h4>

        <ul>
            <li> Provide, operate, and maintain our website</li>
            <li>Improve, personalize, and expand our website</li>
            <li>Understand and analyze how you use our website</li>
            <li>Develop new products, services, features, and functionality</li>
            <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
            <li>Send you emails</li>
            <li>Find and prevent fraud</li>
        </ul>

        <h4 class="text-muted" style="margin-top: 40px;">Third-Party Privacy Policies</h4>
        <p class="para-text">
            Our Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links. <br><br>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.
        </p>
        <h4 class="text-muted" style="margin-top: 40px;">Children's Information</h4>
        <p class="para-text">
            Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity. <br><br>Go with Solar does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.
        </p>
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
    <?php include_once "footer.php" ?>
</body>

</html>
