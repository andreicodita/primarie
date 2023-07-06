<?php 
include('database.php'); ?>
<!DOCTYPE html>
<head>
    <title>Modifica-postare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/adb91f1c55.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="conturi">
    <?php
    if($stmt = $db->query("SELECT * FROM users"))  {  
        if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif;} 
        $id_postare = $_GET['post_id_modif'];
        $query = "SELECT * FROM postari WHERE id_postare = '$id_postare'";
        $result = mysqli_query($db, $query); 
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_post'] = $row['id_postare'];
        $_SESSION['titlu'] = $row['titlu'];
        $_SESSION['descrierepost'] = $row['descriere'];
        $_SESSION['resedintapost'] = $row['resedinta'];
        $descriere = $row['descriere'];
        ?>
<div class="row align-items-center back" style="height: 100vh;">
  <form method="post" action="delete.php" enctype="multipart/form-data" class="mx-auto col-10 col-md-8 col-lg-6 text-center rounded">
  <h1 class="mb-4">Modifică postarea</h1>	
  <div class="mb-3 w-75 mx-auto fs-5">
		<label for="titlu" class="form-label">Titlu</label>
		<input class="form-control fs-5" id="titlu" name="titlu" placeholder="<?php echo "$row[titlu]";?>">
  </div>
  <div class="mb-3 w-75 mx-auto fs-5">
    <label for="descriere">Descriere</label>
    <textarea class="form-control fs-5" id="descriere" name="descriere" placeholder="<?php echo "$row[descriere]";?>" rows="4" style="resize: none;" maxlength="10001" value="<?php echo $descriere; ?>"><?php echo $descriere; ?></textarea>
  </div>
    <div class="mb-3 w-75 mx-auto fs-5">
   <label>Categorie:</label>
		<label for="primarie">
                    <select id="categorie" name="categorie" class="form-select fs-5">
                    <?php 
                      include("database.php");
                      $query ="SELECT categorie_nume FROM categorie";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);} ?>
                     
                      <?php 
                        foreach ($options as $option) {
                      ?>
                      <option><?php echo $option['categorie_nume'];
					  $categorie = $option['categorie_nume'];?> </option>
                      <?php 
                        }
                      ?> 
                    </select>
        </label>
    </div>
    <?php if($functie == "admin general"){?>
    <div class="mb-3 w-75 mx-auto fs-5">
   <label>Reședință:</label>
		<label for="primarie">
                    <select id="resedinta" name="resedinta" class="form-select fs-5">
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
    <?php } ?>
    <div class="mb-3 w-75 mx-auto fs-5">
  	  <button type="submit" class="btn btn-outline-light fs-5" name="post_id_mod">Modifică</button>
    </div>
</form>
</div>
</body>
</html>