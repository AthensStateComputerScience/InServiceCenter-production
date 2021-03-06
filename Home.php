<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) { //submit email for newsletter

        require 'add_email.php';
    }
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="http://myathensric.org/Home_Data/foundation.css">
    <link rel="stylesheet" href="Home_Data/Home.css">


</head>

<body>
    <div id="thebigone">

        <div class="grid-container">
            <!-- Start Top Bar  -->
            <div class="title-bar" data-responsive-toggle="main-nav" data-hide-for="medium"><button class="menu-icon" type="button" data-toggle="main-nav"></button>
                <div class="title-bar-title">Menu</div>
            </div>
            <div id="main-nav" class="top-bar">
                <div class="top-bar-left"><span class="title-bar-title">Athens-AMSTI</span></div>
                <div class="top-bar-right">
                    <ul class="dropdown vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
                        <li class="active"><a href="Home.html" target="_self">Home</a></li>
                        <li><a href="http://myathensric.org/AboutUs.html" target="_self">About Us</a></li>
                        <li><a href="ContactUs_Data/ContactUs.html" target="_self">Contact</a></li>
                        <!--***************************************Code for top menu buttons ********************************************************** -->
                        <li><a href="public_html/calendar.html">Forms</a>
                            <ul class="menu vertical" data-submenu="" data-magellen="">
                                <li><a href="public_html/ReservationRequest.html" target="_blank">Reservation Request</a></li>
                                <li><a href="BookStudyRequest.html" target="_blank">Book Study Request</a></li>
                                <li><a href="GeneralRequest.html" target="_blank">General Request</a></li>
                                <li><a href="http://myathensric.org/WorkshopRequest.html" target="_blank">Workshop Request</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="public_html/calendar.html">Calendars</a>
                            <ul class="menu vertical" data-submenu="" data-magellen="">
                                <li><a href="public_html/calendar.html#roomA" target="_blank">Room A</a></li>
                                <li><a href="public_html/calendar.html#roomB" target="_blank">Room B</a></li>
                                <li><a href="public_html/calendar.html#roomC" target="_blank">Room C</a></li>
                                <li><a href="public_html/calendar.html#roomConf" target="_blank">Conference <br />Room</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- End Top Bar -->
            <div class="callout large">
                <div class="row column text-center"><img id="logo" src="Home_Data/Logo.jpg" alt="" /></div>
            </div>
            <div class="row">
                <div class="medium-6 columns medium-push-6"><img class="thumbnail1" src="Home_Data/athensnew.jpg" alt="" /></div>



                <div class="medium-6 columns medium-pull-6">
                    <h2 class="h2-text">Mission Statement</h2>
                    <p>The Alabama Math, Science, and Technology Initiative is the Alabama Department of Education&rsquo;s initiative to improve math and science teaching statewide. Its mission is to provide all students in Grades K-12 with the knowledge and skills needed for success in the workforce and/or postsecondary studies.</p>
                </div>

                <br>
                <br>
            </div>

            <div class="row">
                <h2 class="h2-text">Newsletter</h2>

                <div class="responsive-embed"><iframe src="https://drive.google.com/file/d/0B_IagnOgpy4oOW1vdmUxYjlvVGc/preview"></iframe></div>
            </div>


            <div class="row">
                <div class="medium-7 columns">
                    <p><button class="button" data-open="Window">Subscribe to Newsletter</button></p>
                </div>
            </div>
            <div class="reveal" id="Window" data-reveal>
                <div class="text-center">
                    <h3>Email Address</h3>
                </div>
                <form action="home.php" method="post" autocomplete="off">
                <input type="email"required autocomplete="off" name="email"/>
                </form>
                <div class="row">
                <div class="text-center">
                    <button type="button" data-open="secWindow" class="success button" name="submit">Submit</button></div></div>
                <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
            </div>
            <div class="reveal" id="secWindow" data-reveal>
  <h2>Submitted</h2>
  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


   <!--<div class="mbr-section__container mbr-section__container--sm-padding container" style="padding-top: 40.8px; padding-bottom: 40.8px; margin: auto;">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2" data-form-type="formoid">
                                    <form class="mbr-form" action="https://mobirise.com/" method="post" data-form-title="SUBSCRIBE TO OUR NEWSLETTER"><input type="hidden" value="pvCHHlgYgKTn/4C/gKPcokyr+6ou9oDefMDkT7X/ZKPuc3eZsPlsTvDUeCr9Ni5L44oQ5OfpN0DA2/JBDlTCl2ffWA73ia6AvYIf4mPTfVe07271qRd96+KpFrYrq1nR" data-form-email="true" /></form>
                                    <div class="mbr-header mbr-header--center mbr-header--std-padding">
                                        <h2 class="h2-text">Subscribe to our Newsletter</h2>
                                    </div>
                                    <div class="mbr-form__left"><input id="start" class="form-control" name="email" required="" type="email" placeholder="Enter Your Email Address..." data-form-field="Email" /><button id="subscribe" type="submit">SUBSCRIBE</button></div>
                                    <div data-form-alert="true">
                                        <div class="hide" data-form-alert-success="true">Thanks for subscribing!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->


            <div class="footer">
                <div id="paddress">
                    <p><strong>Physical Address <br /></strong> 1115-A Highway 31 South<br /> Athens, AL 35611</p>
                </div>
                <div id="maddress">
                    <p><strong>Mailing Address<br /></strong> 300 North Beaty Street<br /> Athens, AL 35611</p>
                </div>
                <div id="hours">
                    <p><strong>Office Hours<br /></strong>8:00 am to 4:30 pm <br /> Monday &ndash; Friday</p>
                </div>
                <div id="office">
                    <p><strong>Office: </strong>256.216.6622</p>
                </div>
                <div id="fax">
                    <p><strong>Fax: </strong>256.216.6623</p>
                </div>

                <a href="https://twitter.com/AthensStateRIC" class="twitter-follow-button" data-show-count="false">Follow  @AthensStateRIC</a>
                <!-- To test locally, add http: or https: to src path. -->
                <!-- Twitter's widgets.js is not released under an open-source license for modification or self-hosting -->
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                
                <div id="directions">
                    <form id="addressinput" action="http://maps.google.com/maps" method="get" target="_blank"><input id="start" name="saddr" type="text" placeholder="Enter your location for directions" /> <input name="daddr" type="hidden" value="AMSTI--Athens State University RISC" /> <input type="submit" value="Get directions" />

                        <script src="https://maps.googleapis.com/maps/api/js?callback=myMap">
                            // <![CDATA[

                            // ]]>

                        </script>
                    </form>
                </div>
                <p id="info">Athens Amsti &copy; 2017 <a id="login_home" href="http://myathensric.org/login/index.php">Login </a></p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
        <script>
            // <![CDATA[
            $(document).foundation();
            // ]]>

        </script>
    </div>

</body>

</html>
