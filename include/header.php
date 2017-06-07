<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	
	<meta name="description" content="">
	<meta name="author" content="Marek Krzeszowiec">


 
	<link href="css/style.css" rel="stylesheet">
  
  <link href="css/styles_order.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script

  


</head>


<body>

     <?php

      echo "<p>Jesteś zalogowany na konto: ".$_SESSION['user'].'&#9;<a href="include/logout.php">Wyloguj się</a>'; 
      echo "<p>Twój email: ".$_SESSION['email']." </br>";
      echo "<p class='rezerwacja'><a href=lista_zamowien.php> Pokaż moją rezerwację</a>";
     
      

   

