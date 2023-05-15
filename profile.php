<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
  	header('Location: index.php'); //Powrot do panelu logowania
	exit(); 
}
  ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
	<meta name="description" content="Twój Opis">
	<meta name="author" content="Twoje dane">
	<meta name="keywords" content="Twoje słowa kluczowe">
	<title>Biblioteka</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<link rel="stylesheet" type="text/css" href="stylHeader.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="twoj_js.js"></script> 
    
    <style>
        a > img {
            -webkit-filter:invert(100%);
            filter:progid:DXImageTransform.Microsoft.BasicImage(invert='1');
        }
        
        
        .container-profile {
            width: 615px;
            height: 700px;
            border: 3px solid black;
            border-radius: 7px;
            padding: 20px;
            background-color: #dddddd;
        }
        .div-header {
            width: 570px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            display: block;
        }
        .container-avatar {
            border: 7px solid black;
            border-radius: 50%;
            width: 130px;
            height: 130px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            margin: auto;
            margin-right: 60px;
            margin-top: 8px;
            float: right;
        }
        .container-avatar img {
            max-width: 118px;
            max-height: 118px;
            width: auto;
            height: auto;
            border-radius: 50%;
            display: flex;
            margin: auto;
        }
        .container-header {
            height: 130px;
            width: 370px;
            font-size: 24px;
            font-family: sans-serif;
            font-weight: bold;
            text-align: center;
            justify-content: center;
            align-items: center;
            float: left;
            margin: auto;
        }
        .container-header-header {
            width: 370px;
            font-size: 40px;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 16px;
        }
        .container-data {
            width: 570px;
            height: 600px;
            display: block;
            margin-top: 46px;
        }
        .container-data table {
            border-collapse: collapse;
            margin-left: 30px;
            margin-right: 30px;
        }
        .container-data td {
            width: 255px;
            height: 50px;
            font-family: sans-serif;
            border-bottom: 3px solid black;
            border-top: 3px solid black;
            border-radius: 7px;
            font-size: 20px;
            box-sizing: border-box;
            padding-top: 12px;
            padding-bottom: 12px;
        }
        .container-data td:nth-child(odd) {
            text-align: right;
            padding-right: 10px;
            font-weight: bold;
        }
        .container-data td:nth-child(even) {
            text-align: left;
            padding-left: 10px;
        }
        .button-edit, .button-logout {
            padding-top: 16px;
            padding-bottom: 16px;
            width: 220px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
            border: 3px solid black;
            border-radius: 7px;
            color: #fff;
            font-family: sans-serif;
            font-size: 20px;
            margin-top: 90px;
            font-weight: bold;
        }
        .button-edit {
            background-color: #2134cc;
            float: left;
            margin-left: 50px;
        }
        .button-logout {
            background-color: #bf0b0b;
            float: right;
            margin-right: 50px;
        }
        .button-edit:hover {
            transition: 0.1s;
            transform: scale(1.12);
            background-color: #384efc;
        }

        .button-logout:hover {
            transition: 0.1s;
            transform: scale(1.12);
            background-color: #ed2424;
        }
        .button-edit:active, .button-logout:active {
            transform: scale(0.98);
        }
        .hidden {
            display: none;
        }
        .visible {
            display: block;
        }
        input {
            width: 230px;
            height: 26px;
            font-size: 20px;
        }
        #fileInput {
            position: absolute;
            float: right;
            width: 200px;
            height: 20px;
            font-size: 10px;
            top: 235px;
            margin-left: 365px;
        }
    </style>
    <script>
        function toggleVisibility() {
            var elements = document.getElementsByClassName("toggle-element");
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                if (element.classList.contains("hidden")) {
                  element.classList.remove("hidden");
                  element.classList.add("visible");
                } else {
                  element.classList.remove("visible");
                  element.classList.add("hidden");
                }
            }
        }
        const jsEditButton = document.getElementById('jsEditButton');
        const jsUpdateButton = document.getElementById('jsUpdateButton');
        jsEditButton.addEventListener('click', () => {
            setTimeout(() => {
                jsUpdateButton.disabled = false;
            }, 1000);
        });
        function previewImage(event) {
            var fileInput = event.target;
            var imagePreview = document.getElementById('imagePreview');

            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    </script>
</head>

<body>
	 <div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav list-unstyled">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a href="#"><?php echo $_SESSION["user"]?></a>
          
         </div></div>
       
        <li><a href="index2.php"><img style="max-height:20px; padding-right:10px" src="media/panel.png">PANEL</a></li>
        <li><a href="profile.php"><img style="max-height:20px; padding-right:10px" src="media/user2.png">Profil</a></li>
        <li><a href="terms.php"><img style="max-height:20px; padding-right:10px" src="media/calendar.png">Terminy</a></li>
        <li><a href="grades.php"><img style="max-height:20px; padding-right:10px" src="media/score.png">Oceny</a></li>
        <li style="background-color:gray"><a href="stats.php" style="pointer-events: none"><img style="max-height:20px; padding-right:10px" src="media/bar-graph.png">Statystyki</a></li>
        <li><a href="subject.php"><img style="max-height:20px; padding-right:10px" src="media/reading-book.png">Przedmioty</a></li>
        <li><a href="plan.php"><img style="max-height:20px; padding-right:10px" src="media/calendar2.png">Plan zajęć</a></li>
        <li><a href="comments.php"><img style="max-height:20px; padding-right:10px" src="media/warning.png">Uwagi</a></li>
        <li><a href="contact.php"><img style="max-height:20px; padding-right:10px" src="media/mail.png">Kontakt</a></li>
      </ul>
  </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
       
                        

    <div class="container-profile">
        <div class="div-header">
            <div class="container-header">
                <div class="container-header-header">
                    Uczeń <!-- Miejsce na rolę osoby (uczen/nauczyciel/opiekun) -->
                </div>
                uczen@gmail.com <!-- Miejsce na nazwę osoby -->
            </div>
            <div class="container-avatar">
                <img id="imagePreview" src="media/user.png"/><!-- Miejsce na avatar osoby -->
            </div>
        </div>
        <div class="container-data">
            <form method="post" action="profile_edit.php">
                <input type="file" id="fileInput" class="toggle-element hidden" name="image" onchange="previewImage(event)">
              <?php
               $_SESSION["user_id"];
$dbhost = "localhost";
    $dbuser = "kosierap_ick";
    $dbpassword = "Ick321!";
    $dbname = "kosierap_ick";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
           mysqli_query($polaczenie, "SET NAMES 'utf8'");
    $rezultat = mysqli_query($polaczenie, "SELECT * from student
    join user on student.student_id = user.student_id
    where student.student_id=".$_SESSION["user_id"]."");
    echo "<table>";

    while ($wiersz = mysqli_fetch_array($rezultat)) {
      echo "
      
       <tr>
                        <td>Imię</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[1]</div>
                            <div class='toggle-element hidden'><input name='name' type='text' value='$wiersz[1]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nazwisko</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[2]</div>
                            <div class='toggle-element hidden'><input name='surname' type='text' value='$wiersz[2]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hasło</td>
                        <td>
                            <div class='toggle-element visible'>••••••••••••</div>
                            <div class='toggle-element hidden'><input name='password' type='password' value='$wiersz[15]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nr legitymacji</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[7]</div>
                            <div class='toggle-element hidden'><input name='idnumber' type='text' value='$wiersz[7]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Adres zamieszkania</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[8]</div>
                            <div class='toggle-element hidden'><input name='address1' type='text' value='$wiersz[8]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nr lokalu</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[9]</div>
                            <div class='toggle-element hidden'><input name='address2' type='text' value='$wiersz[9]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kod pocztowy</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[10]</div>
                            <div class='toggle-element hidden'><input name='code' type='text' value='$wiersz[10]'></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Miasto</td>
                        <td>
                            <div class='toggle-element visible'>$wiersz[11]</div>
                            <div class='toggle-element hidden'><input name='city' type='text' value='$wiersz[11]'></div>
                        </td>
                    </tr>
      
      
      
      
      
     
      ";
    
    }
    echo "</table>";
    mysqli_close($polaczenie);
              
              ?>

                <button id="jsUpdateButton" class="button-edit toggle-element hidden" type="submit">Aktualizuj profil</button>
                <!--form(profile-update.php): image, name, surname, password, idnumber, address1, address2, code, city-->
            </form>
                <button id="jsCancelButton" class="button-logout toggle-element hidden" onclick="window.location.href='profile.php'">Anuluj</button>
                <button id="jsEditButton" class="button-edit toggle-element visible" onclick="toggleVisibility();">Edytuj profil</button>
                <button id="jsLogoutButton" class="button-logout toggle-element visible" onclick="window.location.href='logout.php'">Wyloguj</button>
        </div>
    </div>
                      
                        
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
         
    </div>
    <!-- /#wrapper -->
    
    
   
    
</body>
</html>