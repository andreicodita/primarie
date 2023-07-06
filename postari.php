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
</head>
<body>
    <?php include('header.php'); ?>
    <div class="postare">
    <?php
    $resedinta = $_SESSION['resedinta']; 
    if($stmt = $conn->query("SELECT * FROM postari WHERE resedinta = '$resedinta'"))  {
        echo "<div class='alert alert-light mx-auto' role='alert' style='height: auto; padding: 0; margin: 0; margin-bottom: 10px; margin-top: 10px; max-width: 280px'><h2>Numărul de postări: ".$stmt->num_rows."<br></h2></div>";   
        if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif;}?>

<div class="row row-cols-1 g-3 w-75 mx-auto">

        <?php 
    while ($row = $stmt->fetch_assoc()) {
        $id_post = $row['id_postare'];
        if($row['categorie'] == "Anunțuri")
    {
        echo "<section class='sectiune'><h1 class='titlu'>$row[titlu]</h1>"; if(isset($_SESSION['email']))
        if($functie == "admin general" ||$functie == "admin" && $resedintaadmin == $_SESSION['resedinta']){{
            echo "<div class='cdata1'>";
            echo "<a href='delete.php?post_id=".$row['id_postare']."' class='button1'>Șterge anunț</a>";
            echo "<span class='id'>ID: $row[id_postare]</span></div>";}}
            if($row['imagine_nume'] != ''){
            echo "<nav class='postnav1'><img src=images/$row[imagine_nume] alt='$row[imagine_nume]'></nav>";}
            echo "<article class='anunt'><textarea class='descriere' readonly>$row[descriere]</textarea><div class='cdata'><span>Categoria: $row[categorie]</span>";
            if(isset($_SESSION['email']))
            if($functie == "admin general" || $functie == "admin" && $resedintaadmin == $_SESSION['resedinta']){
            echo "<a href='change-post.php?post_id_modif=".$row['id_postare']."' class='button4'>Modifică</a>";}
            echo"<span class='data_'>Data postării: $row[data]</span></div></article>";
            echo"</section>";
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
                    echo "<a href='change-post.php?post_id_modif=".$row['id_postare']."' class='btn button btn-secondary fs-5'>Modifică postarea</a>";?>
                    <button type="button" class="btn btn-danger fs-5">Șterge postarea</button><p class="card-text" style="margin-top: 0">ID: <?php echo "$row[id_postare]"; ?> </p>
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