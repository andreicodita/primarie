<?php include('server-post.php');
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
  <title>Scrie un anunț</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <div class="header">
  	<h2>Anunț</h2>
  </div>
	
  <form method="post" action="anunt.php" enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Titlu</label>
  	  <input type="text" name="titlu" value="<?php echo $titlu; ?>">
  	</div>
	<div class="input-group">
		<label for="descriere">Descriere</label>
		<textarea id="descriere" name="descriere" placeholder="Scrie aici descrierea anunțului..." maxlength="10001" value="<?php echo $descriere; ?>"></textarea>
  	</div>
	<div class="input-group">
		<label for="pictures">Încarcă imagini</label> 
		<input type="file" id="pictures" name="pictures" accept="image/png, image/jpeg, image/jpg, image/webp"/>
	</div>
	<?php if(isset($_SESSION['functie']))
	if($_SESSION['functie'] == "admin general"){ ?>
	<div class="input-group">
  	  <label>Reședință</label>
		<label for="primarie">
                    <select id="primarie" name="primarie">
                    <?php 
                      include("database.php");
                      $query ="SELECT resedinta_nume FROM resedinte";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                        $options= mysqli_fetch_all($result, 1);} ?>
                     
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
	<?php }?>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="anunt_user">Postează</button>
		<a class="btn" href="index.php">Acasă</a>
	</div>
  </form>
</body>
</html>