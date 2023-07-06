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
<div class="h-100 d-flex align-items-center justify-content-center">
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
<div data-aos="fade-left"
     data-aos-anchor="#trigger-right"
     data-aos-offset="1300"
     data-aos-duration="1500">
    <div class="card" style="width: 22rem;">
    <?php echo "<img src='$imgpath' class='card-img-top' alt='Primar'>" ?>
    <div class="card-body">
    <?php echo "<p class='card-text fs-5 1h-sm' style='text-align: justify;'>$row[primar]</p>"?>
    </div>
    </div>
</div>
<script>
  AOS.init();
</script>
</body>
