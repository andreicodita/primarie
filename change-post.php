<?php 
include('database.php'); ?>
<!DOCTYPE html>
<head>
    <title>Modifica-postare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="postari.css">
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
<form action="delete.php" method="post">
    <div class="input-group">
   <label>Titlu:</label> <input type="text" id="titlu" name="titlu" placeholder = "<?php echo "$row[titlu]";?>">
    </div>
    <div class="input-group">
   <label>Descriere:</label> <textarea class="descrieretxt" id="descriere" name="descriere" maxlength="10001" placeholder = "<?php echo "$row[descriere]";?>"><?php echo $descriere; ?></textarea>
    </div>
    <div class="input-group">
   <label>Categorie:</label>
		<label for="primarie">
                    <select id="categorie" name="categorie">
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
    <div class="input-group">
   <label>Reședință:</label>
		<label for="primarie">
                    <select id="resedinta" name="resedinta">
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
    <div class="input-group">
    <button type="submit" class="btn" name="post_id_mod">Modifică</button>
    </div>
</form>
</body>
</html>