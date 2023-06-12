
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
    $rezultat = mysqli_query($polaczenie, "SELECT distinct * from ebooks");
   
     
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
                            </div>
      
                            <div class='result-div-button' name='tt'>
                             
<button type='submit' id='ebook".$wiersz[0]."' class='result-div-button-reserv' onclick='ebook".$wiersz[0]."'>

      CZYTAJ</button>
                            </div>";
                                                               if($_SESSION["access"]!="user") echo "<form method='post' action='ebook_delete.php?delete=".$wiersz[0]."'><input type='submit' class='button-delete' value='Delete'></form>";

                      echo "    </div>

      
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