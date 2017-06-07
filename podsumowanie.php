<?php
   session_start();
   require 'include/is_login.php';
   require 'include/header.php';
   require_once "include/connect.php";
   
   
   $imie = $_POST['imie_nazwisko'];
   $telefon = $_POST['telefon'];
   $liczba_nocy = $_POST['liczba_nocy'];
   $data = $_POST['data'];
   $wybrany_pokoj = $_POST['rodzaj'];
   $dodatkowe_info = $_POST['dodatkowe_info'];

      
   if(isset($_POST['dodatkowe_lozko'])) 
      {
         $dodatkowe_lozko='Tak';
      }
      else 
      {
          $dodatkowe_lozko='Nie';
      }
   
   

      
      mysqli_report(MYSQLI_REPORT_STRICT); //zeby nie wyrzucalo kody bledow tylko wyjatki
      
      try {
         $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
           
         if($polaczenie->connect_errno!=0)
            {
               throw new Exception(mysqli_connect_errno());
            }
         
         
         else
         {
          
            
            
            if($polaczenie->query("INSERT INTO rezerwacje VALUES(NULL, '$wybrany_pokoj', '$data', '$liczba_nocy', '$telefon', '$imie', '$dodatkowe_info', '{$_SESSION['id']}', '$dodatkowe_lozko')")==false)
            {
               echo "Nie udało się wprowadzić danych";
            }
 
            }

                  
         } 

      catch(Exception $e)
      {
         echo "Błąd serwera, zapraszamy kiedy indziej" ;
         echo '<br />Informacja deweloperska'.$e;
      }
   
   
   
   
   
echo<<<END


	<h2>Podsumowanie zamówienia</h2>
	
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>Imię i nazwisko</td> <td>$imie</td>
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


</body>

</html>