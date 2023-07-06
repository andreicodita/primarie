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
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4" href="#">Primăria <?php echo '<span class="resedinta">' . $_SESSION['resedinta']; '</span>' ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Acasă</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="postari.php">Postări</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.php">Scrie o postare</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="welcome.php">Schimbă reședința</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown fs-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fas'>&#xf406;</i> Cont </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-ligbt bg-light fs-5" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="register.php">Înregistrează-te</a></li>
                        <li><a class="dropdown-item" href="login.php">Loghează-te</a></li>
                        <?php  if (isset($_SESSION['email'])){
                            ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="text-center">
                        <?php
                            $sql = "SELECT functie, resedinta, nume, prenume FROM users WHERE email ='".$_SESSION['email']."'";
                            $result = mysqli_query($db, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<p class='date-dropdown'>Nume:</p>" . $row["nume"]. " " . $row["prenume"]. "<br>" . "<p class='date-dropdown'>Funcție: </p>" . $row["functie"] . "<br> <p class='date-dropdown'>Reședința:</p> " . $row["resedinta"];
                                $functie = $row['functie'];
                                if($functie == "admin")
                                $resedintaadmin = $row['resedinta'];
                                if($functie == "moderator")
                                $resedintamod = $row['resedinta'];
                                $_SESSION['functie'] = $functie;
                                }}}
                            if(isset($_SESSION['email']))
                                if($functie == "admin general" || $functie == "admin" && $resedintaadmin == $_SESSION['resedinta']){?>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="conturi.php">Conturi</a></li>
                        <li><a class="dropdown-item" href="anunt.php">Scrie un anunț</a></li><?php }?>
                        <?php if(isset($_SESSION["email"])){ ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="logout.php?logout='1'"><i class="fas fa-sign-out text-danger"></i> Deloghează-te</a></li><?php }?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    </header>
</body>
</html>