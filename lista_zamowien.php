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
$telefon = $wiersz['telefon'];
$liczba_nocy = $wiersz['liczba_nocy'];
$data = $wiersz['data_przyjazdu'];
$dodatkowe_info = $wiersz['dodatkowe_info'];
$dodatkowe_lozko = $wiersz['dodatkowe_lozko'];
$id_usera = $wiersz['id_usera'];
$data_zlozenia = $wiersz['data_zlozenia'];

$id_pokoju = $wiersz['id_pokoju'];
   
   
   
   if(isset($_GET['usun'])) {
   

$rezultat = $polaczenie->query("DELETE FROM `rezerwacje` WHERE id_usera='$id_usera'");
   
if (!$rezultat) {
   echo $_SESSION['user'];
   echo "Nie udalo sie usunąć".mysqli_error();
}
      
else {
      
      $rezultat2 = $polaczenie->query("SELECT * FROM pokoje WHERE pokoje.id='$id_pokoju'");
            if(!$rezultat2)
            {
                  echo 'Nie można uruchomić zapytania: ' . mysqli_error();
                  exit;
               }
            else
            {
             $wiersz = $rezultat2->fetch_assoc();
            $wolne_miejsca = $wiersz['wolne_miejsca'];
            $id = $wiersz['id'];
               
            $polaczenie->query(("UPDATE `pokoje` SET wolne_miejsca:= wolne_miejsca+1 WHERE pokoje.id='$id_pokoju'"));
            header('Location: zamowienie.php');
              echo "<label class='message'>Usunieto rezerwacje&nbsp;</label>";
      
            }
      }
}
   
   

if($id_pokoju==1)
{
   $pokoj="Pokoj 2 osobowy(140zł)";
}
elseif ($id_pokoju==2) {
   $pokoj="Pokoj 3 osobowy(160zł)";
}
else 
{
   $pokoj="";
}

   

   
   $polaczenie->close();
   
   
   if(isset($wiersz))
   {
   echo<<<END
   
   

   <div class="container"> 
	<h2>Moja rezerwacja</h2>
	
	<table class="table">
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
		<td>Rodzaj wybranego pokoju</td> <td>$pokoj</td>
	</tr>
     <tr>
		<td>Dodatkowe info</td> <td>$dodatkowe_info</td>
	</tr>
    <tr>
		<td>Data złożenia rezerwacji</td> <td>$data_zlozenia</td>
	</tr>
	</table>
    
    <a href="lista_zamowien.php?usun">Usuń rezerwację</a>
    
    
	<br /><a class='powrot_do_formularza' href="zamowienie.php">Powrót do formularza</a>
    </div>

END;
   }
   else {
      echo "<label class='message'>Nie masz żadnej rezerwacji.&nbsp;&nbsp;</label>"; 
      echo "<a class='powrot_do_formularza' href='zamowienie.php'>Powrót do formularza</a>";
      
   }
 


   
   ?>