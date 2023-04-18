<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap Css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- Bootstrap Css end-->

  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <!-- Bootstrap Icons end-->

  <!-- Jquery  -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- Jquery end -->

  <!-- Bootstrap Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Bootstrap Js -->

  <script src="./../js/main.js"></script>

  <title>Main</title>
</head>

<body class="bg-light-subtle">
  <?php
  require_once  __DIR__ . "/../controller/controller.php";


  validate_Session_Direct_Login();

  ?>
  <div class="container">
    <div class="row">
      <div class="col-xl-8 mx-auto">
        <h1 class="mt-3">Main Content</h1>
        <div class="card">
          <h5 class="card-header">App</h5>
          <div class="card-body">
            <h5 class="card-title text-center border-bottom border-2 border-secondary-subtle pb-1">
              Datas
            </h5>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">E-Mail</th>
                  <th scope="col">Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Opertaions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <button type="button" class="btn btn-secondary btn-sm">
              <i class="bi bi-plus-circle" style="font-size: 20px"></i> Add
              New
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>