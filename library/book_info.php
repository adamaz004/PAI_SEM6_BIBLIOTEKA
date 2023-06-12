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
      .container-main {
            width: 615px;
            height: 700px;
            border: 3px solid black;
            border-radius: 7px;
            padding: 20px;
            background-color: #dddddd;
      }
      .div-header {
            width: 530px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            display: block;
        }
        .container-avatar {
            border: 2px solid black;
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            margin: auto;
            float: right;
          margin-right:30px;
        }
      	.container-avatar img {
            max-width: 143px;
            max-height: 143px;
            width: auto;
            height: auto;
            display: flex;
            margin: auto;
        }
      .container-header {
            height: 150px;
            width: 370px;
            font-size: 20px;
            font-family: sans-serif;
            font-weight: bold;
        	display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            float: left;
            margin: auto;
        }
        .container-header-header {
            width: 370px;
            font-size: 32px;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 16px;
        }
      	.container-header-header span {
          color: grey;
          font-size:28px;
          font-weight:500;
      }
      .container-description {
        float: left;
        text-align: center;
        width: calc(100% - 60px);
        height: 32px;
        font-weight: bold;
        border-bottom: 3px solid black;
        margin: 30px;
      }
      .description-description {
        width: 100%;
        height: 290px;
        max-height: 290px;
        overflow-y: scroll;
		margin-top:30px;
        margin-bottom:20px;
        font-weight:400;
      }
      .description-date {
        font-weight:400;
        border-top: 3px solid black;
        margin-top: 10px;
        padding-top: 20px;
      }
      .description-date span {
        font-weight:bold;
        margin-right: 20px;
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
            margin-top: 480px;
            margin-left: 180px;
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

<body onload="loadDefaultValues();">
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
				<?php
  
     $_SESSION["user_id"];
$dbhost = "localhost";
    $dbuser = "kosierap_pai";
    $dbpassword = "Pai321";
    $dbname = "kosierap_pai";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    $rezultat = mysqli_query($polaczenie, "SELECT * from books where books_id=".$_GET["book"]);
    while ($wiersz = mysqli_fetch_array($rezultat)) {
  ?>
                      
                      <div class="container-main">
                        
                        <div class="container-header">
                            <div class="container-header-header">
                                <?php echo $wiersz[1] ?>
                              <br><span> <?php echo $wiersz[2] ?></span>
                            </div>
                        </div>
                        <div class="container-avatar">
                            <?php echo "<img id='imagePreview' src='".$wiersz[4]."'/>"; ?>
                        </div>
                        
                        <div class="container-description">
                            Opis książki
                          <div class="description-description">
                            <?php echo $wiersz[5] ?>
                          </div>
                          <div class="description-date">
                    <br><span>Status: </span> <?php echo $wiersz[3] ?>
                          </div>
                        </div>
                                      <?php if($wiersz[3] != "Zarezerwowane") echo "<form method='post' action='rent_new.php?book=".$wiersz[0]."'><input type='submit' class='button-send' value='Zarezerwuj' /> </form>";
                        ?>   

                      </div>
                      
                      
                    </div>
                </div>
            </div>
        </div>
      <?php
      
     }

    mysqli_close($polaczenie);
           
      ?>
         
    </div>
    
    
   
    
</body>
  <script>
    function loadDefaultValues() {
      updateSecondSelect();
    }
  </script>
</html>