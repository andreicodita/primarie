<?php include('database.php') ?>
<!DOCTYPE html>
<head>
    <title>Modifica-cont</title>
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
        $email = $_GET['email'];
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $query); 
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['numeuser'] = $row['nume'];
        $_SESSION['prenumeuser'] = $row['prenume'];
        $_SESSION['emailuser'] = $row['email'];
        $_SESSION['functieuser'] = $row['functie'];
        $_SESSION['resedintauser'] = $row['resedinta'];
        ?>
<form action="delete.php" method="post">
    <div class="input-group">
   <label>Nume:</label> <input type="text" name="nume" placeholder = "<?php echo "$row[nume]";?>">
    </div>
    <div class="input-group">
   <label>Prenume:</label> <input type="text" name="prenume" placeholder = "<?php echo "$row[prenume]";?>">
    </div>
   <div class="input-group">
   <label>Email:</label> <input type="email" name="email" placeholder = "<?php echo "$row[email]";?>">
    </div>
    <div class="input-group">
   <label>Funcție:</label>
		<label for="primarie">
                    <select id="functie" name="functie">
                    <?php 
                      include("database.php");
                      $query ="SELECT nume_functie FROM functii";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);} ?>
                     
                      <?php 
                        foreach ($options as $option) {
                      ?>
                      <option><?php echo $option['nume_functie'];
					  $functie = $option['nume_functie'];?> </option>
                      <?php 
                        }
                      ?> 
                    </select>
        </label>
    </div>
    <div class="input-group">
    <?php if(isset($_SESSION['functie']))
	  if($_SESSION['functie'] == "admin general"){ ?>
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
    <button type="submit" class="btn" name="modif_user">Modifică</button>
    </div>
</form>
</body>
</html>