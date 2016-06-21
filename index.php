<!-- <html>
<head>
    <title>Matching</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <div class="page-header"><h1 class="text-center">Matching</h1></div>
    <div class="formContainer">
    <form method="POST" action="login.php" class="form-horizontal">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="passw" class="form-control" id="passw" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Sign in</button>
        </div>
      </div>
    </form>
</div>
</body>
</html>
-->

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
        <div class="header col-md-12">
            <div class="icon">
                <i class="fa fa-bar-chart"></i>
            </div>
            <div class="title">
                <span>Matching</span>
            </div>
            <div class="col-md-2" style="float: right; margin-top: 2%;">
                <button class="btn btn-default btnLogin" type="submit" data-toggle="modal" data-target=".modal-login">Login</button>
            </div>
        </div>
        <div class="slogan col-md-12 text-center">
            <span>#GetYourStatistics.</span><br>
            <span class="subSlogan">Matching is the first free website to calculate football referee statistics</span>
        </div>
        <div class="description col-md-12 text-center">
            <div class="col-md-4">
                <i class="fa fa-user fa-8x"></i><br>
                <span class="descriptionTitle">Account.</span><br>
                <span class="descriptionLong">Set all your personal information to have a best experience</span>
            </div>
            <div class="col-md-4">
                <i class="fa fa-area-chart fa-8x"></i><br>
                <span class="descriptionTitle">Statistics.</span><br>
                <span class="descriptionLong">Set all your personal information to have a best experience</span>
            </div>
            <div class="col-md-4">
                <i class="fa fa-calendar fa-8x"></i><br>
                <span class="descriptionTitle">Calendar.</span><br>
                <span class="descriptionLong">Set all your personal information to have a best experience</span>
            </div>
        </div>

        <!-- <div class="arrowBar"><div class="bounce fa fa-angle-down fa-5x"></div></div> -->

    </section>

    <section class="secondSection">
        <div class="signupContent">
            <div class="signupSlogan">
                <span>Get started.</span><br>
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
                    <input class="nameInput feedback-input" placeholder="Create a password"></input>
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

</div>

<div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 5%;">
            <form class="form-horizontal" method="POST" action="login.php">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="passw" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
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
