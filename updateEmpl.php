<?php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
$db = mysqli_connect("localhost","root","","GRH");
$code=$_POST['code'];
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$sexe=$_POST['sexe'];
$adresse=$_POST['adresse'];
$dateNaissance=$_POST['dateNaissance'];
$numServ=$_POST['numServ'];
$user_type=$_GET['user_type'];
if(isset($_POST['update'])) {
    $query="UPDATE Employee SET Nom='$Nom', Prenom='$Prenom', sexe='$sexe', adresse='$adresse', dateNaissance='$dateNaissance', numServ='$numServ' WHERE code='$code';";
    $result = mysqli_query($db, $query);
    if($user_type==='AD'){
        if($result){
            header("Location: allEmpls.php?success=updated_employee");
            exit();
        }
        else{
            header("Location: allEmpls.php?error=update_employee");
            exit();
        }
    }
    else{
        if($result){
            header("Location: editEmpl.php?update=".$code."&user_type=US&success=updated_employee");
            exit();
        }
        else{
            header("Location: editEmpl.php?update=".$code."&user_type=US&error=update_employee");
            exit();
        }
    }
}
?>
