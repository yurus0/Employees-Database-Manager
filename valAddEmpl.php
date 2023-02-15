<?php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$db = mysqli_connect("localhost","root","","GRH");
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$sexe=$_POST['sexe'];
$adresse=$_POST['adresse'];
$dateNaissance=$_POST['dateNaissance'];
$numServ=$_POST['numServ'];
$login=$_POST['login'];
if($_POST['password1'] !== $_POST['password2']){
    header("Location: formAddEmpl.php?error=unmatched_passwords");
    exit();
}
$password=$_POST['password1'];

$query="INSERT INTO Users (numUser, login, password, type) VALUES (0, '$login', '$password', 'US');";
$result = mysqli_query($db, $query);
$ans=mysqli_fetch_array(mysqli_query($db, "SELECT numUser FROM Users WHERE login='$login';"));
$numUser=$ans['numUser'];
$query2="INSERT INTO Employee (code, Nom, Prenom, sexe, adresse, dateNaissance, numServ, numUser) VALUES (0,'$Nom', '$Prenom', '$sexe', '$adresse', '$dateNaissance', '$numServ', '$numUser');";
$result2 = mysqli_query($db, $query2);
if($result && $result2){
    header("Location: login.php?success=added_employee");
    exit();
}
?>
