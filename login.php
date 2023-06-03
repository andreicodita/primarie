<?php include('server.php') ?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
  <title>Pagina de logare</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <div class="header">
  	<h2>Logare</h2>
  </div>
  <form method="post" action="login.php">
  <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
            </div>
        <?php endif ?>
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Parola</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Logează-te</button>
  	</div>
  	<p>
  		Nu ai un cont? <a class="btn" href="register.php">Înregistrează-te</a>
		<a class="btn" href="index.php">Acasă</a>
  	</p>
  </form>
</body>
</html>