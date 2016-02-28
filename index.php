<html>
<head>
    <title>Matching</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
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
