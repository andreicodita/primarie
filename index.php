<!DOCTYPE html>
<head>
    <title>Primarie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="postari2.css">
</head>
<body>
    <?php include('header.php'); ?>
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <div class="slide first">
                    <?php if(isset($_SESSION['resedinta']))
                    $imgpath = "img-site/" .$_SESSION['resedinta'].".jpg";
                    echo "<img src='$imgpath' alt='$_SESSION[resedinta]'>" ?>
                </div>
                <div class="slide">
                <?php if(isset($_SESSION['resedinta']))
                    $imgpath = "img-site/" .$_SESSION['resedinta']."2.jpg";
                    echo "<img src='$imgpath' alt='$_SESSION[resedinta]'>" ?>
                </div>
                <div class="slide">
                <?php if(isset($_SESSION['resedinta']))
                    $imgpath = "img-site/" .$_SESSION['resedinta']."3.jpg";
                    echo "<img src='$imgpath' alt='$_SESSION[resedinta]'>" ?>
                </div>
                <div class="slide">
                <?php if(isset($_SESSION['resedinta']))
                    $imgpath = "img-site/" .$_SESSION['resedinta']."4.jpg";
                    echo "<img src='$imgpath' alt='$_SESSION[resedinta]'>" ?>
                </div>
            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
        <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;            
            if(counter > 4){
                counter = 1;
            }
        }, 5000);
    </script>
    <div class="under">
    <div class="primar">
        <?php if(isset($_SESSION['resedinta']))
                {
                    $resedinta = $_SESSION['resedinta'];
                    $imgpath = "img-site/Primar".$_SESSION['resedinta'].".png";
                    $query = "SELECT * FROM resedinte WHERE resedinta_nume = '$resedinta'";
                    $result = mysqli_query($db, $query);
                    $row = $result->fetch_assoc();
                }
        echo "<img class='imgprimar' src='$imgpath' alt='Primar'>";
        echo "<p>$row[primar]</p>"?>
    </div>
    <div class="postare">
    <?php
    $resedinta = $_SESSION['resedinta']; 
    if($stmt = $db->query("SELECT * FROM postari WHERE resedinta = '$resedinta' LIMIT 1"))  {
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
    }}}?>
    </div>
    </div>
</body>
</html>