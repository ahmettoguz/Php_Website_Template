<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../css/main.css">

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
  require_once  __DIR__ . "/../controller/sql_functions.php";

  validate_Session_Direct_Login();
  ?>

  <div class="container">
    <div class="row">
      <div class="col-xl-8 mx-auto">
        <div class="row">
          <div class="col-xl-6">
            <h1 class="mt-3">Main Content</h1>
          </div>
          <div class="col-xl-6 d-flex justify-content-end align-items-center" id="logoutBtn">
            <button type="button" class="btn btn-outline-danger ">Logout</button>
          </div>
        </div>
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
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
              <i class="bi bi-plus-circle" style="font-size: 20px"></i> Add
              New
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Specific User Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="userModalLabel">User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">...</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add User Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalLabel">Add User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- *** -->
        <form action="" id="addUserForm">
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-xl-10">
                <div class="form-floating mb-3">
                  <input required type="email" class="form-control" id="add_Input_Email" placeholder="email" />
                  <label for="add_Input_Email">Email address</label>
                </div>

                <div class="form-floating mb-3">
                  <input required type="password" class="form-control" id="add_Input_Password" placeholder="pass" />
                  <label for="add_Input_Password">Password</label>
                </div>

                <div class="form-floating mb-3">
                  <input required type="text" class="form-control" id="add_Input_Name" placeholder="name" />
                  <label for="add_Input_Name">Name</label>
                </div>

                <div class="form-floating mb-3">
                  <input required type="text" class="form-control" id="add_Input_Surname" placeholder="surname" />
                  <label for="add_Input_Surname">Surname</label>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
        <!-- *** -->
      </div>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit User #2</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- *** -->
        <form action="" id="editUserForm">
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-xl-10">
                <div class="form-floating mb-3">
                  <input required type="email" class="form-control" id="edit_Input_Email" placeholder="email" />
                  <label for="edit_Input_Email">Email address</label>
                </div>

                <div class="form-floating mb-3">
                  <input required type="password" class="form-control" id="edit_Input_Password" placeholder="pass" />
                  <label for="edit_Input_Password">Password</label>
                </div>

                <div class="form-floating mb-3">
                  <input required type="text" class="form-control" id="edit_Input_Name" placeholder="name" />
                  <label for="edit_Input_Name">Name</label>
                </div>

                <div class="form-floating mb-3">
                  <input required type="text" class="form-control" id="edit_Input_Surname" placeholder="surname" />
                  <label for="edit_Input_Surname">Surname</label>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
        <!-- *** -->
      </div>
    </div>
  </div>

</body>

</html>