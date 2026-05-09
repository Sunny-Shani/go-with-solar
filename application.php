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

    <title>Solar Application</title>

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

        .text-justify1 {
            text-align: justify;
            line-height: 1.6;
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

        .image {

            max-height: 460px;
            display: block;
            margin-left: auto;
            margin-right: auto;

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

    <div class="shadow-lg rounded-2 contain_class mt-0" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-5 " style="color: #21c2a2; font-weight:400;">
                    Solar Applications: Uses of Solar Energy </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="text-justify1 para-text">
                    <span style="font-size: 40px; color:rgb(99, 90, 90)">W</span>
                    e have already discussed all the necessary details you need to know about solar energy incase you missed it you can read our guide from here <a href="know-about-solar.php"><b> Know about Solar: Your Complete Solar Guide </b> </a>. Here we will discuss about different uses of solar energy. Our sun is the ultimate source for energy so, humans found many ways to harness that energy for their own good. Let's discuss few of them one by one.
                </p>
                <br>
            </div>
        </div>
        <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">
    </div>
    <!--container closing -->

    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">

        <div class="row">
            <div class="col-md-12">

                <h2 style="font-weight:400 ;">🌞 Electricity from Solar ⚡</h2>
                <br>
                <p class="text-justify1 para-text">This solar energy application has gained a lot of momentum in recent years. As solar panel costs decline and more people become aware of the financial and environmental benefits of solar energy, solar electricity is becoming increasingly accessible. India's solar installed capacity was 60.813 GWAC as of 30 September 2022. Solar power generation in India ranks fourth globally in 2021.
                </p> <br> <br>
                <img src="files/electricity.webp" alt="electricity from solar " class="img-fluid rounded-3 image">
                <br> <br>
                <p class="text-justify1 para-text">
                    The electricity is produced directly from solar energy by means of photovoltaic cells. The photovoltaic cell is an energy conversion device which is used to convert photons of sunlight directly into electricity. It is made of semi conductors which absorb the photons received from the sun, creating free electrons with high energies. These high energy free electrons are induced by an electric field, to flow out of the semiconductor to do useful work.
                </p>
            </div>
        </div>

        <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">

    </div>
    <!--container closing-->

    <div class="shadow-lg rounded-2 contain_class" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight:400 ;">🌞 Solar Water Heating 🚿</h2>
                <br>
                <p class="text-justify1 para-text">
                    Uses for solar energy extend to water heating systems. Most solar water heating solutions create hot water that people use inside the home. Solar water heaters use a rooftop cell to absorb the sun's heat and transfer it to the water tank. Solar water heaters usually have a 5- to 10-year payback. A solar water heating unit comprises a blackened flat plate metal collector with an associated metal tubing facing the general direction of the sun. The plate collector has a transparent glass cover above and a layer of thermal insulation beneath it.
                </p> <br>
                <img src="files/heating.webp" alt="solar water heating" class="img-fluid rounded-3 image" loading="lazy">
                <br> <br>
                <p class="text-justify1 para-text">
                    The metal tubing of the collector is connected by a pipe to an insulated tank that stores hot water during cloudy days. The collector absorbs solar radiations and transfers the heat to the water circulating through the tubing either by gravity or by a pump. <br><br> This hot water is supplied to the storage tank via the associated metal tubing. This system of water heating is commonly used in hotels, guest houses, tourist bungalows, hospitals, canteens as well as domestic and industrial units.
                </p>
            </div>
        </div>
        <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">

    </div>
    <!--container closing-->

    <div class="shadow-lg rounded-2 contain_class" style="background-color: rgb(239, 243, 239);">
        <div class="row">
            <div class="col-md-12">

                <h2 class="" style="font-weight:400 ;">🌞 Floating Solar Farms</h2>
                <br>
                <p class="text-justify1 para-text">
                    “Floatovoltaics” are photovoltaic (PV) solar power systems designed to float on the large surfaces of water bodies. Studies also show the power production of floating solar panels is greater by up to 10 percent due to the cooling effect of water. Floating solar farms also reduce the evaporative loss of water and suppress algae blooms, lowering water treatment costs.
                </p> <br>
                <img src="files/floating.webp" alt="floating solar farms" class="img-fluid rounded-3 image" loading="lazy">
                <br> <br>
                <p class="text-justify1 para-text">
                    Recently, government announces that the world's largest floating solar power plant is going to be built in Madhya Pradesh's Khandwa, it will generate 600 Megawatt power by 2022-23. The project is estimated to be worth over ₹3000 crores.
                </p>
            </div>
        </div>

        <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">

    </div>
    <!--container closing-->

    <div class="shadow-lg rounded-2 contain_class" style="background-color: rgb(239, 243, 239);">

        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight:400 ;">🌞 Solar Cooking 🍽</h2>
                <br>
                <p class="text-justify1 para-text">
                    A variety of fuel like coal, kerosene, cooking gas, firewood, dung cakes and agricultural wastes are used for cooking purposes. Due to the energy crisis, supply of these fuels are either deteriorating (wood, coal, kerosene, cooking gas) or are too precious to be wasted for cooking purposes (cow dung can be better used as manure for improving soil fertility). This necessitated the use of solar energy for cooking purposes and the development of solar cookers. A simple solar cooker is the flat plate box type solar cooker.
                </p> <br>
                <img src="files/cooking.webp" alt="solar cooking" class="img-fluid rounded-3 image" loading="lazy">
                <br> <br>
                <p class="text-justify1 para-text">
                    It consists of a well insulated metal or wooden box which is blackened from the inner side.The heat loss due to convection is minimised by making the box airtight. When placed in sunlight, the solar rays penetrate the glass covers and are absorbed by the blackened surface thereby resulting in an increase in temperature inside the box. Cooking pots blackened from outside are placed in the solar box. <br> <br> The uncooked food gets cooked with the heat energy produced due to increased temperature of the solar box. Collector area of such a solar cooker can be increased by providing a plane reflector mirror. When this reflector is adjusted to reflect the sun rays into the box, then a 15°C to 25°C rise in temperature is achieved inside the cooker box.
                </p>
            </div>
        </div>

        <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">

    </div>
    <!--container closing-->

    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">

        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight:400 ;">🌞 Solar Greenhouses 🏠</h2>
                <br>
                <p class="text-justify1 para-text">
                    A green house is a structure covered with transparent material (glass or plastic) that acts as a solar collector and utilises solar radiant energy to grow plants. It has heating, cooling and ventilating devices for controlling the temperature inside the green house. <br> Solar radiations can pass through the green house glazing but the thermal radiations emitted by the objects within the green house cannot escape through the glazed surface. As a result, the radiations get trapped within the green house and result in an increase in temperature.
                </p> <br>
                <img src="files/greenhouse.webp" alt="solar greenHouse" class="img-fluid rounded-3 image" style="max-height: 400px;" loading="lazy">
                <br> <br>
                <p class="text-justify1 para-text">
                    As the green house structure has a closed boundary, the air inside the greenhouse gets enriched with CO2 as there is no mixing of the greenhouse air with the ambient air. Further, there is reduced moisture loss due to restricted transpiration. All these features help to sustain plant growth throughout the day as well as during the night and all year round.
                </p>
            </div>
        </div>

        <hr style="height:3px;border-width:0px;color:black; background-color:rgb(0, 0, 0)">

    </div>
    <!--container closing-->

    <div class="shadow-lg contain_class rounded-2" style="background-color: rgb(239, 243, 239);">

        <div class="row">
            <div class="col-md-12">
                <h2 class="" style="font-weight:400 ;">🌞 Solar Vehicles ✈</h2>
                <br>
                <p class="text-justify1 para-text">
                    Solar-powered vehicles may be the future, with existing applications including buses, trains, airplanes and race cars that students in Australia and the U.S. have built. The world's first solar-powered bus was introduced in 2013, in Adelaide, Australia. Adelaide's city council was keen on reducing the city's carbon emissions as more than 30% of it came from transportation, both public and private. <br> <br> The Tindo (that's the name of the buses) buses are quite unique as they are 100% electric, meaning they are generating zero emission, unlike gas-powered and hybrid fleets.
                </p> <br>
                <img src="files/plane.webp" alt="solar greenHouse" class="img-fluid rounded-3 image" loading="lazy">
                <br> <br>
                <p class="text-justify1 para-text">
                    The solar impulse 2 is the first solar airplane. This plane can also fly at night with a pilot on board and all its trips around the world are powered only by the sun. There is also a solar road in Netherlands that generates as much as 3000kWh of electricity, which can power a household with a single person for an entire year yet it is only a 230 feet bicycle path.
                </p>
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
                this.page.url = 'https://gowithsolar.in/application'; // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = 'application'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
    <!--container closing-->
    <?php include_once "footer.php" ?>
</body>

</html>
