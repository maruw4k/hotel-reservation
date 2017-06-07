<?php
   
   
   
      if(!isset($_SESSION['zalogowany']))
      {
         header('Location: logowanie.php');
         exit();
      }


 ?>