
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
    if($_SESSION["access"] != "user") $rezultat = mysqli_query($polaczenie, "SELECT date, recipient, sender, topic, message, messages_id FROM messages where recipient='".$_SESSION["user"]."' or recipient='Pracownik'");
   else $rezultat = mysqli_query($polaczenie, "SELECT date, recipient, sender, topic, message, messages_id FROM messages where recipient='".$_SESSION["user"]."'");
   
    while ($wiersz = mysqli_fetch_array($rezultat)) {
      echo"
      
       <div class='answer' id='answer'>
                            <div class='answer-data'>
                              <div class='answer-data-from'>
                                <wyruznienie>Od: </wyruznienie>
                                $wiersz[2]
                              </div>
                              <div class='answer-data-time'>
                                <wyruznienie>Data: </wyruznienie>
                                $wiersz[0]
                              </div>
                              <div class='answer-data-topic'>
                                <wyruznienie>Temat: </wyruznienie>
                               $wiersz[3]
                              </div>
                            </div>
                            <div class='answer-buttons'>
                              <div class='answer-buttons-middler'>
                                <div class='answer-buttons-middler-halfer'>
                                   <form method='post' action='contact_check.php?contact=$wiersz[5]'><button class='button-zobacz' type='submit'>Zobacz</button></form>
                                </div>
                                <div class='answer-buttons-middler-halfer'>
                                   <form method='post' action='contact_delete.php?contact=$wiersz[5]'><button class='button-usun' type='submit'>Usuń</button></form>
                                </div>
                               </div>
                            </div>
                          </div>
                          <!-- tutaj się kończy rekurencyjne przedstawienie -->
                      </div>
                      
                      
                    </div>
      
      ";
    }
   
    mysqli_close($polaczenie);
?>
      </body>
</html>