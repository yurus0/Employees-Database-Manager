<!DOCTYPE html>
<html>
<head>
    <title>Authentification</title>
    <style>
        body{
            border: 1px solid black;
            position: relative;
            padding: 10px;
            max-width: 400px;
            min-height: 150px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 250px;
        }
        label{
            margin-left: auto;
            margin-right: auto;
        }
        table{
            margin-left: auto;
            margin-right: auto;
            min-width: 200px;
        }
    </style>
</head>
<body>
    <center>
    <h1>Authentification</h1>
    </center>
    <form action="verif.php" method="POST">
        <table>
        <tr>
        <td><label>Login</label></td>
        <td style="text-align: center;"> <input type="text" name="login" id="login"/></td>
        </tr>
        <tr>
        <td><label>Password</label></td>
        <td style="text-align: center;"> <input type="password" name="password" id="password"/></td>
        </tr>
        </table>
        <center>
        <div id="errorMessage" style="color:red; font-size: smaller;">
        <?php
            if(isset($_GET['error']) && $_GET['error'] == 'incorrect_login') {
                echo "Login ou mot de passe incorrect. Veuillez réessayer.";
            }
        ?></div>
        <div id="successMessage" style="color:green; font-size: smaller;">
        <?php
            if(isset($_GET['success']) && $_GET['success'] == 'added_employee') {
                echo "Votre compte a été créé avec succès. Vous pouvez vous connecter maintenant.";
            }
        ?></div>
        <p><br><input type="submit" name="submit" id="submit" value="Se connecter" /> <br>
        <a id="create" style="font-size: smaller;" href="formAddEmpl.php">Créer un compte?</a></p>
        </center>
    </form>
</body>
</html>