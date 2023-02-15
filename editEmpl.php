<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
if (isset($_GET["update"])) {
    $code = $_GET["update"];
    // Connect to the database
    $db = mysqli_connect("localhost","root","","GRH");
    // Delete the employee from the database
    $query = "SELECT * FROM Employee WHERE code='$code';";
    $result=mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Employee</title>
        <style>
            body{
                border: 1px solid black;
                position: relative;
                padding: 10px;
                max-width: 400px;
                max-height: 600px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
            }
            form{
                margin-left: 40px;
                margin-right: auto;
            }
            #update{
                margin-left: 130px;
                margin-right: auto;
            }
            .image-icon {
                border: 1px gray solid;
                padding: 1px;
                position: absolute;
                bottom: 0;
                right: 0;
                margin-bottom: 2px;
                margin-right: 3px;
            }
            #disconnect{
                position: absolute;
                top: 0;
                right: 0;
                margin-top: 2px;
                margin-right: 3px;
            }
        </style>
    </head>
    <body>
        <center>
        <legend><b>Modifier les informations d'employé</b></legend> <br>
        <div id="errorMessage" style="color:red; font-size: smaller;">
                <?php
                    if(isset($_GET['error']) && $_GET['error'] == 'update_employee') {
                        echo "Échec de la mise à jour des informations. Veuillez réessayer.";
                    }
            ?></div>
        <div id="successMessage" style="color:green; font-size: smaller;">
            <?php
                if(isset($_GET['success']) && $_GET['success'] == 'updated_employee') {
                    echo "Mise à jour effectuée avec succès!";
                }
            ?>
            </div>
        </center>
        <form action="updateEmpl.php" method="post">
            <p><input type="hidden" name="code" id="code" value="<?php echo $row["code"]?>"/></p>
            <p><label>Nom: </label><input type="text" name="Nom" id="Nom" value="<?php echo $row["Nom"]?>"/></p>
            <p><label>Prenom: </label><input type="text" name="Prenom" id="Prenom" value="<?php echo $row["Prenom"]?>"/></p>
            <p><label>Sexe:</label><input type="radio" name="sexe" value="F" id="sexe"> <label>Feminin</label>
                <input type="radio" name="sexe" value="M" id="sexe"><label>Masculin</label>
            </p>
            <p><label>Adresse: </label><input type="text" name="adresse" id="adresse" value="<?php echo $row["adresse"]?>"/></p>
            <p><label>Date de naissance: </label><input type="date" name="dateNaissance" id="dateNaissance" value="<?php echo $row["dateNaissance"]?>"/></p>
            <p><label>Numero du service: </label><input type="text" name="numServ" id="numServ" value="<?php echo $row["numServ"]?>"/></p>
            <p><input type="submit" name="update" id="update" value="Update" onclick="return confirmUpdate();"/></p>
        </form>
        <a href="deconnexion.php"><img class="image-icon" id="disconnect" src="https://cdn-icons-png.flaticon.com/512/9572/9572685.png" height="20" width="20"></a>
    </body>
</html>
<script>
    function confirmUpdate() {
        if (confirm("Vous êtes sur le point de modifier les informations de cet employé. Voulez-vous continuer?")) {
            return true;
        }
        return false;
    }
</script>
