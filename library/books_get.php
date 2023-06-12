
<html>
  <head>
  </head>
  <body>
    
<?php 
session_start();
     $_SESSION["user_id"];
$dbhost = "localhost";
    $dbuser = "kosierap_pai";
    $dbpassword = "Pai321";
    $dbname = "kosierap_pai";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    $rezultat = mysqli_query($polaczenie, "SELECT distinct * from books");
   
     
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      
      
      
      
      
      echo "
       <div class='result-block'>
                            <div class='result-div-img'>
                              <img src='".$wiersz[4]."' />
                            </div>
                            <div class='result-div-title'>
                              $wiersz[1]
                            </div>
                            <div class='result-div-author'>
                              $wiersz[2]
                            </div>";
     
      if($wiersz[3] == "Dostepne") echo " <div class='result-div-status dostepny'>";
         else if($wiersz[3] == "Wypozyczone") echo " <div class='result-div-status wypozyczony'>";
       
      else if($wiersz[3] == "Zarezerwowane") echo " <div class='result-div-status niedostepny'>";
       
        echo "                      $wiersz[3]
                            </div>
                            <div class='result-div-button'>
                              <form method='post' action='book_info.php?book=$wiersz[0]'>";
      if($wiersz[3] == "Dostepne") echo " <button type='submit' class='result-div-button-reserv'>";
         else if($wiersz[3] == "Wypozyczone") echo " <button type='submit' class='result-div-button-blocked'>";
      else if($wiersz[3] == "Zarezerwowane") echo " <button type='submit' class='result-div-button-powiadom'>";
      echo "SPRAWDŹ</button></form>

                         </div>";
                                                         if($_SESSION["access"]!="user") echo "<form method='post' action='book_delete.php?delete=".$wiersz[0]."'><input type='submit' class='button-delete' value='Delete'></form>";

                        echo "     </div>

      
      ";
     
       
        
      }
     
      
      
     
    
   
    mysqli_close($polaczenie);
?>
      </body>
</html>