<?php include('welcome-server.php'); ?>
<!DOCTYPE html>
<head>
    <title>Primarie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/adb91f1c55.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
<form method="post" action="index.php">
<div class="container d-flex align-items-center min-vh-100">
    <div class="card mb-3 mx-auto " style="max-width: 90%">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="img-site/stema.png" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
        <div class="card-body">
        
            <h3 class="card-title fs-4">Primăria nevoilor tale!</h3>
            <p class="card-text fs-5">Alege reședința de județ în care dorești să vezi primăria: <select id="primarie" name="primarie">
                            <?php 
                            include("database.php");
                            $query ="SELECT resedinta_nume FROM resedinte";
                            $result = $conn->query($query);
                            if($result->num_rows> 0){
                                $options= mysqli_fetch_all($result, MYSQLI_ASSOC);} ?>
                            
                            <?php 
                                foreach ($options as $option) {
                            ?>
                            <option><?php echo $option['resedinta_nume']; ?> </option>
                            <?php 
                                }
                            ?> 
                            </select></p>
            <p class="card-text fs-6" style="text-align:right">Date de contact:<br><i class="fa-sharp fa-solid fa-phone"></i>0232.951.305 <br><i class="fas fa-envelope"></i>primarianevoilortale@gmail.com</p>
        </div>
        </div>
    </div>
    </form>
            <button type="submit" class="btn btn-light fs-5" name="resedinta_user">Intră!</button>
    </div>
</div>
</body>