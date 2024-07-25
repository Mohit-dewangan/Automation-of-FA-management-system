<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>AOTFAMS</title>
  <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>


<div class="bg-image" style="background-image: url('bg3.jpg'); height: 100vh;">
<br><br>
<div class = "container">
<form action = "/FA/forgetpassword.php" method = "post">
<div class="card mx-auto" style="width: 20rem; height:30rem">
<div class="col d-flex justify-content-center">
<div style="width:100px; height:100px" >
<img src="nitcl.png" class="card-img-top">
</div>
    </div>
    <br>
  <div class="card-body">
    <h3 style="text-align:center">Email for password reset</h3>
    <br>
  
    <label for="Email">Email</label>
    <input type="email" class="form-control" id="email" name = "email" placeholder="email_id">
    <br>
    <button type="submit" class="btn btn-dark col-md-12" name ="send-reset-link">Reset</button>


  </div>
  </div>
    </form>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
  </body>
</html>