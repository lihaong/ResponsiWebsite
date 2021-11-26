<?php
session_start();
error_reporting(0);

include 'functions.php';
if (isset($_POST['login'])) {
  if (login($_POST) > 0) {
    
  } else {
    echo mysqli_error($conn);
  }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Aplikasi Inventaris Berbasis Website
  </title>
  <link rel="stylesheet" href="login.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <div class="login-content">
      <div class="form-wrapper">
        <form class="bg-form" method="POST">
          <h1 class="title-form">
            Login to your account
          </h1>
          <div class="field-group">
            <label class="label" for="txt-email">Username</label>
            <input class="input" type="text" id="txt-email" name="username" placeholder="Enter Username" required />
          </div>
          <div class="field-group">
            <label class="label" for="txt-password">Password</label>
            <input autocomplete="off" class="input" type="password" id="txt-password" name="password" placeholder="Enter Password" required />
          </div>

          <div class="field-group">
            <input class="btn-submit" type="submit" name="login" value="Log In" />
          </div>
        </form>
      </div>
    </div>
  </header>
</body>

</html>