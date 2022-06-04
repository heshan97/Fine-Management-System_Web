<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fine Payment Management System</title>
  <link rel="icon" type="image/x-icon" href="./logo.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/4f128951c5.js" crossorigin="anonymous"></script>
  <script src="md5.min.js"></script>
  <style>

  </style>
</head>

<body>
  <div class="d-flex justify-content-center vh-100 align-items-center" style="background-image: url('./images/background.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="col-7">
      <div class=" text-light d-flex ">
        <div class="col-6 text-center p-3 py-5" style="background-color: #373737;">
          <span class="fs-2">Sri Lanka Police</span>
          <img src="./images/logo.png" class="pt-4 pb-4" width="200px" alt=""></br>
          <span class="fs-2">Fine Payment Management System</span>
        </div>
        <div class="col p-2 ps-4 pe-5 p-3 pt-5" style="background-color: #000000;">
          <span class="fs-2 ">Login</span>
          <hr>
          <div class="mb-3">
            <label for="name" class="form-label pt-4">Username</label>
            <input type="text" class="form-control bg-dark pt-3 text-light" id="name" name="name"  style="background-color: #1d1d1d; border: none; border-radius: 0;">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label pt-4">Password</label>
            <input type="password" class="form-control bg-dark pt-3 text-light" id="password" name="pass"  style="background-color: #1d1d1d; border: none; border-radius: 0;">
            <div id="login_failed_alert" class="flex-row pt-1" style="display: none;">
              <div class="col text-danger">Login Failed ! </div>
              <div class="col text-end"><a href="#">Forgot password?</a></div>
            </div>
          </div>
          <div class="text-end pt-4">
            <button type="submit" onclick="verifyUser()" class="btn mt-4 col-5 text-light" name="login" style="background-color: #1d1d1d; border: none; border-radius: 0;">Login</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function validate() {
      document.getElementById("form").submit();
    }

    function verifyUser() {
      username = document.getElementById('name').value;
      password = document.getElementById('password').value;
      const http_req = new XMLHttpRequest();
      http_req.onload = function() {
        if (this.responseText == "logged") {
          console.log('pass');
          window.open('index.php?dashboard', '_self')
        }
        else{
          document.getElementById('login_failed_alert').classList.add('d-flex');
        }

      }
      http_req.open('POST', "login_verify.php?username=" + username + "&password=" + md5(password));
      http_req.send();
    }
  </script>
</body>

</html>