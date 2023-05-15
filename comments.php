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
        table {
            border-collapse: collapse;
            color: white !important;
            border: 2px solid white;
            width: 1200px;
            max-width: 1200px;
        }
        th {
            background-color: #1a1a1a !important;
            border-collapse: collapse;
            border: 2px solid white;
            font-size: 20px;
        }
        tr {
            border: 2px solid black;
            border-collapse: collapse;
            font-size: 16px;
        }
        tr:nth-child(odd) {
            background-color: #2f3441;
            color: white !important;
        }
        tr:nth-child(even) {
            background-color: #212531;
            color: white !important;
        }
        td {
            border: 2px solid white;
            border-collapse: collapse;
            color: white !important;
            font-size: 16px;
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
                    <div class="col-lg-8 col-lg-offset-2" id="subject">
       
                        
                        
                        
                        
                        <h1>Wczytuję dane...</h1>
                        
                        
                        
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
         <script>
           /*
 $(document).ready(function() {
			setInterval(function() {
				$.ajax({
					url: "comments_get.php",
					success: function(result) {
						$("#subject").html(result);
					}
				});
			}, 1000); // odświeżaj co sekundę
		});
 
      document.getElementById("volume-button").click();
      */
  </script>
         
    </div>
    <!-- /#wrapper -->
    
    
   
    
</body>
</html>