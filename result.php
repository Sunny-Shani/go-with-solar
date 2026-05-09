<?php
if (!session_id()) {
    session_start();
}

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$save_record = "";
$solar_capacity = $month_bill = $bill_with_solar = $savings_month = $savings_year = $cost = $area_required = $payback_period = $tree = $annual_solar = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $month_bill = filter_input(INPUT_POST, "monthly_bill", FILTER_VALIDATE_INT);
    $unit_cost = filter_input(INPUT_POST, "units_cost", FILTER_VALIDATE_INT);

    $month_bill = trim(isset($month_bill) ? $month_bill  : "");
    $unit_cost = trim(isset($unit_cost) ? $unit_cost  : "");

    if (empty($month_bill) || empty($unit_cost)) {
        echo '<div class="alert alert-danger" role="alert">
        Data was not valid!</div>';
    } else {
        if ($month_bill < 0 || $unit_cost < 0) {
            echo '<div class="alert alert-danger" role="alert">
            Data was not valid!</div>';
        } else {
            //total power consumption per month in KW
            //data1
            $t_power = $month_bill / $unit_cost;
            $total_power = round($t_power);
            //number_format($num, 2);
            $total_power_watt = $total_power * 100;
            // echo "this is the total power $total_power_watt";

            //data2
            $s_capacity = $total_power / (6 * 30);
            $solar_capacity = ceil($s_capacity);
            //echo ("Your solar system requirement is " . $solar_capacity . " KW");

            //data3
            $a_solar = ($solar_capacity * 6) * 300;
            $annual_solar = round($a_solar);
            //echo ("Your solar system will generate " . $annual_solar . " KWh per year");

            //data4
            $area_required = 10 * $solar_capacity;
            //echo ("Your will require " . $area_required . " sq meter area for panels");

            //data5
            $c_cost = 0.80 * $solar_capacity;
            $cost = round($c_cost);
            //echo ("Total cost of your system will be Rs. " . $cost . " lakh (including battery cost)");

            //data6
            $s_month = (4 * 30 * $solar_capacity) * $unit_cost;
            $savings_month = round($s_month);
            //echo ("Your savings per month will be Rs. " . $savings_month);

            //data7
            $s_year = $savings_month * 12;
            $savings_year = round($s_year);
            // echo ("Your yearly savings will be Rs. " . $savings_year);

            //data8 and data9
            $bi_solar = $month_bill - $savings_month;
            $bill_with_solar = round($bi_solar);
            if ($bill_with_solar < 0) {
                $bill_with_solar = 0;
            }

            // in lakhs
            $year_bill = ($month_bill * 12) / 100000;
            $p = $cost / $year_bill;

            //data10
            $payback_period = ceil($p);
            //echo ("Your payback period is " . $payback_period . " years");

            //data11
            $tree = 2 * $solar_capacity;
            //echo ("Your have planted " . $tree . " trees");

            $name = $_SESSION["username"];
            require_once "config.php";

            // Check for duplicate data
            $sqlCheckDuplicate = "SELECT * FROM user_result WHERE name = ? AND month_bill = ? AND unit_cost = ?";
            $stmtCheckDuplicate = $conn->prepare($sqlCheckDuplicate);
            $stmtCheckDuplicate->bind_param("sss", $name, $month_bill, $unit_cost);
            $stmtCheckDuplicate->execute();
            $resultCheckDuplicate = $stmtCheckDuplicate->get_result();

            if (!$resultCheckDuplicate->num_rows > 0) {
                // No duplicate data, proceed to insert
                $sqlInsert = "INSERT INTO user_result (name, solar_capacity, month_bill,unit_cost, bill_solar,saving_month,	saving_year	,system_cost,area,payback_period,tree_added	,	annual_generation ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInsert = $conn->prepare($sqlInsert);
                $stmtInsert->bind_param(
                    "ssssssssssss",
                    $name,
                    $solar_capacity,
                    $month_bill,
                    $unit_cost,
                    $bill_with_solar,
                    $savings_month,
                    $savings_year,
                    $cost,
                    $area_required,
                    $payback_period,
                    $tree,
                    $annual_solar
                );

                if ($stmtInsert->execute()) {
                    global $save_record;
                    $save_record = "Your records have been stored successfully.";
                }
                $stmtCheckDuplicate->close();
                $stmtInsert->close();
            }

            // Close database connection
            $conn->close();
        }
    }
}
//print_r($_GET);
$month_bill = $month_bill <= 0 ? $month_bill = "" : $month_bill;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . "/partials/favicon.php"; ?>

    <title>Result</title>

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
    <center>
        <?php if (!$save_record == "") {
            echo '<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="files/sun.png" class="rounded me-2" alt="sun" width="30px" height="30px">
                <strong class="me-auto">Go with Solar</strong>
                <small class="text-muted">few secs ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-success ">
                <h6>
                   ' . $save_record . ' 
                </h6>
            </div>
        </div>';
        } ?>
    </center>

    <div class="shadow-lg p-5 rounded-2 contain_class mt-0" style="background-color: rgb(239, 243, 239);">
        <div class="row mb-5 rowclass">
            <div class="col-md-4">
                <center>
                    <h4>Recommended Solar System Size</h4>
                    <img src="files/solar_size.webp" alt="solar size" class="img-fluid ">
                    <br><br>
                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        <?php echo $solar_capacity; ?> kW
                    </span>
                </center>
            </div>

            <hr class="hrclass hrclass1">
            <div class="col-md-4">

                <center>
                    <h4>Previous Monthly Bill</h4>
                    <span style="color: red; font-size: 30px; font-weight: 500;">
                        Rs. <span><?php echo $month_bill; ?></span>
                    </span>

                    <br><br>
                    <h4>Bill with Solar</h4>
                    <img src="files/solar_saving.webp" alt="solar saving" class="img-fluid">
                    <br>
                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        Rs. <span><?php echo $bill_with_solar; ?></span>

                    </span>
                    <span id="result_negative"></span>
                </center>

            </div>
            <hr class="hrclass hrclass1">

            <div class="col-md-4">
                <center>
                    <h4>Monthly Savings</h4>

                    <img src="files/monthly_saving.webp" alt="month savings" class="img-fluid">
                    <br> <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        Rs. <span><?php echo $savings_month; ?></span>
                    </span>
                    <br> <br>
                    <h4>Yearly Savings</h4>

                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        Rs. <span><?php echo $savings_year; ?></span>
                    </span>
                </center>
            </div>

        </div>
        <hr>
        <!--new row !!!!!-->
        <div class="row mt-5 mb-5 rowclass">
            <div class="col-md-4">
                <center>
                    <h4>Total System Cost</h4>
                    <p>(including battery cost)</p>
                    <br>
                    <img src="files/rupee.png" alt="symbol rupee" class="img-fluid " height="129" width="130">
                    <br><br>
                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        <span><?php echo $cost; ?></span> lakh
                    </span>
                </center>
            </div>

            <hr class="hrclass hrclass1">

            <div class="col-md-4 ">

                <center>
                    <h4>Area Required for Installation</h4>

                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        <span><?php echo $area_required; ?></span> sq meter
                    </span>
                    <br><br>
                    <img src="files/area.webp" alt="area" class="img-fluid" height="129" width="130">
                    <br>
                </center>

            </div>
            <hr class="hrclass hrclass1">

            <div class="col-md-4">
                <center>
                    <h4>Payback Period</h4>
                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        <span><?php echo $payback_period; ?></span> years
                    </span> <br> <br>
                    <img src="files/payback.webp" alt="payback" class="img-fluid" height="129" width="130">
                </center>
            </div>
        </div>

        <!--another new row-->
        <hr>
        <div class="row mt-5 rowclass">
            <div class="col-md-6">
                <center>
                    <h4>Contribution to the Environment</h4>
                    <br>
                    <img src="files/tree.webp" alt="tree" class="img-fluid">
                    <br> <br>
                    <span style="color: rgb(26, 163, 26); font-size: 30px; font-weight: 500;">
                        <span><?php echo $tree; ?></span> trees added
                    </span>
                </center>
            </div>
            <hr class="hrclass hrclass1">

            <div class="col-md-6">
                <center>
                    <h4>Estimated Generation Annually</h4>
                    <br>
                    <img src="files/annual.webp" alt="annual" class="img-fluid">
                    <br> <br>
                    <span style="color: rgb(42, 158, 194); font-size: 30px; font-weight: 500;">
                        <span><?php echo $annual_solar; ?></span> kWH
                    </span>
                </center>
            </div>
        </div>
        <br><br>
        <center>
            <button type="submit" class="btn btn-primary" onclick="window.location.href= 'calculator.php';">
                Back to Calculator
            </button>
        </center>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>
