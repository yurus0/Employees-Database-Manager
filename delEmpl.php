<?php
if (isset($_GET["delete"])) {
  $code = $_GET["delete"];

  // Connect to the database
  $db = mysqli_connect("localhost","root","","GRH");
  // Delete the employee from the database
  $query = "DELETE FROM Employee WHERE code=$code";
  mysqli_query($db, $query);
  if($result){
    echo "Information modifiée avec succès!";
    // Redirect to the main page
    header("Location: allEmpls.php");
    exit();
  }
  else{
    echo "Erreur de modification!";
    // Redirect to the main page
    header("Location: allEmpls.php");
    exit();
  }
}
?>