  <?php

  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

      header("Location:login.php");
      exit;

  }

  ?>



  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Welcome page</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
      <h1>Welcome - <?php echo $_SESSION['email']  ?></h1>
        
        <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Well done  <?php echo $_SESSION['email']  ?> </h4>
      <p>Hey How you doing ? Welcome to My Login System . You are logged in as <?php echo $_SESSION['email']  ?> </p>
      <hr>
      <p class="mb-0">Whenever you need to , be sure to logout <a href="/LoginSystem/logout.php">Using this link</a></p>
    </div>
      

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
  </html>