<html>

<head>
   <title>Rezerwacja</title>
</head>

<body>
  
     <?php
   
      session_start();
   
    include 'include/header.php';
   include 'include/is_login.php';
   
     
   
      ?>
   
   
   <div class="container">
   <h2>Nowa rezerwacja pokoju</h2>
   <form action="podsumowanie.php" method="post">
     
      
      
      <div class="form-group">   
      
      <label for="rodzaj">Rodzaj pokoju:</label>
      

      <select type="select" class="form-control" name="rodzaj">
         <option value="">- wybierz rodzaj pokoju -</option>
         <option value="1">1: Pokój 2 osobowy (koszt 140zł)</option>
         <option value="2">2: Pokój 3 osobowy (koszt 160zł)</option>
      </select>
      </div>
      
      <div class="form-group">
      
      <label for="data">Data przyjazdu</label>
      
      <input class="form-control" maxlength="150" type="date" name="data">
      </div>
      
      
      <div class="form-group">
      <label for="liczba_nocy">Liczba nocy</label>

      <select class="form-control" size="1" label_over="0" hide_label="0" type="select" name="liczba_nocy">
         <option value="">- wybierz liczbę nocy -</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         <option value="13">13</option>
         
         
         </select>
      </div>
        
            <div class="form-group">
       
                <label for="dodatkowe łóżko"> Czy dodać dodatkowe łóżko?</label>
	   <input type="checkbox" name="dodatkowe_lozko"/>
	   </label>
        
         </div>
         
         <div class="form-group">
            <label for="imie_nazwisko">Imię i nazwisko</label>
            <input class="form-control" maxlength="150" size="30" title="" label_over="0" hide_label="0" type="text" value="" name="imie_nazwisko">
         </div>
         
         <div class="form-group">
            <label for="telefon">Telefon kontaktowy</label>
            <input class="form-control" maxlength="150" size="30" title="" label_over="0" hide_label="0" type="text" value="" name="telefon">
         </div>
         
            
         <div class="form-group">

            <label for="dodatkowe_info">Dodatkowe informacje</label>
            <input class="form-control" type="text" name="dodatkowe_info">
         </div>


         <input class="btn btn-default" name="input_submit_2" value="Wyślij" type="submit">
     
      </div>

   </form>

      
</body>

</html>