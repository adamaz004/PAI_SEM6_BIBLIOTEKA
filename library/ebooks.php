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
	<script type="text/javascript" src="twoj_js.js"></script> 
  
  <script>
function updateSecondSelect() {
  var firstSelect = document.getElementById("firstSelect");
  var secondSelect = document.getElementById("secondSelect");

  var selectedOption = firstSelect.value;

  // Usunięcie istniejących opcji z drugiego selecta
  secondSelect.innerHTML = "";

  if (selectedOption === "name") {
    // Dodanie opcji A-Z i Z-A
    var optionAtoZ = document.createElement("option");
    optionAtoZ.value = "AtoZ";
    optionAtoZ.text = "A-Z";
    secondSelect.appendChild(optionAtoZ);

    var optionZtoA = document.createElement("option");
    optionZtoA.value = "ZtoA";
    optionZtoA.text = "Z-A";
    secondSelect.appendChild(optionZtoA);
  } 
}
  </script>
    
    <style>
        a > img {
            -webkit-filter:invert(100%);
            filter:progid:DXImageTransform.Microsoft.BasicImage(invert='1');
        }
      .container-main {
        
      }
      .container-filters {
        background-color: white;
        border: 3px solid black;
        border-radius: 7px;
        width: 210px;
        height: 58px;
        max-height: 100px;
        padding: 10px;
        margin-bottom: 20px;
        padding-right: 20px;
        
      }
      .container-filters div {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        float:left;
        height: 30px;
        font-weight: bold;
        width: 152px;
        margin-left:10px;
        padding-top:3px;
      }
      .container-filters select {
        width: 152px;
        height: 30px;
        margin-right: 16px;
      }
      .container-filters input {
        width: 152px;
        height: 30px;
        margin-top:1px;
      }
      .container-results {
        background-color: white;
        border: 3px solid black;
        border-radius: 7px;
        width: 722px;
        height: 750px;
        max-height: 750px;
        overflow-y: scroll;
        padding: 5px;
      }
      .result-block {
        width: 152px;
        height: 262px;
        float: left;
        border: 1px solid #555;
        margin: 10px;
      }
      .result-div-img {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 140px;
        width: 150px;
      }
      .result-div-img img {
        max-height: 120px;
        max-width: 120px;
        height: auto;
        width: auto;
      }
      .result-div-title {
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        text-align: center;
        width: 150px;
        padding-left:5px;
        padding-right:5px;
        height: 36px;
        line-height: 1;
      }
      .result-div-author {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        color: #777;
        text-align: center;
        width: 150px;
        padding-left:5px;
        padding-right:5px;
        height: 29px;
        line-height: 1;
      }
      .result-div-grade {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 150px;
        height: 20px;
        padding-right: 10px;
        line-height: 1;
      }
      .result-div-status {
        text-align: center;
        width: 150px;
        height: 26px;
        font-size: 16px;
        font-weight: bold;
        padding-top:2px;
      }
      .dostepny {
        color: #33B864;
        padding-right:14px;
      }
      .niedostepny {
        color: red;
        padding-right:10px;
      }
      .wypozyczony {
        color: grey;
      }
      .result-div-button {
        width: 150px;
        height: 49px;
        padding-bottom: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .result-div-button-reserv {
        border: none;
        width: 130px;
        height: 35px;
        border: 2px solid #33B864;
        background-color: transparent;
        color: #33B864;
        transition: background-color 0.2s, color 0.2s;
        margin-top: 5px;
      }
      .result-div-button-reserv:hover {
        transition: 0.2s;
        background-color: #33B864;
        color: white;
      }
      .result-div-button-powiadom {
        border: none;
        width: 130px;
        height: 35px;
        border: 2px solid red;
        background-color: transparent;
        color: red;
        transition: background-color 0.2s, color 0.2s;
        font-size: 14px;
        line-height: 1;
      }
      .result-div-button-powiadom:hover {
        transition: 0.2s;
        background-color: red;
        color: white;
      }
      .result-div-button-blocked {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        width: 130px;
        height: 35px;
        border: 2px solid grey;
        background-color: transparent;
        color: grey;
        cursor: not-allowed;
      }
      .button-delete {
        background-color: #bf0b0b;
        color: white;
        position: absolute;
        margin-top: -8px;
        margin-left: 112px;
        font-size: 10px;
        font-weight: bold;
        border: none;
        border-radius: 4px;
      }
      .button-delete:hover {
        scale: 1.8;
        background-color: #ed2424;
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
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">

                      
                      <div class="container-main">
                        
                        <div class="container-filters">
                          <center>
                          <div class="search-container">
									<input type="text" id="search-input" placeholder="Wyszukaj książkę..." onkeyup="searchBooks()" >
								</div>
                          </center>
                      	</div>
                        
                        <div class="container-results" id="container-results">
                          
                        
                          
                      	</div>
                        
                      </div>
                      
                      
                    </div>
                </div>
            </div>
        </div>
      
         
    </div>
   <script>
           
 $(document).ready(function() {
			//setInterval(function() {
				$.ajax({
					url: "ebooks_get.php",
					success: function(result) {
						$("#container-results").html(result);
					}
				});
			//}, 1000); // odświeżaj co sekundę
		});

       function searchBooks() {
			let input, filter, container, blocks, title, i;
			input = document.getElementById('search-input');
			filter = input.value.toUpperCase();
			container = document.getElementById('container-results');
			blocks = container.getElementsByClassName('result-block');

			for (i = 0; i < blocks.length; i++) {
				title = blocks[i].getElementsByClassName('result-div-title')[0];
				if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
					blocks[i].style.display = "";
				} else {
					blocks[i].style.display = "none";
				}
			}
		}
  </script>
    
    
   
    
</body>
  <script>
    function loadDefaultValues() {
      updateSecondSelect();
    }
  </script>
</html>