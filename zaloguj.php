<?php


   session_start();
   require_once "include/connect.php";


   if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
   {
      header('Location: logowanie.php');
      exit();
   }

   

   $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

   if($polaczenie->connect_errno!=0)
   {
      echo "Error: ".$polaczenie->connect_errno."Opis: ".$polaczenie->connect_error;
   }
   else 
   {
      $login = $_POST['login'];
      $haslo = $_POST['haslo'];
      
      //sanityzacja 
      $login = htmlentities($login, ENT_QUOTES, "UTF-8"); 
      
      
      $sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";
      
      if ($rezultat = @$polaczenie->query(
         //zabezpiecznie przed wstrzykiwaniem
      sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
             mysqli_real_escape_string($polaczenie,$login))))  
      {
         $ilu_userow = $rezultat->num_rows; //sprawdzenie czy uzytkownik jest w bazie
         if($ilu_userow>0)
         {
               $wiersz = $rezultat->fetch_assoc();
               if(password_verify($haslo, $wiersz['pass']))
               {
                 $_SESSION['zalogowany'] = true;

                //tablica socjacyjna

               $_SESSION['id'] = $wiersz['id'];
               $_SESSION['user'] = $wiersz['user']; //aby dalo sie przeyslac zmienne pomiedzy formularzami

               $_SESSION['email'] = $wiersz['email'];

               unset($_SESSION['blad']); //zniscz zmienna

               $rezultat->close();

               header('Location: zamowienie.php');
          }
            else 
            {
            
               $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';

               header('Location: logowanie.php');

            }
            
            
            
         } else {
            
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            
            header('Location: logowanie.php');
            
         }
      }
      
    
      
      $polaczenie->close();
   }




      echo $login;

   



?>