<?php include('database.php') ?>
<!DOCTYPE html>
<head>
    <title>Postări</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="postari.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="conturi">
    <?php
    if($stmt = $db->query("SELECT * FROM users"))  {
      if($functie == "admin general")
        echo "<h1>Numărul de conturi: ".$stmt->num_rows."<br></h1>";
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
        echo "<table>
            <tr>
            <th>Id</th>
            <th>Nume</th>
            <th>Email</th>
            <th>Funcție</th> 
            <th>Reședință</th> 
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
                <td><a href='change.php?email=".$row['email']."' class='button3'>Modifică</a></td>  
                <td><a href='delete.php?id=".$row['id']."' class='button2'>Șterge cont</a></td>
              </tr>";}
        }
        echo "</table>";
        ?>
        </body>
        </html>
        