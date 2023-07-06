<?php include('server.php') ?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
  <title>Pagina de inregistrare</title>
  <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/adb91f1c55.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<div class="row align-items-center" style="height: 100vh;">
<?php include('errors.php'); ?>
  <form method="post" action="register.php" class="col-10 col-md-8 col-lg-6 text-center rounded position-absolute top-50 start-50 translate-middle">
  <h1 class="mb-4">Înregistrare</h1>
  	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="nume" class="form-label">Nume</label>
		<input class="form-control" id="nume" name="nume" placeholder="Nume" value="<?php echo $nume; ?>">
	</div>
	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="prenume" class="form-label">Prenume</label>
		<input class="form-control" id="prenume" name="prenume" placeholder="Prenume" value="<?php echo $prenume; ?>">
	</div>
  	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="email" class="form-label">Adresa de email</label>
		<input class="form-control" id="email" name="email" placeholder="user@gmail.com" value="<?php echo $email; ?>">
	</div>
	<div class="mb-3 fs-5">
  	  <label class="form-label">Reședință</label>
		<label for="primarie">
                    <select id="primarie" name="primarie" class="form-select fs-5">
                    <?php 
                      include("database.php");
                      $query ="SELECT resedinta_nume FROM resedinte";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);} ?>
                     
                      <?php 
                        foreach ($options as $option) {
                      ?>
                      <option><?php echo $option['resedinta_nume'];
					  $resedinta = $option['resedinta_nume'];?> </option>
                      <?php 
                        }
                      ?> 
                    </select>
        </label>
  	</div>
	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="password" class="form-label">Parola</label>
		<input type="password" class="form-control" id="password_1" name="password_1">
  	</div>
	<div class="mb-3 w-75 mx-auto fs-5">
		<label for="password" class="form-label">Confirmă parola</label>
		<input type="password" class="form-control" id="password_2" name="password_2">
  	</div>
  	<div class="input-group">
		<button type="submit" class="btn btn-outline-light mx-auto fs-5" name="reg_user">Înregistrează-te</button>
  	</div>
  	<p class="fs-5">
  		Ai deja cont? <br class="break"><a class="btn btn-outline-light fs-5" href="login.php">Loghează-te</a>
		<a class="btn btn-outline-light fs-5" href="index.php">Acasă</a>
  	</p>
	</form>
</div>
</body>
</html>