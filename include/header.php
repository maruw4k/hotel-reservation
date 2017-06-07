<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	
	<meta name="description" content="">
	<meta name="author" content="Marek Krzeszowiec">


 
	<link href="css/style.css" rel="stylesheet">

  


</head>


<body>

     <?php

      echo "<p>Jesteś zalogowany na konto: ".$_SESSION['user'].'&#9;<a href="include/logout.php">Wyloguj się</a>';
      echo "<p>Twój email: ".$_SESSION['email']." </br>";
      echo "<p><a href=lista_zamowien.php> Pokaz moją rezerwację</a>";

   

