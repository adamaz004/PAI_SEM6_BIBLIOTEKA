<head>	
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/signin.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<?php
//Pobranie zmiennych
$title = htmlentities($_POST["title"], ENT_QUOTES, "UTF-8");
$author = htmlentities($_POST["author"], ENT_QUOTES, "UTF-8");
$description = htmlentities($_POST["description"], ENT_QUOTES, "UTF-8");

$file = $_POST["fileInput"];
$target_file2 =
    "ebooks/". basename($_FILES["fileInput2"]["name"]);
$target_file3 =
    "pdf/". basename($_FILES["fileInput3"]["name"]);
$connection = mysqli_connect(
    "localhost",
    "kosierap_pai",
    "Pai321",
    "kosierap_pai",
);
if (!$connection) {
    echo " MySQL Connection error." . PHP_EOL;
    echo "Error: " . mysqli_connect_errno() . PHP_EOL;
    exit();
} else {
    
        if (
            move_uploaded_file(
                $_FILES["fileInput2"]["tmp_name"],
                $target_file2,
            )
        ) {if (
            move_uploaded_file(
                $_FILES["fileInput3"]["tmp_name"],
                $target_file3,
            )
        ) {
            ($result = mysqli_query(
                $connection,
                "INSERT INTO ebooks (title, author,file, cover, description) VALUES ('$title', '$author', '$target_file3', '$target_file2', '$description');",
            )) or die("DB error 2:  $connection->error);");
        }
        } else {
            print "<center><h1 style='padding-top:20%; color: red;'>Error - try again!</h1></center>";
           // header("Refresh: 2; URL=index.php");
        
    }

    print "<center><h1 style='padding-top:20%; color: red;'>Added new ebook!</h1></center>";
    header("Refresh: 1; URL=../index2_pracownik.php");
}

?>
