<html>

<head>
   <title>Podsumowanie zamówienia</title>
</head>

<body> </body>
<?php
   
   session_start();
   require 'include/is_login.php';
   require 'include/header.php';
   require_once "include/connect.php";
   
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);


$rezultat = $polaczenie->query("SELECT * FROM `rezerwacje` JOIN uzytkownicy ON rezerwacje.id_usera=uzytkownicy.id WHERE user='{$_SESSION['user']}'");
if (!$rezultat) {
    echo 'Nie można uruchomić zapytania: ' . mysqli_error();
    exit;
}
    
$wiersz = $rezultat->fetch_assoc();
   

$user = $wiersz['user'];
$email = $wiersz['email'];
$user = $wiersz['imie_nazwisko'];
$rodzaj_pokoju = $wiersz['rodzaj_pokoju'];
$telefon = $wiersz['telefon'];
$liczba_nocy = $wiersz['liczba_nocy'];
$data = $wiersz['data_przyjazdu'];
$dodatkowe_info = $wiersz['dodatkowe_info'];
$wybrany_pokoj = $wiersz['rodzaj_pokoju'];
$dodatkowe_lozko = $wiersz['dodatkowe_lozko'];


   
   $polaczenie->close();
   
   
   
   echo<<<END


	<h2>Moje rezerwacje</h2>
	
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Imię i nazwisko</td> <td>$user</td>
	</tr>
	<tr>
		<td>Telefon</td> <td>$telefon</td>
	</tr>
	<tr>
		<td>Liczba nocy</td> <td>$liczba_nocy</td>
	</tr>	
    <tr>
		<td>Data</td> <td>$data</td>
	</tr>
    <tr>
		<td>Dodatkowe łóżko</td> <td>$dodatkowe_lozko</td>
	</tr>
    <tr>
		<td>Rodzaj wybranego pokoju</td> <td>$wybrany_pokoj</td>
	</tr>
     <tr>
		<td>Dodatkowe info</td> <td>$dodatkowe_info</td>
	</tr>
	</table>
    
	<br /><a href="zamowienie.php">Powrót do formularza</a>

END;
 


   
   ?>