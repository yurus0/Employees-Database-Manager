<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$db=mysqli_connect("localhost","root","","GRH");
$login1=$_POST['login'];
$password1=$_POST['password'];
//echo $login1." ".$password1;
$login=mysqli_real_escape_string($db,$login1);
$password=mysqli_real_escape_string($db,$password1);
//echo "<br>".$login." ".$password;
$query="SELECT * FROM Users WHERE login='$login' AND password='$password';";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_array($result);
//echo $row['type']." ".($row['type'] === 'AD');
/*echo "<br>".$row['login']." ".$row['password']." ".$row['type'];
$query2= "SELECT code FROM Employee WHERE numUser=(SELECT numUser FROM Users WHERE login='$login');";
$result2=mysqli_query($db,$query2);
$row2=mysqli_fetch_array($result2);
echo "<br>".$row2['code'];
echo "<br>".mysqli_num_rows($result);*/
if(mysqli_num_rows($result)==1){
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $login1;
    if ($row['type'] === "AD") {
        header("Location: allEmpls.php?user_type=AD");
        exit();
    }
    else if($row['type'] === "US"){
        $query2= "SELECT code FROM Employee WHERE numUser=(SELECT numUser FROM Users WHERE login='$login');";
        $result2=mysqli_query($db,$query2);
        $row2=mysqli_fetch_array($result2);
        header("Location: editEmpl.php?update=".$row2["code"]."&user_type=US");
        exit();
    }
}
else{
    header("Location: login.php?error=incorrect_login");
    exit();
}
?>