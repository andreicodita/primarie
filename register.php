<?php include('server.php') ?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
  <title>Pagina de inregistrare</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <div class="header">
  	<h2>Înregistrare</h2>
  </div>
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nume</label>
  	  <input type="text" name="nume" value="<?php echo $nume; ?>">
  	</div>
	<div class="input-group">
  	  <label>Prenume</label>
  	  <input type="text" name="prenume" value="<?php echo $prenume; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	<div class="input-group">
  	  <label>Reședință</label>
		<label for="primarie">
                    <select id="primarie" name="primarie">
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
  	<div class="input-group">
  	  <label>Parolă</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmă parola</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Înregistrează-te</button>
  	</div>
  	<p>
  		Ai deja cont? <br class="break"><a class="btn" href="login.php">Loghează-te</a>
		<a class="btn" href="index.php">Acasă</a>
  	</p>
  </form>
</body>
</html>