<?php
session_start();
require_once("./class/class.user.php");
$login = new USER();
/*
if($login->is_loggedin()!="")
{
	$login->redirect('arbitro.php');
} */

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);

	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('arbitro.php');
	}
	else
	{
		$error = "Wrong Details !";
	}
}
?>
<html>
<head>
    <title>Matching</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="images/favicon.ico">

    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

</head>
<body>
<div id="container">
    <section class="firstSection col-md-12" id="firstSection">
        <header class="col-md-12" style="padding-top:2.5%; text-align:center;">
            <!--<div class="icon">
                <i class="glyphicon glyphicon-stats"></i>
            </div> -->
            <div class="title">
                <i class="glyphicon glyphicon-stats"></i>
                <span>Matching</span>
            </div>
            <!-- <div class="col-md-2" style="float: right;">
                <button class="btn btn-default btnLogin" type="submit" data-toggle="modal" data-target=".modal-login">Login</button>
            </div> -->
        </header>
        <div class="slogan col-md-12 text-center">
            <span>#GetYourStatistics</span><br>
            <span class="subSlogan">Matching is the first free website to calculate football referee statistics</span>
        </div>
        <div class="col-md-12" style="margin-top:5%; display:block">
            <div class="col-md-4" style="text-align:center">
              <img src="icons/svg/login.svg" width="50%" /><br>
              <h2><span>Locked Info</span></h2>
            </div>
            <div class="col-md-4" style="text-align:center">
              <img src="icons/svg/schedule.svg" width="50%" />
              <h2><span>Scheduled Matches</span></h2>
            </div>
            <div class="col-md-4" style="text-align:center">
              <img src="icons/svg/analysis-1.svg" width="50%" />
              <h2><span>Matches Charts</span></h2>
            </div>
        </div>
        <div class="arrowDown">
      		<i class="fa fa-angle-down" aria-hidden="true"></i>
      	</div>
    </section>

    <section class="secondSection col-md-12 sectionGray">
        <div class="signupContent">
            <div class="signupSlogan text-center">
                <span style="font-size: 40px">Get started.</span><br>
                <span class="signupSubSlogan">Create now your free account!</span>
            </div>
            <form class="signupForm">
                <p class="email">
                    <input class="nameInput feedback-input" placeholder="Pick a username"></input>
                </p>
                <p class="email">
                    <input class="nameInput feedback-input" placeholder="Your Email"></input>
                </p>
                <p class="email">
                    <input type="password" class="nameInput feedback-input" placeholder="Create a password"></input>
                </p>
                <a href="" class="signupButton">
                    Sign up for Matching
                </a>
            </form>
            <div class="policy">
                <span>By clicking "Sign up for Matching", you agree to our terms of service and privacy policy.</span>
            </div>
        </div>
    </section>
    <section class="thirdSection col-md-12">
        <h1>Why Matching</h1>
        <!-- <div class="city">
          <img src="images/benefit-city.svg" alt="">
        </div> -->

        <div class="row process">
          <div class="sectionPlus">
              <img src="./icons/svg/calendar.svg" alt="">
              <p>Storico</p>
              <div class="plus">+</div>
          </div>
          <div class="sectionPlus">
              <img src="./icons/svg/stats.svg" alt="">
              <p>Statistiche</p>
              <div class="plus">+</div>
          </div>
          <div class="sectionPlus">
              <img src="./icons/svg/money-bag.svg" alt="">
              <p>Rimborsi</p>
              <div class="plus">+</div>
          </div>
          <div class="sectionPlus">
              <img src="./icons/svg/shield.svg" alt="">
              <p>Protezione</p>
          </div>
        </div>


        <!--<ul>
    			<li><img src="./icons/svg/analytics-2.svg"><span>For meetups and events</span></li>
    			<li><img src="./icons/svg/analytics-3.svg">For meetups and events</li>
    			<li><img src="./icons/svg/contract.svg">For meetups and events</li>
    			<li><img src="./icons/svg/calendar.svg">For meetups and events</li>
		    </ul>-->
    </section>

</div>

<div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 5%;">
        </div>
    </div>
</div>


</body>

<!--
<script>
	$( window ).scroll(function() {
		$( ".arrowBar" ).css( "opacity", "0" ).fadeOut( "slow" );
	});
</script>
-->
</html>
