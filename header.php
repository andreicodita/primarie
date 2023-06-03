<?php
include('database.php');
include('server.php');
include('welcome-server.php');?>
<!DOCTYPE html>
<head>
    <title>Primarie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar_container">
                <label for="primarie">
                    <a href="index.php" id="navbar_logo">PRIMĂRIA</a> 
                    <?php echo '<span class="resedinta">' . $_SESSION['resedinta']; '</span>' ?>
                </label>
                <div class="dropdown">
                <div class="buton">
                  <button class="dropbtn">Meniu</button>
                </div>
                    <div class="dropdown-content">
                      <a href="postari.php">Postări</a>
                      <a href="post.php">Scrie o reclamație/ sugestie</a>
                      <a href="register.php">Înregistrează-te</a>
                      <a href="welcome.php">Schimbă reședința</a>
                      <?php if(isset($_SESSION["email"])){ ?> <a href="logout.php?logout='1'" style="color: red;">Deloghează-te</a> <?php }?>
                    </div>
                  </div>
            </div>
        </nav>
        <nav class="navbar">
        <?php  if (isset($_SESSION['email'])){?>
        <div class="profil"><?php
            $sql = "SELECT functie, resedinta, nume, prenume FROM users WHERE email ='".$_SESSION['email']."'";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "Nume: " . $row["nume"]. " " . $row["prenume"]. "<br>" . "Funcție: " . $row["functie"] . "<br> Reședința: " . $row["resedinta"];
                $functie = $row['functie'];
                if($functie == "admin")
                  $resedintaadmin = $row['resedinta'];
                if($functie == "moderator")
                  $resedintamod = $row['resedinta'];
                $_SESSION['functie'] = $functie;
                }
              }
            ?>
          </div>  
        <?php
        if(isset($_SESSION['email']))
        if($functie == "admin general"){?>
          <div class="dropdown">
                <div class="buton">
                  <button class="dropbtn1">Meniu admin-general</button>
                </div>
                    <div class="dropdown-content1">
                      <a href="conturi.php">Conturi</a>
                      <a href="anunt.php">Adaugă un anunț</a>
                    </div>
                  </div>
        <?php }
        if(isset($_SESSION['email']))
        if($functie == "admin" && $resedintaadmin == $_SESSION['resedinta']){ ?>
        <div class="dropdown">
                <div class="buton">
                  <button class="dropbtn1">Meniu admin</button>
                </div>
                    <div class="dropdown-content1">
                      <a href="conturi.php">Conturi</a>
                      <a href="anunt.php">Adaugă un anunț</a>
                    </div>
                  </div>
        <?php }} ?>
        </nav>
    </header>
</body>
</html>