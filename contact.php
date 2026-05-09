<?php
// Initialize the session
if (!session_id()) {
    session_start();
}

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . "/partials/favicon.php"; ?>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script async defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
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

        .error {
            color: #FF0001;
        }

        .contact-form {
            background: #fff;
            width: 95%;
        }

        /*Small devices (landscape phones, 544px and up) */
        @media screen and (min-width: 544px) {
            .contact-form {
                width: 85%;
            }
        }

        /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
        @media screen and (min-width: 768px) {
            .contact-form {
                width: 70%;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media screen and (min-width: 992px) {
            .contact-form {
                width: 70%;
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media screen and (min-width: 1200px) {
            .contact-form {
                width: 70%;
            }
        }

        .contact-form .form-control {
            border-radius: 1rem;
        }

        .contact-image {
            text-align: center;
        }

        .contact-image img {
            border-radius: 6rem;
            width: 11%;
            margin-top: -3%;
            transform: rotate(29deg);
        }

        .contact-form form {
            padding: 14%;
        }

        .contact-form form .row {
            margin-bottom: -7%;
        }

        .contact-form h3 {
            margin-bottom: 8%;
            margin-top: -10%;
            text-align: center;
            color: #0062cc;
        }

        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: rgb(31, 196, 31);
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        .btnContactSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
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
    <?php
    include_once "header.php";
    $nameErr = $messageErr = $emailErr = "";

    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $newmessage = isset($_POST['message']) ? $_POST['message'] : "";

    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //String Validation  
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = input_data($_POST["name"]);
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only alphabets and white space are allowed";
            }
        }

        //Email Validation   
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = input_data($_POST["email"]);
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        //message String Validation  
        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $newmessage2 = htmlspecialchars($newmessage);
            $message = input_data($newmessage2);
        }

        if ($nameErr == "" && $emailErr == "" && $messageErr == "") {
            require_once "config.php";
            // Check for duplicate data
            $sqlCheckDuplicate = "SELECT * FROM table_contact WHERE email = ? AND message = ?";
            $stmtCheckDuplicate = $conn->prepare($sqlCheckDuplicate);
            $stmtCheckDuplicate->bind_param("ss", $email, $message);
            $stmtCheckDuplicate->execute();
            $resultCheckDuplicate = $stmtCheckDuplicate->get_result();

            if (!$resultCheckDuplicate->num_rows > 0) {
                // No duplicate data, proceed to insert
                $sqlInsert = "INSERT INTO table_contact (name, email, message ) VALUES (?, ?, ?)";
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->bind_param(
                    "sss",
                    $name,
                    $email,
                    $message
                );

                if ($stmtInsert->execute()) {
                    echo '<div class="alert alert-success d-flex align-items-center mb-0" role="alert">
  <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path fill="#00b300" d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path fill="#00b300" d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
</svg>
  <div>
    Thanks for Contacting Us!
  </div>
</div>';
                } else {
                    echo '<div class="alert alert-danger d-flex align-items-center mb-0" role="alert">
  <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
  <path fill="#ff0000" d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
  <path fill="#ff0000" d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
</svg>
  <div>
    Something went wrong! Try again later.
  </div>
</div>';
                }
                $stmtCheckDuplicate->close();
                $stmtInsert->close();
            } else {
                echo '<div class="alert alert-warning d-flex align-items-center text-center mb-0" role="alert">
 <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg>
  <div>
    Your message is already received!
  </div>
</div>';
            }
            // Close database connection
            $conn->close();
        }
    } //main if
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = preg_replace("/\s+/", " ", $data);
        return $data;
    }
    ?>
    <div style="background: -webkit-linear-gradient(left, #ebe4f2, #69b9cf); height:72vh; overflow:hidden;" class="py-5 d-flex align-items-center justify-content-center">
        <div class="container-fluid contact-form containn_class" style="border-radius: 12px;">

            <form action=<?php echo htmlspecialchars("contact.php"); ?> method="post">
                <h3>Say Hello (✿◡‿◡)</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group pb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required autocomplete="off" />
                            <span class="error">
                                <?php echo $nameErr; ?>
                            </span>
                        </div>
                        <div class="form-group pb-3">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" required autocomplete="off" />
                            <span class="error">
                                <?php echo $emailErr; ?>
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" name="submit" class="btnContact" value="Submit" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>
