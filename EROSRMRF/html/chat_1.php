<?php

echo '<!doctype html>
<html lang="ru">
  <head>
   <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
   <!LINK href="css/chat.css" rel="stylesheet" type="text/css">
    <style>
    
    .c1 {
    position:relative; 
    width: 40%;
    height: 70px;
    background-color: grey;
    top: 20px;
    left: 200px;
    outline: 2px solid #000; /* Чёрная рамка */
 }
  .c2 {
    position:relative; 
    width: 60%;
    height: 70px;
    background-color: #D3D3D3;
    top: 20px;
    right: 50px;
 }

    .c3 {
    position:relative; 
    width: 40%;
    height: 150px;
    background-color: grey;
    top: 20px;
    left: 200px;
 }


.chat-head img {
    width: 40px;
    height: 40px;
    margin: 10px;
    border-radius: 50%;
}
    </style>
    
    
    ';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<section>
<br>
<div class='row m-0 d-flex align-items-center mb-5'>
    <div class='c1'>
      <div class='chat-head'>
			<img src='css/t.jpg' alt='profilepicture'>
      </div>
      
       

    </div>
    <div class='c2'>
      1234567  
    </div>
    
    <div class='c3'>
      1234567  
    </div>
</div>
<br>
</section>
";



include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
