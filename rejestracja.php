<?php
   
   session_start();

   require_once "include/connect.php";

   if(isset($_POST['email']))
   {
      //Udana walidacja? ustawienie flafi
      $wszystko_OK=true;
      
      
      $nick = $_POST['nick'];
      if(strlen($nick)<3 || (strlen($nick)>20))
      {
         $wszystko_OK=false;
         $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
      }
      
      
      if(ctype_alnum($nick)==false)
      {
         $wszystko_OK=false;
         $_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr(bez polskich znakow)";
      }
      
      $haslo1 = $_POST['haslo1'];
      $haslo2 = $_POST['haslo2'];
      
      if(strlen($haslo1)<8 || (strlen($haslo1)>20))
      {
         $wszystko_OK=false;
         $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
      }
      
      
      if($haslo1!=$haslo2)
      {
         $wszystko_OK=false;
         $_SESSION['e_haslo2']="Podane hasła nie pasują do siebie";
      }
      
      
      $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT); //hashowanie hasla
      
      

      if(!isset($_POST['regulamin']))
            {
             $wszystko_OK=false;
            $_SESSION['e_regulamin']="Regulamin nie zaznaczony";
           }
      
      $sekret = "6Lfb1goUAAAAAO8dtseUJNsduYaU_FyJ8kYBBFCb";
      $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
      
      $odpowiedz = json_decode($sprawdz);
      
      if($odpowiedz->success==false)
      {
          
             $wszystko_OK=false;
            $_SESSION['e_captcha']="Potwierdz, ze nie jestes botem. ";
           
      
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
            $email = $_POST['email'];
            //sprawdzenie emaila
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
            
            if(!$rezultat) throw new exception($polaczenie->error);
            
            $ile_takich_maili = $rezultat->num_rows;
            if($ile_takich_maili>0)
             {
                     $wszystko_OK=false;
                     $_SESSION['e_email']="Istnieje już konto o podanym adresie email";
         }  
            
            
         //sprawdzenie nicka
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
            
            if(!$rezultat) throw new Exception($polaczenie->error);
            
            $ile_takich_nickow = $rezultat->num_rows;
            if($ile_takich_nickow>0)
             {
                     $wszystko_OK=false;
                     $_SESSION['e_nick']="Istnieje już konto o podanym nicku";
         }  
            
            
          if($wszystko_OK==true)
            {
               if($polaczenie->query("INSERT INTO uzytkownicy VALUES(NULL, '$nick', '$haslo_hash', '$email')"))
               {
                  $_SESSION['udanarejestracja']=true;
                     header('Location: witamy.php');
                  
               }
             
             else
             {
                throw new Exception($polaczenie->error);
             }
             
             
            }
            
            
            
            $polaczenie->close();
         }
         
      }
      catch(Exception $e)
      {
         echo "Błąd serwera, zapraszamy kiedy indziej" ;
         echo '<br />Informacja deweloperska'.$e;
      }
      
      
      
      
   }

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Załóż konto</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	
	
	<style>
         .error
       {
          color: red;
          margin-top: 10px;
          margin-bottom: 10px;
       }
   
   </style>
</head>

<body>

	
	<form method="post">
   
   
	   Nickname: <br/> <input type="text" name="nick"/> <br/>
	   <?php
         if(isset($_SESSION['e_nick']))
         {
            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
            unset($_SESSION['e_nick']);
         }
       ?>
       
	   
	   
	   E-mail: <br/> <input type="email" name="email"/> <br/>
	   
	       <?php
         if(isset($_SESSION['e_email']))
         {
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);
         }
       ?>
	   
	   
	   Twoje hasło: <br/> <input type="password" name="haslo1"/> <br/>
	    <?php
         if(isset($_SESSION['e_haslo']))
         {
            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);
         }
       ?>
       
	   Powtórz hasło: <br/> <input type="password" name="haslo2"/> <br/>
	      <?php
         if(isset($_SESSION['e_haslo2']))
         {
            echo '<div class="error">'.$_SESSION['e_haslo2'].'</div>';
            unset($_SESSION['e_haslo2']);
         }
       ?>
	   
	   
	   <label>
	   <input type="checkbox" name="regulamin"/>Akceptuję reglamin
	   </label>
	    <?php
         if(isset($_SESSION['e_regulamin']))
         {
            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
            unset($_SESSION['e_regulamin']);
         }
       ?>
	   
	   <div class="g-recaptcha" data-sitekey="6Lfb1goUAAAAAD5JBOTF0UOT-DH9b4BJJxx9ZI9H"></div>
	   
	   <?php
            if(isset($_SESSION['e_captcha']))
            {
               echo '<div class="error">'.$_SESSION['e_captcha'].'</div>';
               unset($_SESSION['e_captcha']);
            }
       ?>
	   
	   <br/>
	   
	   <input type="submit" value="Zarejestruj się">
	   
	</form>
	

	


</body>
</html>