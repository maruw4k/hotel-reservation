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
</head>

<body>



<h1>Witamy i dziekujemy za rejestracje</h1>
<a href="logowanie.php">Zaloguj się na swoje konto</a>

</body>
</html>