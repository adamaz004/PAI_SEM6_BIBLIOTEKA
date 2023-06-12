
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
    $rezultat = mysqli_query($polaczenie, "SELECT distinct * from rent join books on rent.books_id = books.books_id join user on rent.user_id = user.id where rent.status = 'Zarezerwowane'");
   
     
    while ($wiersz = mysqli_fetch_array($rezultat)) {
    
      
      echo "
    
                          <div class='zarez-block'>
                            <table>
                              
                              
                              
                              <tr>
                                <td>
                                  $wiersz[6] - $wiersz[12]
                                </td>
                                <td>
                                  <form method='post' action='rent_rent.php?rent=".$wiersz[1]."'><input class='button-wypo' type='submit' value='Wypożycz' /> </form>
                                </td>
                                <td>
                                  <form method='post' action='rent_delete.php?delete=".$wiersz[1]."'><input class='button-zakoncz' type='submit' value='Zakończ' /> </form>
                                </td>
                              </tr>
                                
                              
                                
                            </table>
                          </div>
                      
      
      
      
      
      
      
        ";
        
      }
     
      
      
     
    
   
    mysqli_close($polaczenie);
?>
      </body>
</html>