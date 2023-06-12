<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  </HEAD>
<BODY>
<?php
session_start();
$name = htmlentities ($_POST['name'], ENT_QUOTES, "UTF-8"); 
$surname = htmlentities ($_POST['surname'], ENT_QUOTES, "UTF-8");
$password = htmlentities ($_POST['password'], ENT_QUOTES, "UTF-8");
  $idnumber = htmlentities ($_POST['idnumber'], ENT_QUOTES, "UTF-8");
  $address1 = htmlentities ($_POST['address1'], ENT_QUOTES, "UTF-8");
  $address2 = htmlentities ($_POST['address2'], ENT_QUOTES, "UTF-8");
  $code = htmlentities ($_POST['code'], ENT_QUOTES, "UTF-8");
  $city = htmlentities ($_POST['city'], ENT_QUOTES, "UTF-8");
    $t_number = htmlentities ($_POST['t_number'], ENT_QUOTES, "UTF-8");

  $student = $_SESSION["user_id"];
  
    $dbuser = "kosierap_pai";
    $dbpassword = "Pai321";
    $dbname = "kosierap_pai";
    $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if(!$link) { echo"Error: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
mysqli_query($link, "SET NAMES 'utf8'");
 
     $sql = "Update user set first_name = '$name' , last_name = '$surname' , library_id = '$idnumber', t_number = '$t_number' , address = '$address1'  , postal_code = '$code' , city = '$city' where id = '$student';"; //Komenda MySQL do dodawania uzytkownika
    if (mysqli_query($link, $sql)) {
       $sql2 = "Update user set password = '$password' where id = '$student';"; //Komenda MySQL do dodawania uzytkownika
       if (mysqli_query($link, $sql2)) {
      
	  header ('Location: profile.php');
       }
      else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($link); //Wyswietl blad z MySQL
      }
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($link); //Wyswietl blad z MySQL
}
 

?> </BODY> </html>