<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sinergi Honey</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./../../dist/css/auth/login.css">
</head>

<body>


  <div class="formGroup">
    <h3>LOGIN</h3>
    <hr>
    <form action="./../../backend/auth/login.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fa-solid fa-envelope"></i>
          </span>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text">
            <i class="fa-solid fa-lock"></i>
          </span>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
      </div>
      <div>
        <button class="btn btn-primary w-100 mt-3" type="submit" name="submit">Submit</button>
      </div>
    </form>
    <p class="mt-4 text-center footerText">Copyright &copy; by Sinergi Honey 2023</p>
  </div>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/4b990370bb.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>