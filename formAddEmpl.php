<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un employe</title>
        <style>
            body{
                border: 1px solid black;
                position: relative;
                padding: 10px;
                max-width: 500px;
                min-height: 200px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 200px;
            }
            form{
                margin-left: auto;
                margin-right: auto;
            }
            table{
                margin-left: 50px;
                margin-right: 50px;
            }
        </style>
    </head>
    <body>
        <center>
        <legend><b>Formulaire d'ajout d'employé</b></legend> <br>
        <form action="valAddEmpl.php" method="post">
            <div id="errorMessage" style="color:red; font-size: smaller;">
                <?php
                    if(isset($_GET['error']) && $_GET['error'] == 'umatched_passwords') {
                        echo "Les mots de passe ne correspondent pas. Veuillez réessayer.";
                    }
            ?></div>
            <table>
                <tr> 
                <td> <label>Login: </label> </td>
                <td><input type="text" name="login" id="login"/></td>
                </tr>
                <tr> 
            <td><label>Nom: </label></td>
            <td><input type="text" name="Nom" id="Nom"/></td>
                <tr> 
            <td><label>Prenom: </label></td>
            <td><input type="text" name="Prenom" id="Prenom"/></td>
                <tr> 
            <td><label>Sexe:</label></td>
            <td><input type="radio" name="sexe" value="F" id="sexe"> <label>Feminin</label>
                <input type="radio" name="sexe" value="M" id="sexe"><label>Masculin</label>
                </td>
                <tr> 
            <td><label>Adresse: </label></td>
            <td><input type="text" name="adresse" id="adresse"/></td>
                <tr> 
            <td><label>Date de naissance: </label></td>
            <td><input type="date" name="dateNaissance" id="dateNaissance"/></td>
                <tr> 
            <td><label>Mot de passe: </label></td>
            <td><input type="password" name="password1" id="password2"/></td>
                <tr> 
            <td><label>Confirmer le mot de passe: </label></td><td><input type="password" name="password2" id="password2"/></td>
                <tr> 
            <td><label>Numero du service: </label></td><td><input type="text" name="numServ" id="numServ"/></td>
                </tr> 
            </table>
            <p><input type="submit" name="Envoyer" id="Envoyer" value="Envoyer"/></p>
            </center>
        </form>
    </body>
</html>