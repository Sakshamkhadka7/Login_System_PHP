        <?php
  $showAlert = false;
  $showError = false;

  if($_SERVER["REQUEST_METHOD"] == "POST"){

      include 'partials/_dbconnects.php';

      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      // Check email exists
      $existsSql = "SELECT * FROM client WHERE email='$email'";
      $result = mysqli_query($conn, $existsSql);
      $numExistRows = mysqli_num_rows($result);

      if($numExistRows > 0){
          $showError = "Email already exists. Please login.";
      }
      else {

          if($password == $cpassword){
            
            $hash=password_hash($password,PASSWORD_DEFAULT);



              $sql = "INSERT INTO client (email, password, cpassword, dt) 
                      VALUES ('$email', '$hash', '$hash', current_timestamp())";

              if(mysqli_query($conn, $sql)){
                  $showAlert = true;
              }else{
                  $showError = "Database insertion failed.";
              }

          } else {
              $showError = "Passwords do not match.";
          }
      }
  }
  ?>

        <!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>SignUp</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
          </head>
          <body>
        <?php
        require 'partials/_nav.php'?>

        <?php 

        if($showAlert){

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong>Now your account is created Login.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if($showError){
            {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error</strong>'.$showError.'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        }
        }

        ?>

        <div class="container my-4">
            <h1 class="text-center">Signup To Our Website</h1>
            <form action="/LoginSystem/signup.php" method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword">
            <div id="emailHelp" class="form-text">Make Sure type your passowrd same </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
          </body>
        </html>