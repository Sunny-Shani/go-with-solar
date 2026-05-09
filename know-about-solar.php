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

    <title>Know about Solar</title>

    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script async defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
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

        .contain_class {
            margin-right: 15px;
            margin-left: 15px;
            margin-top: 55px;
            padding: 26px;
        }

        /*Small devices (landscape phones, 544px and up) */
        @media screen and (min-width: 544px) {
            .contain_class {
                margin-right: 13px;
                margin-left: 13px;
                padding: 26px;
            }

            /*1rem = 16px*/
        }

        /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
        @media screen and (min-width: 768px) {
            .contain_class {
                margin-right: 18px;
                margin-left: 18px;
                padding: 40px;
            }

            /*1rem = 16px*/
        }

        /* Large devices (desktops, 992px and up) */
        @media screen and (min-width: 992px) {
            .contain_class {
                margin-right: 25px;
                margin-left: 25px;
                padding: 55px;
            }

            /*1rem = 16px*/
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media screen and (min-width: 1200px) {
            .contain_class {
                margin-right: 28px;
                margin-left: 28px;
                padding: 55px;
            }

            /*1rem = 16px*/
        }

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
    <div class="shadow-lg contain_class rounded-2 mt-0" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-5 " style="color: rgb(101, 101, 235); font-weight:400;">
                    Know about Solar: Your Complete Solar Guide
                    <img src="files/sun.png" alt="sun" width="50" height="50" class="img-fluid pb-2">
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="text-justify1 para-text">
                    <span style="font-size: 40px; color:rgb(99, 90, 90)">U</span>
                    nless you've been living under a rock for the past 30 years, you've probably heard about solar power. Despite being a leading clean energy technology, there is still a lot of mystery surrounding installing solar panels. How much does solar cost? Do you need a battery? How does solar power even work? We've broken down the basics of solar power to answer your questions and give you a better understanding of the increasingly popular energy source.
                </p> <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">
                <h2 class="" style="font-weight:400 ;">How does solar power work?</h2><br>
                <p class="text-justify1 para-text">
                    Solar power is produced through something called the photovoltaic effect. If
                    you've ever looked at a solar panel, you've probably seen that they are made up of multiple small squares. Those squares are called solar cells, photovoltaic cells,
                    or PV cells. <br> <br> Almost all the solar panels you see are made of silicon solar cells. Each cell has a negative layer with extra electrons and a positive layer that has room for those electrons to travel to. When sunlight hits that
                    negative layer, the electrons are knocked loose and begin to move to the positive layer. The flowing of electrons is solar electricity!
                </p> <br>
            </div>
        </div>

        <img src="files/solar-panel-diagram.webp" alt="solar panel diagram" class="img-fluid rounded-3 image" loading="lazy"><br> <br>

        <p class="text-justify1 para-text">
            Solar panels produce something called Direct Current, or DC, electricity. Most homes can't use DC electricity, so it needs to be converted into alternating current, or AC electricity. That's where solar inverters come in the DC electricity produced by the solar panels travels to the solar inverter where it is converted into AC electricity. <br> The AC electricity can then be used by your home appliances such as your refrigerator, lights, and TV!
        </p><br>
        <hr style="height:3px;border-width:0;color:black;background-color:black">
    </div>
    <!--container div closing-->

    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight:400 ;">Histroy of Solar Power</h2>
                <br>
                <p class="text-justify1 para-text">
                    In 1954, Bell Labs developed the first silicon photovoltaic cell. Although solar energy had previously been captured and converted into usable energy through various methods,only after 1954 did solar power begin to become a viable source of electricity to power devices over extended periods of time. The first solar cells converted solar radiation to electricity at an efficiency of 4 percent - for reference, many widely available solar panels today can convert sunlight to solar power at above 20 percent efficiency, a number constantly on the rise.<br> <br>
                    Although adoption of solar energy was slow at first, a number of state and federal incentives and policies contributed to driving down the cost of solar far enough to become more widely adopted. At this point, 57,705.70 MW including over 6,000 MW in rooftop solar installations, have been installed as of June 30,2022.
                </p> <br>
                <hr style="height:3px;border-width:0;color:black;background-color:black">
            </div>
        </div>
    </div>
    <!--close container-->

    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight: 400;">Cost of Solar Power</h2>
                <br>
                <p class="text-justify1 para-text">
                    The cost of setting up a rooftop solar system varies with the quality and price of the modules and inverters used. On average, the installation of a 1 kW rooftop solar system could cost between Rs 45,000 and Rs 85,000. Batteries would
                    cost extra if power is to be stored. <br><br>Similarly, the cost for a 5 kW system would fall between Rs 2,25,000 to Rs 3,25,000. Rooftop solar systems
                    are considered lighter on pocket as their cost can usually be recovered in 5-6 years.
                </p> <br><br>

                <h3 class="h2-class" style="font-weight: 400;">&nbsp;What about
                    Subsidies?
                </h3>
                <br>
                <p class="para-short text-justify1 para-text">
                    The central government offers financial support to consumers for installing rooftop solar systems. However, the subsidy is only available for residential properties and not for commercial/industrial establishments.<br><br>Classification of subsidies: <br>
                </p>
                <ul class="list-short">
                    <li>Up to 3 kW capacity - 40%</li>
                    <li>4-10 kW capacity - 20%</li>
                    <li>Above 10 kW - No subsidy</li>
                </ul>
                <p class="para-short text-justify1 para-text">
                    In the case of GHS/RWA consumers, there is a subsidy provision of 20% for a total capacity up to 500 kWp (limited to 10 kWp per house).
                </p><br>
                <hr style="height:3px;border-width:0;color:black;background-color:black">
            </div>
        </div>
    </div>
    <!--container close-->

    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight: 400;">Types of Solar Power Systems</h2><br>
                <p class="text-justify1 para-text">
                    There are three main types of Solar PV systems; On-Grid, Off-Grid, and Hybrid. Let us have a look at the advantages and disadvantages of each type of system.
                </p><br>
                <h3 class="text-3xl font-normal leading-normal mt-0 mb-2 text-gray-800 h2-class" style="color: rgb(42, 158, 194);">&nbsp;&nbsp;&nbsp; On-Grid System
                </h3>
                <br>
            </div>
        </div><br>

        <img src="files/on-grid.webp" alt="on grid system" class="img-fluid rounded-3 image" loading="lazy"><br><br>

        <div class="row">
            <div class="col-md-12">
                <p class="para-short text-justify1 para-text">
                    An on-grid or grid-tied solar system is a system that works along with the grid. This means that any excess or deficiency of power can be fed to the grid through net metering. Many residential users are opting for an On-grid solar system as they get a chance to enjoy credit for the excess power their system produces and save on their electricity bills. You will always have power either from the solar system or from the grid. They do not have batteries.
                </p><br>
                <hr style="height:1px;border-width:0;color:black;background-color:rgb(85, 82, 82)">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="h2-class" style="color: rgb(42, 158, 194);">
                    &nbsp;&nbsp;&nbsp; Off-Grid System
                </h3>
                <br>
                <p class="para-short text-justify1 para-text">
                    Off-grid systems work independently of the grid but have batteries which can store the solar power generated by the system. The system usually consists of solar panels, battery, charge controller, grid box, inverter, mounting structure and balance of systems. The panels store enough sunlight during the day and use the excess power generated in the night.
                    <br><br><br>
                    <img src="files/off-grid.webp" alt="off grid" class="img-fluid rounded-3 image" loading="lazy">
                    <br><br>
                    These systems are self-sustaining and can provide power for critical loads in areas where a power grid is not available.
                </p><br>
                <hr style="height:1px;border-width:0;color:black;background-color:gray">

                <h3 class="h2-class" style="color: rgb(42, 158, 194);">
                    &nbsp;&nbsp;&nbsp; Hybrid System
                </h3><br>
                <p class="para-short text-justify1 para-text">
                    As the name suggests, this type of system is a combination of both on-grid and off-grid systems where the system is connected to the grid and also has a battery backup. It is installed in areas that cannot depend on their electricity providers and require a backup during inconsistent power cuts.
                </p>
                <br>
                <img src="files/hybrid.webp" alt="hybrid" class="img-fluid rounded-3 image" loading="lazy">
            </div>
        </div>
    </div>
    <!--container close-->

    <!--frequently asked containercolor:#21c2a2;-->
    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">
        <div class="container">
            <h2 style="font-weight: 400;">Frequently asked questions</h2>
            <hr style="height:1px;border-width:0;color:black;background-color:gray">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is Net Metering ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body para-text">
                            <strong>Net metering</strong> is a mechanism which allows domestic or commercial users who generate their own electricity using solar panels or photovoltaic systems to export their surplus energy back to the grid. An off-grid system is generally a stand-alone system, while an on-grid system is connected to the main utility grid and incorporates the policy of net metering.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How many types of solar panels are there ?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body para-text">
                            Solar panels are generally broken into two groups by cell type: monocrystalline and polycrystalline.<br><br>
                            <strong>Monocrystalline solar panels</strong> are thought of as a premium solar product and are made with silicon wafers cut from a single crystal, hence the name "monocrystalline". In general, monocrystalline panels are capable of higher efficiencies than polycrystalline panels.<br><br>
                            <strong>Polycrystalline solar panels</strong> are also made from silicon, but their cells are made by melting together many fragments of silicon rather than from a single silicon crystal. While polycrystalline panels usually have lower efficiencies than their monocrystalline counterparts, they often have a lower price point.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do solar panels need direct sunlight to work ?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body para-text">
                            <strong>Solar panels work best in direct sunlight,</strong> but can also work without it. They produce electricity using a combination of direct and indirect sunlight as inputs. Both forms of sunlight carry photons, which is what the solar panels convert into electric current.<br><br> If there is no direct sunlight available, solar panels will produce electricity using indirect sunlight alone. There will, however, be a drop in performance in the absence of direct sunlight.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Can I use solar panels without battery ?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body para-text">
                            Ofcourse you can, <strong>if you have an On Grid system</strong> then you don't need a battery for storing extra power your panels will generate, this extra power will directly go to the grid through net metering. Batteries are only required if you have an Off Grid or a Hybrid System.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="height:1px;border-width:0;color:black;background-color:gray">

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

        <div id="disqus_thread"></div>
        <script>
            var disqus_config = function() {
                this.page.url = 'https://gowithsolar.in/know-about-solar'; // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = 'know-about-solar'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document,
                    s = d.createElement('script');
                s.src = 'https://gowithsolar.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
    <!--container close of frequently-->
    <?php include_once "footer.php"; ?>
</body>

</html>
