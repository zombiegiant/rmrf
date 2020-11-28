<?php

echo '<!doctype html>
<html lang="ru">
  <head>
   <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
   <!LINK href="css/chat.css" rel="stylesheet" type="text/css">
    ';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<section>
<br>
<div class='container' style='min-height: 800px'>
    <div class='row'>
        <div class='col'>
             <div class='col-sm-4'>
                 col-1
             </div>
              <div class='col-sm-8'>
                 col-1
             </div>
        </div>
        
        <div class='col'>
        col-2
        </div>
        

    
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
