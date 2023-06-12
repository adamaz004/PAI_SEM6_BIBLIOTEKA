
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
    $rezultat = mysqli_query($polaczenie, "SELECT distinct * from books join rent on rent.books_id = books.books_id where rent.user_id=".$_SESSION["user_id"]);
   
     
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
      
 
         if($wiersz[9] == "Wypozyczone") echo " <div class='result-div-status dostepny'>";
      else if($wiersz[9] == "Zarezerwowane") echo " <div class='result-div-status niedostepny'>";
        echo "                      $wiersz[9]
                            </div>
                             <center>$wiersz[10]</center>
                          </div>

      
      ";
   
        echo "<script>
        document.getElementById('ebook".$wiersz[0]."').addEventListener('click', ebook".$wiersz[0].");
        
       function ebook".$wiersz[0]."() {
       window.open('pdf/sample.pdf', '_blank', 'fullscreen=yes');
   
       }
        
        </script>
        ";
        
      }
     
      
      
     
    
   
    mysqli_close($polaczenie);
?>
      </body>
</html>