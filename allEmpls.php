<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
$db = mysqli_connect("localhost","root","","GRH");
?>
<head>
<script>
    function confirmDelete(){
        if (confirm("Vous êtes sur le point de supprimer les informations de cet employé. Voulez-vous continuer?")) {
            return true;
        }
        return false;
    }
</script>
<style>
    body{
        border: 1px solid black;
        max-width: 600px;
        max-height: 900px;
        position: relative;
        padding: 10px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 100px;
        margin-top: 20px;
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
<?php
    $query="SELECT * FROM Employee";
    $result=mysqli_query($db, $query);
?>
<title>All Employees</title>
</head>
<body>
    <center>
    <legend><b>All the employees</b></legend> <br>
    <table border=1 >
    <div id="successMessage" style="color:green; font-size: smaller;">
            <?php
                if(isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "Employé ajouté avec succès!";
                }
            ?>
            </div>
    <?php 
    if(mysqli_num_rows($result)>0){
        ?>
        <td><?php echo "code" ?> </td>
                <td style="text-align:center;"><?php echo "Nom" ?></td>
                <td style="text-align:center;"><?php echo "Prenom" ?></td>
                <td style="text-align:center;"><?php echo "sexe" ?></td>
                <td style="text-align:center;"><?php echo "adresse" ?></td>
                <td style="text-align:center;"><?php echo "dateNaissance" ?></td>
                <td style="text-align:center;"><?php echo "numServ" ?></td>
                <td style="text-align:center;"><?php echo "Delete" ?></td>
                <td style="text-align:center;"><?php echo "Edit" ?></td>
        <?php
        while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td style="text-align:center;"> <?php echo $row["code"] ?> </td>
                <td style="text-align:center;"> <?php echo $row["Nom"] ?> </td>
                <td style="text-align:center;"> <?php echo $row["Prenom"] ?> </td>
                <td style="text-align:center;"> <?php echo $row["sexe"] ?> </td>
                <td style="text-align:center;"> <?php echo $row["adresse"] ?> </td>
                <td style="text-align:center;"> <?php echo $row["dateNaissance"] ?> </td>
                <td style="text-align:center;"> <?php echo $row["numServ"] ?> </td>
                <td style="text-align:center;"> <a href="delEmpl.php?delete=<?php echo $row["code"]; ?>"  onclick= "return confirmDelete();">
          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828665.png" alt="delete" width="15" height="15">
        </a>
      </td>
      <td style="text-align:center;"> <a href="editEmpl.php?update=<?php echo $row["code"]; ?>">
          <img src="https://cdn-icons-png.flaticon.com/512/2919/2919592.png" alt="edit" width="15" height="15">
        </a>
      </td>
            </tr>
        <?php
        }
        ?>
    <?php
    }
    ?>
    </table>
    </center>
    <br>
    <a href="formAddEmpl.php"><img class="image-icon" src="https://cdn-icons-png.flaticon.com/512/1828/1828819.png" height="20" width="20"></a>
<a href="deconnexion.php"><img class="image-icon" id="disconnect" src="https://cdn-icons-png.flaticon.com/512/9572/9572685.png" height="20" width="20"></a>
</body>

