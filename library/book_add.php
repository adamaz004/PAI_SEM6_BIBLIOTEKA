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
    function previewImage2(event) {
            var fileInput = event.target;
            var imagePreview = document.getElementById('imagePreview2');

            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
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
    function formNbook() {
      var nbook = document.querySelector('.nbook');
      var ebook = document.querySelector('.ebook');
      ebook.style.display = 'none';
      nbook.style.display = 'block';
    }
    function formEbook() {
      var nbook = document.querySelector('.nbook');
      var ebook = document.querySelector('.ebook');
      nbook.style.display = 'none';
      ebook.style.display = 'block';
    }
  </script>
    
    <style>
        a > img {
            -webkit-filter:invert(100%);
            filter:progid:DXImageTransform.Microsoft.BasicImage(invert='1');
        }
      .container-buttons {
        width: 615px;
        margin-bottom: 10px;
        display: flex;
      }
      .button-normal-book {
        width: 300px;
        margin:5px;
      }
      .button-ebook {
        width: 300px;
        margin:5px;
      }
      .nbook {
        display: none;
      }
      .ebook {
        display: none;
      }
      .container-main {
            width: 615px;
            height: 675px;
            border: 3px solid black;
            border-radius: 7px;
            padding: 20px;
            background-color: #dddddd;
      }
      .header {
        width:100%;
        height 60px;
        text-align: center;
        justify-content: center;
        display:flex;
        border-bottom: 3px solid black;
        margin-bottom: 10px;
      }
      .header-header {
        width:calc(100%-40px);
        font-size: 24px;
        font-weight: bold;
         margin-bottom: 10px;
      }
      .container-main-image {
        width: 150px;
        height: 150px;
        border: 2px solid black;
        background-color: white;
        justify-content: center;
        display: flex;
      }
      .container-main-image img {
        	max-width: 143px;
            max-height: 143px;
            width: auto;
            height: auto;
            display: flex;
            margin: auto;
      }
      .tabelka {
        width: 100%;
      }
      .tabelka td {
        border-collapse: collapse;
        border-bottom: 3px solid black;
        padding-bottom: 10px;
        padding-top: 10px;
      }
      .tabelka td:nth-child(1) {
        text-align: right;
        padding-right: 15px;
      }
      .tabelka td:nth-child(2) {
        
      }
      .tabelka input {
        width: 300px;
      }
      .tabelka textarea {
        width: 300px;
        height: 150px;
      }
      .button-send{
        position: absolute !important;
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
            top: 820px;
            left: 240px;
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

                      <div class="container-buttons">
                        <button class="button-normal-book" type="button" onclick="formNbook();">Dodaj książkę</button>
                        <button class="button-ebook" type="button" onclick="formEbook();">Dodaj ebooka</button>
                      </div>
                      
                      <div class="container-main nbook">
                        
                        <form method="post" action="book_add_nbook.php" enctype="multipart/form-data"> <!-- nazwy: title, author, image, description -->
                          
                        <div class="header">
                          <div class="header-header">
                            Dodaj książkę
                          </div>
                        </div>
                        <table class="tabelka">
                          
                          <tr>
                            <td>
                              Nazwa książki:
                            </td>
                            <td>
                              <input type="text" name="title"/>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Autor:
                            </td>
                            <td>
                              <input type="text" name="author"/>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Grafika:
                            </td>
                            <td>
                              <input type="file" id="fileInput" class="fileInput" name="fileInput" accept="image/*"  onchange="previewImage(event)">
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Podgląd grafiki:
                            </td>
                            <td>
                              <div class="container-main-image">
                                <img id="imagePreview" src="books/default-book-graphic.png"/>
                              </div>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Opis:
                            </td>
                            <td>
                              <textarea id="description" type="text" name="description"></textarea>
                            </td>
                          </tr>
                          
                        </table>
                        
                        <button class="button-send" type="submit">Dodaj</button>
                          
                        </form>

                      </div>
<!--##########################################################################################################################################################-->
                      <div class="container-main ebook">
                        
                        <form method="post" action="book_add_ebook.php" enctype="multipart/form-data"> <!-- nazwy: title, author, image, description, pedofile -->
                        
                        <div class="header">
                          <div class="header-header">
                            Dodaj Ebooka
                          </div>
                        </div>
                        <table class="tabelka">
                          
                          <tr>
                            <td>
                              Nazwa książki:
                            </td>
                            <td>
                              <input type="text" name="title"/>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Autor:
                            </td>
                            <td>
                              <input type="text" name="author"/>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Grafika:
                            </td>
                            <td>
                              <input type="file" id="fileInput2" class="fileInput2" name="fileInput2" onchange="previewImage2(event)">
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Podgląd grafiki:
                            </td>
                            <td>
                              <div class="container-main-image">
                                <img id="imagePreview2" src="books/default-book-graphic.png"/>
                              </div>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Opis:
                            </td>
                            <td>
                              <textarea id="description" type="text" name="description"></textarea>
                            </td>
                          </tr>
                          
                          <tr>
                            <td>
                              Źródło (PDF):
                            </td>
                            <td>
                              <input type="file" id="fileInput3" class="fileInput3" name="fileInput3">
                            </td>
                          </tr>
                          
                        </table>
                        
                        <button class="button-send" type="submit">Dodaj</button>
                          
                        </form>

                      </div>
                      
                      
                    </div>
                </div>
            </div>
        </div>
      
         
    </div>
    
    
   
    
</body>
</html>