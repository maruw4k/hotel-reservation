<?php
   
   session_start();
   
   if(!isset($_SESSION['udanarejestracja']))
   {
      header('Location: logowanie.php');
      exit(); //przekierowuje od razu do zamowienia
   }

   else
   {
      unset($_SESSION['udanarejestracja']);
   }
   
   
   if(isset($_SESSION['blad']))  echo $_SESSION['blad'];
   
  

?>



<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Dziekujemy za rejestracje</title>
	<link href="css/styles_order.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>



<h2>Witamy i dziekujemy za rejestracje</h2>
<a href="logowanie.php">Zaloguj się na swoje konto</a>

</body>
</html>