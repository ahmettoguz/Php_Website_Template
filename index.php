<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LoginPage</title>

  <!-- Bootstrap Css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- Bootstrap Css end-->

  <link rel="stylesheet" href="./assets/css/style.css" />

  <!-- Jquery  -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- Jquery end -->

  <!-- Bootstrap Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Bootstrap Js -->

  <script type="text/javascript" src="./assets/js/login.js"></script>
</head>

<body>
  <?php
  require_once  __DIR__ . "/assets/controller/sql_functions.php";

  validate_Session_Direct_Main();
  ?>

  <div class="container">
    <h1>LOGIN - CRUDS Template</h1>
    <div class="row mt-5">
      <div class="col-xl-7 mx-auto">
        <form action="" id="login_Form">
          <div class="card">
            <div class="card-header">
              <h5 class="text-center">APP</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">User Login</h5>

              <div class="row justify-content-center">
                <div class="col-xl-10">
                  <div class="form-floating mb-3">
                    <input required type="email" class="form-control" id="login_Input_Email" placeholder="email" value="ahmet@hotmail.com" />
                    <label for="login_Input_Email">Email address</label>
                  </div>

                  <div class="form-floating">
                    <input required type="password" class="form-control" id="login_Input_Password" placeholder="pass" value="User4321!" />
                    <label for="login_Input_Password">Password</label>
                  </div>

                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="login_Remember" value="1" />
                    <label class="form-check-label" for="login_Remember">Remember Me</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-body-secondary text-center">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-7 mt-3 mx-auto">
        Email - ahmet@hotmail.com <br />
        Password - User4321!
      </div>
    </div>
  </div>
</body>

</html>