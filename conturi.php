<?php include('database.php') ?>
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
    <link rel="stylesheet" href="postari.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="conturi">
    <?php
    if($stmt = $db->query("SELECT * FROM users"))  {
      if($functie == "admin general")
        echo "<div class='alert alert-light mx-auto fs-5' role='alert' style='height: auto; padding: 0; margin: 0; margin-bottom: 10px; margin-top: 10px; max-width: 380px'><h2>Numărul de conturi: ".$stmt->num_rows."<br></h2></div>";
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
              <?php endif;}
        echo "<table class='table'>
            <tr>
            <th scope='col'>Id</th>
            <th scope='col'>Nume</th>
            <th scope='col'>Email</th>
            <th scope='col'>Funcție</th> 
            <th scope='col'>Reședință</th> 
            <th colspan='2'>Opțiuni</th>  
          </tr>";
        while ($row = $stmt->fetch_assoc()) {
        if($_SESSION['functie'] == "admin")
        if($row['resedinta'] == $_SESSION['resedinta']){
        echo "
          <tr>
            <td>$row[id]</td>
            <td>$row[nume] $row[prenume]</td>    
            <td>$row[email]</td>
            <td>$row[functie]</td>
            <td>$row[resedinta]</td> 
            <td><a href='change.php?email=".$row['email']."' class='button3'>Modifică</a></td>  
            <td><a href='delete.php?id=".$row['id']."' class='button2'>Șterge cont</a></td>
          </tr>";}
        if($_SESSION['functie'] == "admin general"){
            echo "
              <tr>
                <td>$row[id]</td>
                <td>$row[nume] $row[prenume]</td>    
                <td>$row[email]</td>
                <td>$row[functie]</td>
                <td>$row[resedinta]</td> 
                <td><a href='change.php?email=".$row['email']."' class='btn btn-outline-light fs-5'>Modifică</a></td>  
                <td><a href='delete.php?id=".$row['id']."' class='btn btn-danger fs-5'>Șterge cont</a></td>
              </tr>";}
        }
        echo "</table>";
        ?>
        </body>
        </html>
        