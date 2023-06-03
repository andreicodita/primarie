<?php include('welcome-server.php'); ?>
<!DOCTYPE html>
<head>
    <title>Primarie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <div class="bg-img">
    <form method="post" action="index.php">
        <div class="navbar_container">
        <a href="#" id="navbar_logo">Primăria nevoilor tale!</a>
        <p>Date de contact:<br><img src="img-site/phone.png">0232.951.305 <br>  <img src="img-site/email.png">primarianevoilortale@gmail.com </p>
        </div>
        <div class="navbar_container2">
        <label for="primarie">
                        <a href="#" id="navbar_logo1">Alege reședința de județ în care dorești să vezi primăria:</a> 
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
                        <option><?php echo $option['resedinta_nume']; ?> </option>
                        <?php 
                            }
                        ?> 
                        </select>
        </label>
        </form>
        <button type="submit" class="btn" name="resedinta_user">Intră!</button>
        </div>
    </div>
</body>