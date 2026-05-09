<header class="p-2 bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><svg id="rays" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512">
                    <style>
                        svg {
                            fill: #efb20b;
                        }
                    </style>
                    <path d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z" />
                </svg> </a>
            <a href="index.php" class="navbar-brand">Go with <span style="color:#fda62d"> Solar
                </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calculator.php">Solar Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="know-about-solar.php">Know about Solar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="application.php">Solar Applications</a></li>
                            <li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="d-flex">
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                        $name = $quote = "";
                        $profile = htmlspecialchars($_SESSION["profile"]);
                        $username = htmlspecialchars($_SESSION["username"]);
                        $email = htmlspecialchars($_SESSION["email"]);
                        $usernameLast = htmlspecialchars($_SESSION["usernameLast"]);
                        $name = htmlspecialchars($_SESSION["name"]);
                        $quote = htmlspecialchars($_SESSION["quote"]);
                        $usernameLast = $usernameLast = "" ? $usernameLast = "" : $usernameLast;
                        $name = $name = "" ? $name = "" : $name;
                        $quote = $quote = "" ? $quote = "" : $quote;
                        echo '<a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor:pointer;" title="View Profile"><img src=' . $profile . ' class="me-2" alt="profile" width="40" height="40" style="border-radius:50%;"></a>
<a href="logout.php" class="btn btn-outline-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" fill="#312f2f" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" /><path fill-rule="evenodd" fill="#312f2f" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" /></svg><span style="padding-left:5px;">Log Out</span></a>';
                    } else {
                        echo '<a href="login.php" class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
<path fill-rule="evenodd" fill="#312f2f" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
<path fill-rule="evenodd" fill="#312f2f" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
</svg><span style="padding-left:5px;">Log In</span></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-body" id="exampleModalLabel">Your Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <center>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src='<?php echo $profile; ?>' class="mb-2" alt="profile" width="68" height="68" style="border-radius:50%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Hi, <?php echo $username . ' ' . $usernameLast; ?> 👋</h4>
                        </div>
                        <div class="col-12">
                            <p>Email: <?php echo $email; ?></p>
                        </div>
                    </div>
                    <hr style="width:200px;" class="mt-0 mb-2">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-lead">
                                <?php echo '"' . $quote . '"'; ?>
                            </p>
                            <figcaption class="blockquote-footer">
                                <cite title="Source Title"><?php echo $name; ?></cite>
                            </figcaption>
                        </div>
                    </div>

                </div>
            </center>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>