<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Zaloguj</title>
		<link href="css/style.css" rel="stylesheet">
</head>

<body>

      <a href="rejestracja.php">Rejestracja</a>
	
	
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
	
<?php
   
   session_start();
   
   if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true))
   {
      header('Location: zamowienie.php');
      exit(); //przekierowuje od razu do zamowienia
   }
   
   
   if(isset($_SESSION['blad']))  echo $_SESSION['blad'];
   
  

?>

</body>
</html>