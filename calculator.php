<?php
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

    <title>Solar Calculator</title>

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
            background-color: whitesmoke;
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

        .contain_class {
            margin-right: 15px;
            margin-left: 15px;
            margin-top: 55px;
        }

        /*Small devices (landscape phones, 544px and up) */
        @media screen and (min-width: 544px) {
            .contain_class {
                margin-right: 13px;
                margin-left: 13px;
            }

            /*1rem = 16px*/
        }

        /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
        @media screen and (min-width: 768px) {
            .contain_class {
                margin-right: 18px;
                margin-left: 18px;
            }

            /*1rem = 16px*/
        }

        /* Large devices (desktops, 992px and up) */
        @media screen and (min-width: 992px) {
            .contain_class {
                margin-right: 25px;
                margin-left: 25px;
            }

            /*1rem = 16px*/
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media screen and (min-width: 1200px) {
            .contain_class {
                margin-right: 28px;
                margin-left: 28px;
            }

            /*1rem = 16px*/
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

    <div style="height:72vh; overflow:auto;" class="d-flex align-items-center justify-content-center">
        <div class="shadow-lg px-3 py-5 rounded-2 contain_class mt-0" style="background-color: rgb(239, 243, 239); width:100%;
    ">
            <center>
                <div class="container my-3">
                    <h1 class="display-5 mb-4">Solar Calculator</h1>

                    <form action=<?php echo htmlspecialchars("result.php"); ?> method="post">
                        <div class="mb-3 mt-3 col-md-6 col-sm-12 was-validated">

                            <input type="number" min="1" class="form-control" id="monthly_bill" placeholder="Monthly electricity bill (Rs)" name="monthly_bill" required>

                        </div>
                        <span id="show1" style="color: red;"></span>

                        <div class="mb-3 mt-4 col-md-6 col-sm-12 was-validated">

                            <input type="number" min="1" class="form-control" id="units_cost" placeholder="Rs per unit" name="units_cost" required>

                        </div>

                        <button type="submit" class="btn btn-primary" onclick="return validate_form(); ">Calculate</button>
                        <button type="reset" class="btn btn-danger ms-2 px-3">
                            Reset</button>
                    </form>
                </div>
            </center>
        </div>
    </div>

    <script>
        //sensitive part DO NOT TOUCH
        function validate_form() {
            let check_emptybill = document.getElementById("monthly_bill").value;
            let check_emptyunit = document.getElementById("units_cost").value;

            if ((check_emptybill == "") || (check_emptyunit == "")) {
                document.getElementById("show1").innerHTML = "*All Inputs are Mandatory";
                return false;
            }

            var reg = new RegExp('^[0-9]*$');

            if ((reg.test(check_emptybill) == false) || (reg.test(check_emptyunit) == false)) {
                // alert('Only Numeric Ticket ID is allowed.');
                document.getElementById("show1").innerHTML = "*Only Numbers are allowed.";
                return false;
            } else {
                return true;
            }
        }
    </script>
    <?php include_once "footer.php" ?>
</body>

</html>
