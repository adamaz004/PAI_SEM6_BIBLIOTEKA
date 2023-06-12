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

        .container-buttons {
            width: 570px;
            height: 440px;
            border: 3px solid black;
            border-radius: 7px;
            padding: 20px;
            background-color: #dddddd;
        }
        .divbutton {
            width: 240px;
            height: 110px;
            border: 5px solid black;
            border-radius: 7px;
            margin: 10px;
          float:left;
        }
        .divbutton:active {
            transform: scale(0.92);
        }
        .divbuttonhelper {
            width: 100%;
            height: 100%;
            background-color: white;
            cursor: pointer;
        }
        .divbuttonhelper:hover {
            transition: 0.1s;
            transform: scale(1.16);
            border-radius: 7px;
        }
        .divbuttonhelper a {
            width: 100%;
            height: 100%;
            display: block;
            text-decoration: none;
            color: black;
            line-height: normal;
        }
        .divbuttonhelper:hover {
            background-color: #dedace;
            transition: 0.1s;
            -webkit-filter:invert(100%);
            filter:progid:DXImageTransform.Microsoft.BasicImage(invert='1');
        }
        .divimg {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            float: left;
        }
        .divimg img {
            width: 80px;
            height: 80px;
        }
        .divtext {
            width: 130px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            float: left;
            padding-right: 10px;
        }
        .divtexttext {
            text-align: center;
            font-size: 12px;
            font-family: sans-serif;
        }
        .divtexttextheader {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 4px;
            font-family: sans-serif;
        }
        a > img {
            -webkit-filter:invert(100%);
            filter:progid:DXImageTransform.Microsoft.BasicImage(invert='1');
        }
      @media (max-width: 767px) {
        .container-buttons {
          
          width: 315px;
          height: 830px;
          position: absolute;
          top: 20px;
          left: 40px;
        }
      }
    </style>
    
</head>

<body>
	 <div id="wrapper" class="someclass">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav list-unstyled">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a href="#"><?php echo $_SESSION["user"]?></a>
          
         </div></div>
       
       <?php if($_SESSION["access"]!= "user") {
  echo "<li><a href='index2_pracownik.php'><img style='max-height:20px; padding-right:10px' src='media/panel.png'>PANEL</a></li>";
} else { 
  echo "<li><a href='index2.php'><img style='max-height:20px; padding-right:10px' src='media/panel.png'>PANEL</a></li>";
  }
       ?>
        <li><a href="profile.php"><img style="max-height:20px; padding-right:10px" src="media/user2.png">Profil</a></li>
              <?php if($_SESSION["access"]!= "user") {
  echo "<li><a href='library/book_add.php'><img style='max-height:20px; padding-right:10px' src='media/download.png'>Dodawanie</a></li>";
} else { 
  echo "<li><a href='library/rent.php'><img style='max-height:20px; padding-right:10px' src='media/download.png'>Wypożyczenia</a></li>";
  }
       ?>
        <li><a href="library/books.php"><img style="max-height:20px; padding-right:10px" src="media/bookshelf.png">Baza książek</a></li>
        <li><a href="library/ebooks.php"><img style="max-height:20px; padding-right:10px" src="media/ebook.png">Ebooki</a></li>
       <?php if($_SESSION["access"]!="user") echo '<li><a href="library/actions.php"><img style="max-height:20px; padding-right:10px" src="media/management.png">Zarządzanie</a></li>'; ?>
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
       
                        
    <div class="container-buttons">
       
                    <div class="divbutton">
                        <div class="divbuttonhelper">
                            <a href="profile.php"><!--Miejsce na przekierowanie-->
                                <div class="divimg">
                                    <img src="media/user.png"/>
                                </div>
                                <div class="divtext">
                                    <div class="divtexttext">
                                        <div class="divtexttextheader">
                                            Profil
                                        </div>
                                        Dostosuj swoje ustawienia konta użytkownika
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                  <div class="divbutton" >
                        <div class="divbuttonhelper">
                            <a href="library/book_add.php"><!--Miejsce na przekierowanie-->
                                <div class="divimg">
                                    <img src="media/download.png"/>
                                </div>
                                <div class="divtext">
                                    <div class="divtexttext" >
                                        <div class="divtexttextheader" >
                                           Dodawanie
                                        </div>
                                        Dodaj nową książkę lub ebook
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                
                    <div class="divbutton">
                        <div class="divbuttonhelper">
                            <a href="library/books.php"><!--Miejsce na przekierowanie-->
                                <div class="divimg">
                                    <img src="media/bookshelf.png"/>
                                </div>
                                <div class="divtext">
                                    <div class="divtexttext">
                                        <div class="divtexttextheader">
                                            Baza książek
                                        </div>
                                        Sprawdź książki<br>w posiadaniu bibilioteki
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                  <div class="divbutton">
                        <div class="divbuttonhelper">
                            <a href="library/ebooks.php"><!--Miejsce na przekierowanie-->
                                <div class="divimg">
                                    <img src="media/ebook.png"/>
                                </div>
                                <div class="divtext">
                                    <div class="divtexttext">
                                        <div class="divtexttextheader">
                                            Ebooki
                                        </div>
                                        Sprawdź bazę ebooków
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                           
                    <div class="divbutton">
                        <div class="divbuttonhelper">
                            <a href="library/actions.php"><!--Miejsce na przekierowanie-->
                                <div class="divimg">
                                    <img src="media/management.png"/>
                                </div>
                                <div class="divtext">
                                    <div class="divtexttext">
                                        <div class="divtexttextheader">
                                            Zarządzanie
                                        </div>
                                        Zarządzaj książkami<br>i ebookami
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                
                    <div class="divbutton">
                        <div class="divbuttonhelper">
                            <a href="contact.php"><!--Miejsce na przekierowanie-->
                                <div class="divimg">
                                    <img src="media/mail.png"/>
                                </div>
                                <div class="divtext">
                                    <div class="divtexttext">
                                        <div class="divtexttextheader">
                                            Kontakt
                                        </div>
                                        Wysyłaj korespondencję
                                    </div>
                                </div>
                            </a>
                        </div>
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