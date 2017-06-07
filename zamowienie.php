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
   
   <form action="podsumowanie.php" method="post">
     
      <h2>Nowa rezerwacja pokoju</h2>
      
      <div>   
      <label>Rodzaj pokoju</label>
      <select size="1" label_over="0" hide_label="0" type="select" name="rodzaj">
         <option value="">- wybierz rodzaj pokoju -</option>
         <option value="2osobowy">Pokój 2 osobowy (koszt 140zł)</option>
         <option value="3osobowy">Pokój 3 osobowy (koszt 160zł)</option>
      </select>
      </div>
      
      <div>
      <label>Data przyjazdu</label>
      <input maxlength="150" size="16" title="" label_over="0" hide_label="0" type="date" value="" name="data">
      </div>
      
      
      <div>
      <label>Liczba nocy</label>
      <select size="1" label_over="0" hide_label="0" type="select" name="liczba_nocy">
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
        
            <div>
       
                <label>
	   <input type="checkbox" name="dodatkowe_lozko"/>Czy dodać dodatkowe łóżko?
	   </label>
        
         </div>
         
         <div>
            <label>Imię i nazwisko</label>
            <input maxlength="150" size="30" title="" label_over="0" hide_label="0" type="text" value="" name="imie_nazwisko">
         </div>
         
         <div>
            <label>Telefon kontaktowy</label>
            <input maxlength="150" size="30" title="" label_over="0" hide_label="0" type="text" value="" name="telefon">
         </div>
         
            
         <div>

            <label>Dodatkowe informacje</label>
            <input type="text" name="dodatkowe_info">
         </div>


         <input name="input_submit_2" value="Wyślij" type="submit">

   </form>

      
</body>

</html>