<?php include('database.php');?>
<!DOCTYPE html>
<head>
    <title>Postări</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="postari.css">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="postare">
    <?php
    $resedinta = $_SESSION['resedinta']; 
    if($stmt = $db->query("SELECT * FROM postari WHERE resedinta = '$resedinta'"))  {
        echo "<h2>Numărul de postări: ".$stmt->num_rows."<br></h2>";   
        if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif;
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
    else{
    echo "<section><h1>$row[titlu]</h1>"; if(isset($_SESSION['email']))
    if($functie == "admin general" || $functie == "admin" && $resedintaadmin == $_SESSION['resedinta']){
    echo "<div class='cdata'>";
    echo "<a href='delete.php?post_id=".$row['id_postare']."' class='button1'>Șterge postarea</a>";
    echo "<span class='id'>ID: $row[id_postare]</span></div>";}
    if($row['imagine_nume'] != ''){
    echo "<nav class='postnav'><img src=images/$row[imagine_nume] alt='$row[imagine_nume]'></nav>";}
    echo "<article><textarea class='descriere' readonly/>$row[descriere]</textarea><div class='cdata'><span>Categoria: $row[categorie]</span>";
    if(isset($_SESSION['email']))
    if($functie == "admin general" || $functie == "admin" && $resedintaadmin == $_SESSION['resedinta'] || $functie == "moderator" && $resedintamod == $_SESSION['resedinta']){
    echo "<a href='change-post.php?post_id_modif=".$row['id_postare']."' class='button4'>Modifică</a>";
    }
    echo "<span class='data_'>Data postării: $row[data]</span></div></article>";
    echo "</section>";
      }
    }
    }   
    if($stmt->num_rows == 0)
        echo "<h1>Nu sunt postări în reședință.</h1>";
    
   ?>
    </div>
</html>
</body>
</html>