<head>	
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/signin.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<?php
//Pobranie zmiennych
$user = htmlentities($_POST["user"], ENT_QUOTES, "UTF-8");
$pass = htmlentities($_POST["pass"], ENT_QUOTES, "UTF-8");
$pass2 = htmlentities($_POST["pass2"], ENT_QUOTES, "UTF-8");
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
    
           if( $result = mysqli_query(
                $connection,
                "INSERT INTO user (username, password) VALUES ('$user', '$pass');",
            ) or die("DB error 2:  $connection->error);"));
         else {
            print "<center><h1 style='padding-top:20%; color: red;'>Error - try again!</h1></center>";
            header("Refresh: 2; URL=index.php");
        }
    

    print "<center><h1 style='padding-top:20%; color: red;'>Added new user!</h1></center>";
    header("Refresh: 1; URL=index.php");
}

?>
