<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Zaloguj</title>
		<link href="css/styles_order.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

      <a href="rejestracja.php">Rejestracja</a>
	
	
	<div class="container">
  <h2>Zaloguj</h2>
  <form action="zaloguj.php" method="post">
    <div class="form-group">
      <label for="email">Login:</label>
      <input type="text" class="form-control" name="login" placeholder="Wprowadź login">
    </div>
    <div class="form-group">
      <label for="pwd">Hasło:</label>
      <input type="password" class="form-control" name="haslo" placeholder="Wprowadź hasło">
    </div>
    <button type="submit" value="Zaloguj się" class="btn btn-default">Zaloguj się</button>
  </form>
</div>
	
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