<?php include('server.php') ?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
  <title>Pagina de logare</title>
  <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<div class="row align-items-center" style="height: 100vh;">
  <form method="post" action="login.php" class="mx-auto col-10 col-md-8 col-lg-6 text-center rounded">
  <h1>Logare</h1>
  <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
            </div>
        <?php endif ?>
  	<?php include('errors.php'); ?>
	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="email" class="form-label">Email</label>
		<input class="form-control" id="email" name="email" placeholder="user@gmail.com">
	</div>
	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="password" class="form-label">Parola</label>
		<input type="password" class="form-control" id="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn btn-outline-light mx-auto fs-5" name="login_user">Logează-te</button>
  	</div>
  	<p class="fs-5">
  		Nu ai un cont? <a class="btn btn-outline-light fs-5" href="register.php">Înregistrează-te</a>
		<a class="btn btn-outline-light fs-5" href="index.php">Acasă</a>
  	</p>
  </form>
</div>
</body>
</html>