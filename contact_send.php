<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  </HEAD>
<BODY>
<?php
  session_start();
$user = $_SESSION["user"];
$recipient = htmlentities ($_POST['email'], ENT_QUOTES, "UTF-8");
$message = htmlentities ($_POST['message'], ENT_QUOTES, "UTF-8");
  $topic = htmlentities ($_POST['topic'], ENT_QUOTES, "UTF-8");
 $dbuser = "kosierap_pai";
    $dbpassword = "Pai321";
    $dbname = "kosierap_pai";
    $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);


if(!$link) { echo"Error: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
mysqli_query($link, "SET NAMES 'utf8'");
  if($recipient == "") $recipient = "Pracownik";
     $sql = "INSERT INTO messages (sender, recipient,topic, message) VALUES ('$user', '$recipient', '$topic', '$message');"; //Komenda MySQL do dodawania uzytkownika
    if (mysqli_query($link, $sql)) {
     header ('Location: contact.php');
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($link); //Wyswietl blad z MySQL
}
 
 
?> </BODY> </html>