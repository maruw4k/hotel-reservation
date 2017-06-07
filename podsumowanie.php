<?php
   session_start();
   require 'include/is_login.php';
   require 'include/header.php';
   require_once "include/connect.php";
   
   
   $imie = $_POST['imie_nazwisko'];
   $telefon = $_POST['telefon'];
   $liczba_nocy = $_POST['liczba_nocy'];
   $data = $_POST['data'];
   $id_pokoju = $_POST['rodzaj'];
   $dodatkowe_info = $_POST['dodatkowe_info'];

   $dzisiaj = date("Y-m-d");


      
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
            
            
            $rezultat = $polaczenie->query("SELECT * FROM pokoje WHERE pokoje.id='$id_pokoju'");
            if(!$rezultat)
            {
                  echo 'Nie można uruchomić zapytania: ' . mysqli_error();
                  exit;
               }
    
            $wiersz = $rezultat->fetch_assoc();
            $wolne_miejsca = $wiersz['wolne_miejsca'];
            $id = $wiersz['id'];
            
            
            
               if($data>$dzisiaj)
               {
                  if($wolne_miejsca>0)
                  {
            
                           if(($polaczenie->query("SELECT * FROM `rezerwacje` JOIN uzytkownicy ON rezerwacje.id_usera=uzytkownicy.id WHERE user='{$_SESSION['user']}'")->num_rows)<1)
                           {


                           $polaczenie->query(("INSERT INTO rezerwacje VALUES(NULL, '$id_pokoju', '$data', '$liczba_nocy', '$telefon', '$imie', '$dodatkowe_info', '{$_SESSION['id']}', '$dodatkowe_lozko', NULL)"));
                              
                              
                            $polaczenie->query(("UPDATE `pokoje` SET wolne_miejsca:= wolne_miejsca-1 WHERE pokoje.id='$id_pokoju'"));   
                              
                           



                 echo<<<END

      <div class="container"> 
	<h2>Podsumowanie rezerwacji</h2>
	
	<table class="table">
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
		<td>Rodzaj wybranego pokoju</td> <td>$id_pokoju</td>
	</tr>
     <tr>
		<td>Dodatkowe info</td> <td>$dodatkowe_info</td>
	</tr>
	</table>
    
	<br /><a class='powrot_do_formularza' href="zamowienie.php">Powrót do formularza</a>
    </div>

END;


            }
                
         else
            {
            echo "<label class='message'>Niestety nie udało się wprowadzić danych. Do bazy mozna wprowadzic tylko jedno zamowienie.&nbsp;&nbsp;</label>"; 
            echo "<br /><a class='powrot_do_formularza' href='zamowienie.php'>Powrót do formularza</a>";
            } 
            
            
            
                  } 
            else 
            {
               echo "<label class='message'>Brak wolnych miejsc.&nbsp;&nbsp;</label>"; 
               echo "<br /><a class='powrot_do_formularza' href='zamowienie.php'>Powrót do formularza</a>";
            }
   }
   else
   {
       echo "<label class='message'>Ustaw datę rezerwacji w przyszłości.&nbsp;&nbsp;</label>";
       echo "<br /><a class='powrot_do_formularza' href='zamowienie.php'>Powrót do formularza</a>";
   }
  } //else z pierwszego ifa
      } //try
      

      catch(Exception $e)
      {
         echo "Błąd serwera, zapraszamy kiedy indziej" ;
         echo '<br />Informacja deweloperska'.$e;
      }
      
   
   
   
   

   ?>


</body>

</html>