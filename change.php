<?php include('database.php') ?>
<!DOCTYPE html>
<head>
    <title>Modifica-cont</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/adb91f1c55.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="postari.css">
    <link rel="stylesheet" type="text/css" href="register.css">
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

<div class="row align-items-center back" style="height: 100vh;">
  <form method="post" action="delete.php" enctype="multipart/form-data" class="mx-auto col-10 col-md-8 col-lg-6 text-center rounded">
  <h1 class="mb-4">Modifică-cont</h1>	
    <div class="mb-3 w-75 mx-auto fs-5">
   <label>Nume:</label> <input type="text" name="nume" placeholder = "<?php echo "$row[nume]";?>">
    </div>
    <div class="mb-3 w-75 mx-auto fs-5">
   <label>Prenume:</label> <input type="text" name="prenume" placeholder = "<?php echo "$row[prenume]";?>">
    </div>
   <div class="mb-3 w-75 mx-auto fs-5">
   <label>Email:</label> <input type="email" name="email" placeholder = "<?php echo "$row[email]";?>">
    </div>
    <div class="mb-3 w-75 mx-auto fs-5">
   <label>Funcție:</label>
		<label for="primarie">
                    <select id="functie" name="functie" class="form-select fs-5">
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
    <div class="mb-3 w-75 mx-auto fs-5">
    <?php if(isset($_SESSION['functie']))
	  if($_SESSION['functie'] == "admin general"){ ?>
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
    <button type="submit" class="btn btn-outline-light fs-5" name="modif_user">Modifică</button>
    </div>
  </form>
</div>
</body>
</html>