<?php include('database.php');?>
<!DOCTYPE html>
<head>
    <title>Postări</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/adb91f1c55.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- aos library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="postari.css">
    <link rel="stylesheet" href="postari1.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="postare">
    <?php
    $resedinta = $_SESSION['resedinta']; 
    if($stmt = $conn->query("SELECT * FROM postari WHERE resedinta = '$resedinta'"))  {
        echo "<div class='alert alert-light mx-auto' role='alert' style='height: auto; padding: 0; margin: 0; margin-bottom: 10px; margin-top: 10px; max-width: 280px'><h2>Numărul de postări: ".$stmt->num_rows."<br></h2></div>";   
        if (isset($_SESSION['success'])) : ?>
            <div class="success w-50 mx-auto" style="z-index:999;">
						<div class="alert alert-success alert-dismissible fade show mx-auto fs-5" role="alert">
						<?php echo $_SESSION['success']; ?>
							<button type="button" class="btn close float-end button" style="vertical-align: middle; font-size:10px;" data-bs-dismiss="alert" aria-label="Close">
								<i class="fa-solid fa-x"></i>
							</button>
						</div>
                    <?php unset($_SESSION['success']);?>
                    </div>
            <div>
        <?php endif;} ?>
    <div class="row row-cols-1 g-3 w-75 mx-auto">
        <?php 
    while ($row = $stmt->fetch_assoc()) {
        $id_post = $row['id_postare'];
        if($row['categorie'] == "Anunțuri")
    { ?>
        <div class="col">
        <div class="card border-0 anunt" style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 6px 9px rgba(0,0,0,0.23);">
        <?php if($row['imagine_nume'] != ''){
            echo "<img src='images/$row[imagine_nume]' alt='$row[imagine_nume]' class='card-img-top'>"; } ?>
                <div class="card-body">
                    <h3 class="card-title"><?php echo "$row[titlu]"; ?></h3>
                    <p class="card-text fs-5">
                        <?php echo "$row[descriere]"; ?>
                    </p>
        <?php if(isset($_SESSION['email']))
                    if($functie == "admin general" || $functie == "admin" && $resedintaadmin == $_SESSION['resedinta'] || $functie == "moderator" && $resedintamod == $_SESSION['resedinta']){
                        echo "<a href='change-post.php?post_id_modif=".$row['id_postare']."' class='btn button btn-secondary fs-5'>Modifică postarea</a>
                        <a href='delete.php?post_id=".$row['id_postare']."'type='button' class='btn btn-danger fs-5'>Șterge postarea</a><p class='card-text' style='margin-top: 0'>ID: $row[id_postare] </p>";?>
        <?php }?>
                    <p class="card-text">Categoria: <?php echo "$row[categorie]"; ?></p>
                    <p class="card-text text-end"><small class="text-muted"><?php echo "$row[data]"; ?></small></p>
                </div></div></div><?php 
          }

    else{?>
    <div class="col">
    <div class="card border-0" style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 6px 9px rgba(0,0,0,0.23);">
    <?php if($row['imagine_nume'] != ''){
        echo "<img src='images/$row[imagine_nume]' alt='$row[imagine_nume]' class='card-img-top'>"; } ?>
            <div class="card-body">
                <h3 class="card-title"><?php echo "$row[titlu]"; ?></h3>
                <p class="card-text fs-5">
                    <?php echo "$row[descriere]"; ?>
                </p>
    <?php if(isset($_SESSION['email']))
                if($functie == "admin general" || $functie == "admin" && $resedintaadmin == $_SESSION['resedinta'] || $functie == "moderator" && $resedintamod == $_SESSION['resedinta']){
                    echo "<a href='change-post.php?post_id_modif=".$row['id_postare']."' class='btn button btn-secondary fs-5'>Modifică postarea</a>
                    <a href='delete.php?post_id=".$row['id_postare']."'type='button' class='btn btn-danger fs-5'>Șterge postarea</a><p class='card-text' style='margin-top: 0'>ID: $row[id_postare] </p>";?>
    <?php }?>
                <p class="card-text">Categoria: <?php echo "$row[categorie]"; ?></p>
                <p class="card-text text-end"><small class="text-muted"><?php echo "$row[data]"; ?></small></p>
            </div></div></div><?php 
      }
    }
    if($stmt->num_rows == 0)
        echo "<h1>Nu sunt postări în reședință.</h1>"; 
    
   ?>
</div>
</html>
</body>
</html>