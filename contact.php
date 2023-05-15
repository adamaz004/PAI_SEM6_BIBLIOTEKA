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
        .container-contact {
            width: 570px;
            height: 590px;
            border: 3px solid black;
            border-radius: 7px;
            border-collapse: collapse;
            background-color: #dddddd;
        }
        .div-header {
            width: 565px;
            height: 140px;
            display: flex;
            justify-content: center;
            align-items: center;
            display: block;
            border-collapse: collapse;
            padding-bottom: 16px;
            border-bottom: 3px solid black;
        }
        .container-header {
            height: 130px;
            width: 570px;
            font-size: 24px;
            font-family: sans-serif;
            font-weight: bold;
            text-align: center;
            justify-content: center;
            align-items: center;
            float: left;
            margin: auto;
            border-collapse: collapse;
        }
        .container-header-header {
            width: 570px;
            font-size: 40px;
            text-align: center;
            margin-top: 20px;
        }
        .container-data {
            width: 570px;
            height: 590px;
            display: block;
            border-collapse: collapse;
        }
        .div-contact-do {
            border-collapse: collapse;
            font-family: sans-serif;
            width: 100%;
            height: 24px;
            font-size: 20px;
            margin-top: 5px;
            padding-bottom: 10px;
            padding-left: 10px;
        }
        .div-contact-do input {
            width: 340px;
            height: 24px;
            margin-left: 10px;
            font-size: 20px;
        }
        #message {
            position: absolute;
            margin: 5px;
            width: 554px;
            height: 395px;
            margin-top: 16px;
            text-align: left !important;
            vertical-align: top !important;
            overflow: hidden !important;
            resize: none !important;
            white-space: pre-wrap !important;
            overflow-wrap: break-word !important;
        }
        .button-send{
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
            margin-top: 450px;
            margin-left: 175px;
            font-weight: bold;
            background-color: #12b32d;
        }
        .button-send:hover {
            background-color: #27d644;
            transition: 0.1s;
            transform: scale(1.12);
        }
        .button-send:active {
            transform: scale(0.98);
        }
    </style>
    
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
       
                        
                        
                        
    <div class="container-contact">
        <div class="div-header">
            <div class="container-header">
                <div class="container-header-header">
                    Kontakt
                </div>
                uczen@gmail.com <!-- Miejsce na nazwę osoby -->
            </div>
        </div>
        <div class="container-data">
            <form method="post" action="contact_send.php">
                <div class="div-contact-do">
                    Wyślij wiadomość do: <input type="email" id="" name="email">
                </div>
                <textarea id="message" type="text" name="message"></textarea>
                <button class="button-send" type="submit">Wyślij</button>
            </form>
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