<?php
require_once __DIR__ . "/app/config/bootstrap.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is already logged in, if yes then redirect him to homepage
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

require_once __DIR__ . "/app/Auth/GoogleAuth.php";
require_once __DIR__ . "/app/Auth/GitHubAuth.php";

$googleLoginUrl = (new GoogleAuth())->getAuthorizationUrl();
$githubLoginUrl = (new GitHubAuth())->getAuthorizationUrl();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . "/partials/favicon.php"; ?>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script async defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Login | Go with Solar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .ccontainer {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e8e8e8;
        }

        .main {
            position: relative;
            display: flex;
            flex-direction: column;
            background-color: rgb(111, 128, 224);
            max-height: 450px;
            width: 400px;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: rgba(59, 0, 130, 0.442) 0px 30px 90px;
        }

        .form1 {
            height: 400px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            padding: 24px;
        }

        label {
            color: #fff;
            font-size: 2rem;
            justify-content: center;
            display: flex;
            font-weight: 600;
        }

        /*Register*/
        .register {
            background: #eee;
            border-radius: 60% / 10%;
        }

        .register label {
            color: #573b8a;

        }

        .register {
            transform: translateY(-68%);
        }

        .register label {
            margin-bottom: .5rem;
        }

        /*sun login*/
        .sun {
            position: absolute;
            top: -19px;
            left: 10px;
        }

        /*Google Sign-In button */
        .custom-google-signin {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            /* White background color */
            color: #404549;
            /* Grey text color */
            font-weight: 600;
            border: 1px solid #ddd;
            /* Light border color */
            border-radius: 24px;
            /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Light shadow */
            padding: 10px;
            font-size: 16px;
            transition: background-color 0.3s;

            text-decoration: none;
        }

        /* Hover effect */
        .custom-google-signin:hover {
            background-color: #f5f5f5;
            /* Light grey background color on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Slightly darker shadow on hover */
        }

        /*Google Sign-In button image */
        .google-signin-image {
            width: 24px;
            height: 24px;
            margin-top: -1.6px;
            margin-right: 5px;
        }

        /* GitHub Login button styles */
        .github-login-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* GitHub color */
            color: #404549;
            /* White text color */
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 24px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        /* GitHub Logo styles using GitHub Octicons */
        .github-logo {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        /* Hover effect */
        .github-login-button:hover {
            background-color: #f5f5f5;
            /* Light grey background color on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="ccontainer">

        <div class="main">
            <div class="sun"><img src="files/login-sun.png" alt="sun"></div>

            <div><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>

            <div class="register">
                <form class="form1">
                    <label>login or signup</label>

                    <!-- Custom Google Sign-In button with image -->
                    <?php
                    if (!empty($googleLoginUrl)) {
                        echo '<a class="custom-google-signin" href="' . htmlspecialchars($googleLoginUrl) . '"><img class="google-signin-image" src="files/google_button.png" alt="Google Logo">
                        <span>Sign in with Google</span></a>';
                    }
                    ?>

                    <?php
                    echo '<a class="github-login-button" href="' . htmlspecialchars($githubLoginUrl) . '"><img class="github-logo" src="files/github-icon.png" alt="GitHub Logo">
                     Sign in with GitHub</a>';
                    ?>
                    <center> <br>
                        <div class="text-wrap" style="width: 17rem;">
                            <p class="text-muted" style="font-size: 15px;">By clicking continue, you agree to our
                                <a href="terms.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Terms of Service</a> and
                                <a href="privacy.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Privacy Policy.</a>
                            </p>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
