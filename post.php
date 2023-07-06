<?php include('server-post.php') ?>
<!DOCTYPE html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap -->
  <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="register.css">
<html>
<head>
  <title>Scrie o reclamație/sugestie</title>
</head>
<body>
<div class="row align-items-center" style="height: 100vh;">
  <form method="post" action="post.php" enctype="multipart/form-data" class="mx-auto col-10 col-md-8 col-lg-6 text-center rounded">
  <h1 class="mb-4">Reclamație/Sugestie</h1>	
  	<?php include('errors.php'); ?>
  <div class="mb-3 w-75 mx-auto fs-5">
		<label for="titlu" class="form-label">Titlu</label>
		<input class="form-control" id="titlu" name="titlu" placeholder="Titlu" value="<?php echo $titlu; ?>">
  </div>
  <div class="mb-3 w-75 mx-auto fs-5">
    <label for="descriere">Descriere</label>
    <textarea class="form-control" id="descriere" name="descriere" placeholder="Scrie aici descrierea postării..." rows="4" style="resize: none;" maxlength="10001" value="<?php echo $descriere; ?>"></textarea>
  </div>
  <div class="mb-3 w-75 mx-auto fs-5">
    <label for="pictures">Încarcă imagini</label>
    <input type="file" class="form-control-file d-flex justify-center" id="pictures" name="pictures" accept="image/png, image/jpeg, image/jpg, image/webp">
  </div>
  <div class="mb-3 w-75 mx-auto fs-5">
  	  <label>Categorie</label>
		<label for="categorie">
                    <select id="categorie" name="categorie" class="form-select fs-5">
                    <?php 
                      include("database.php");
                      $query ="SELECT categorie_nume FROM categorie WHERE categorie_nume != 'Anunțuri'";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                        $options= mysqli_fetch_all($result, 1);} ?>
                     
                      <?php 
                        foreach ($options as $option) {
                      ?>
                      <option><?php echo $option['categorie_nume'];
					            $resedinta = $option['categorie_nume'];?> </option>
                      <?php 
                        }
                      ?> 
                    </select>
        </label>
  	</div>
    <div class="mb-3 w-75 mx-auto fs-5">
  	  <label>Reședință</label>
		<label for="primarie">
                    <select id="primarie" name="primarie" class="form-select fs-5">
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
  	<div class="mb-3 w-75 mx-auto fs-5">
  	  <button type="submit" class="btn btn-outline-light fs-5" name="post_user">Postează</button>
		<a class="btn btn-outline-light fs-5" href="index.php">Acasă</a>
	</div>
  </form>
</div>
</body>
</html>