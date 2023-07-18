<!DOCTYPE html>
<head>
    <title>Primarie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/adb91f1c55.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- aos library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php include('header.php'); ?>
<?php if (isset($_SESSION['success'])) : ?>
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
                <?php endif ?>
    <div class="h-100 d-flex align-items-center justify-content-center">
                <?php if(isset($_SESSION['resedinta']))
                {
                    $resedinta = $_SESSION['resedinta'];
                    $imgpath = "img-site/Primar".$_SESSION['resedinta'].".png";
                    $query = "SELECT * FROM resedinte WHERE resedinta_nume='$resedinta'";
                    $result = mysqli_query($conn, $query);
                    $row = $result->fetch_assoc();
                    echo $row['svg'];
                }?>
    </div>
<div class="container">
    <div class="row">
  <div data-aos="fade-right"
     data-aos-anchor="#trigger-right"
     data-aos-offset="1300"
     data-aos-duration="1500" class="col-md-4">
    <div class="card" style="width: 22rem;">
    <?php echo "<img src='$imgpath' class='card-img-top' alt='Primar'>" ?>
    <div class="card-body">
    <?php echo "<p class='card-text fs-5 1h-sm' style='text-align: justify;'>$row[primar]</p>"?>
    </div>
    </div>
</div>
<?php 
    $resedinta = $_SESSION['resedinta']; 
    $stmt = $conn->query("SELECT * FROM postari WHERE resedinta = '$resedinta'");
    while ($row = $stmt->fetch_assoc()) {
        $id_post = $row['id_postare'];
        if($row['categorie'] == "Anunțuri")
    { ?>
        <div class="col"  data-aos="fade-left"
                                data-aos-anchor="#trigger-right"
                                data-aos-offset="1300"
                                data-aos-duration="1500">
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
          }} ?>
</div>
</div>
<script>
  AOS.init();
</script>
</body>
