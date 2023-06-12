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
	<link rel="stylesheet" type="text/css" href="../stylHeader.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="../twoj_js.js"></script> 
  
  <script>
    
  </script>
    
    <style>
        a > img {
            -webkit-filter:invert(100%);
            filter:progid:DXImageTransform.Microsoft.BasicImage(invert='1');
        }
      .container-one {
        width: 360px;
        height: 600px;
        border: 3px solid black;
        border-radius: 7px;
        background-color: #dddddd;
        float: left;
        margin: 10px;
      }
      .headerino {
        text-align: center;
        border-bottom: 3px solid black;
        border-collapse: collapse;
        font-weight: bold;
        font-size: 24px;
        height: 60px;
        padding-top: 10px;
      }
      .book-block {
        height: calc(540px - 6px);
        width: calc(360px - 6px);
        overflow-y: scroll;
      }
      .zarez-block {
        background-color: white;
        border-bottom: 3px solid black;
      }
      .zarez-block table td {
        border-collapse: collapse;
      }
      .zarez-block table td:nth-child(1) {
        width: 280px;
        text-align: center;
        font-size: 14px;
        line-height: 1;
      }
      .button-wypo {
        border: none;
        height: inherit;
        color: white;
        background-color: #2134cc;
      }
      .button-wypo:hover{
        background-color: #384efc;
      }
      .button-anuluj {
        border: none;
        height: inherit;
        color: white;
        background-color: #bf0b0b;
      }
      .button-anuluj:hover {
        background-color: #ed2424;
      }
      .wypo-block {
        background-color: white;
        border-bottom: 3px solid black;
      }
      .wypo-block table td:nth-child(1) {
        width: 280px;
        text-align: center;
        font-size: 14px;
        line-height: 1;
      }
      .button-zakoncz {
        border: none;
        width: 80px;
        height: inherit;
        color: white;
        background-color: #bf0b0b;
      }
      .button-zakoncz:hover {
        background-color: #ed2424;
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
       
       <?php if($_SESSION["access"]!= "user") {
  echo "<li><a href='../index2_pracownik.php'><img style='max-height:20px; padding-right:10px' src='../media/panel.png'>PANEL</a></li>";
} else { 
  echo "<li><a href='../index2.php'><img style='max-height:20px; padding-right:10px' src='../media/panel.png'>PANEL</a></li>";
  }
       ?>
        <li><a href="../profile.php"><img style="max-height:20px; padding-right:10px" src="../media/user2.png">Profil</a></li>
              <?php if($_SESSION["access"]!= "user") {
  echo "<li><a href='../library/book_add.php'><img style='max-height:20px; padding-right:10px' src='../media/download.png'>Dodawanie</a></li>";
} else { 
  echo "<li><a href='../library/rent.php'><img style='max-height:20px; padding-right:10px' src='../media/download.png'>Wypożyczenia</a></li>";
  }
       ?>
        <li><a href="../library/books.php"><img style="max-height:20px; padding-right:10px" src="../media/bookshelf.png">Baza książek</a></li>
        <li><a href="../library/ebooks.php"><img style="max-height:20px; padding-right:10px" src="../media/ebook.png">Ebooki</a></li>
       <?php if($_SESSION["access"]!="user") echo '<li><a href="../library/actions.php"><img style="max-height:20px; padding-right:10px" src="../media/management.png">Zarządzanie</a></li>'; ?>
        <li><a href="../contact.php"><img style="max-height:20px; padding-right:10px" src="../media/mail.png">Kontakt</a></li>
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
                <div class="row" id="row">
                    <div class="col-lg-8 col-lg-offset-2">

                      
                      <div class="container-one">
                        <div class="headerino">
                          Zarezerwowane książki
                        </div> 
                          <div class='book-block' id='zarezerwowane'>
                        </div>
                      </div>
                      
                      <div class="container-one" >
                        <div class="headerino">
                          Wypożyczone książki
                        </div>
                        <div class='book-block' id='wypozyczone'>
                        
                      </div>
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
      
         
    </div>
    <script>
      $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "actions_get.php",
					success: function(result) {
						$("#wypozyczone").html(result);
					}
				});
			}, 1000); // odświeżaj co sekundę
		});
       $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "actions_get_add.php",
					success: function(result) {
						$("#zarezerwowane").html(result);
					}
				});
			}, 1000); // odświeżaj co sekundę
		});
  </script>
    
   
    
</body>
</html>