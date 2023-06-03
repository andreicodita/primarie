<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'primarie');
if(isset($_GET['post_id'])){
    $id_post = $_GET['post_id'];
    $query = "SELECT imagine_nume FROM postari WHERE id_postare = $id_post";
    $result = mysqli_query($db, $query); 
    $row = mysqli_fetch_assoc($result);  
    $query = "DELETE FROM postari WHERE id_postare = $id_post";
    $db->query($query);
    $imgpath="images/".$row['imagine_nume'];
    unlink($imgpath);
    header('location: postari.php');
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    $db->query($query);
    if($db->query($query)){
        $_SESSION['success'] = "Contul a fost șters!";
        header('location: conturi.php');}
}

if(isset($_POST['post_id_mod'])){
    
    $id_post = $_SESSION['id_post'];
    $titlu = mysqli_real_escape_string($db, $_POST['titlu']);
    if($titlu == '')
        $titlu = $_SESSION['titlu'];
    $descriere = mysqli_real_escape_string($db, $_POST['descriere']);
    if($descriere == '')
        $descriere = $_SESSION['descrierepost'];
    $resedinta = mysqli_real_escape_string($db, $_POST['resedinta']);
    if($resedinta == '')
        $resedinta = $_SESSION['resedintapost'];
    $categorie = mysqli_real_escape_string($db, $_POST['categorie']);
    $update = "UPDATE postari SET titlu='$titlu', descriere='$descriere', categorie='$categorie', resedinta='$resedinta' WHERE id_postare = $id_post";
    $db->query($update);
    if($db->query($update)){
            $_SESSION['success'] = "Postarea a fost modificată!";
            header('location: postari.php');
            header("Refresh:0");}  
}


if(isset($_POST['modif_user'])){
    $id = $_SESSION['id'];
    $nume = $_POST['nume'];
    if($nume == '')
        $nume = $_SESSION['numeuser'];
    $prenume = mysqli_real_escape_string($db, $_POST['prenume']);
    if($prenume == '')
        $prenume = $_SESSION['prenumeuser'];
    $email = mysqli_real_escape_string($db, $_POST['email']);
    if($email == '')
        $email = $_SESSION['emailuser'];
    $functie = mysqli_real_escape_string($db, $_POST['functie']);
    if($functie == '')
        $functie = $_SESSION['functieuser'];
    $resedinta = mysqli_real_escape_string($db, $_POST['resedinta']);
    if($resedinta == '')
        $resedinta = $_SESSION['resedintauser'];
    $update = "UPDATE users SET nume='$nume', prenume='$prenume', email='$email', resedinta='$resedinta', functie='$functie' WHERE id = $id";
    $db->query($update);
    if($db->query($update)){
        $_SESSION['success'] = "Contul a fost modificat!";
        header('location: conturi.php');}}
?>  