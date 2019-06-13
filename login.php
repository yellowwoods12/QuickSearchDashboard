<!DOCTYPE HTML>
<html>
<body>
<?php 
 include_once("DBConnection.php"); 
 session_start(); //always start a session in the beginning 

 $msg="";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: distribution/tables.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
 if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) //Validating inputs using PHP code 
 { 
    $msg= "Incorrect username or password"; 
    header("location: index.php");//You will be sent to Login.php for re-login 
 } 
 
 $inUsername = trim($_POST["username"]); // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
 $inPassword = trim($_POST["password"]); 

 $sql="SELECT username,password FROM `maalik` where username= '".$inUsername."'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_NUM);
var_dump($db);
var_dump($sql);
var_dump($result);
var_dump($row);
if($inUsername == $row[0] && $inPassword == $row[1])
{
    $_SESSION['username']=$inUsername;
    $_SESSION['loggedin']=true;
 echo "logged in"; //Storing the username value in session variable so that it can be retrieved on other pages
 header("location: distribution/tables.php");
}
 /*$stmt= $db->prepare("SELECT USERNAME, PASSWORD FROM PROFILE WHERE USERNAME = ?"); //Fetching all the records with input credentials
 $stmt->bind_param("s", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "s" indicates the type of the parameter.
 $stmt->execute();
 $stmt->bind_result($UsernameDB, $PasswordDB); // Binding i.e. mapping database results to new variables
   echo $UsernameDB." ".$PasswordDB;
 //Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
 if ($stmt->fetch() && password_verify($inPassword, $PasswordDB)) 
 {
 $_SESSION['username']=$inUsername;
 echo "logged in"; //Storing the username value in session variable so that it can be retrieved on other pages
 header("location: Dashboard.php"); */

 
 else
 {
    echo "Incorrect username or password"; 
    
   ?>
 
   <a href="index.php">Login</a>
       <?php 
 } 
 } 
       ?>
 </body> 
 </html>