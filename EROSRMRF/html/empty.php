<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<section>
<br>
<div class='container' style='min-height: 800px'>
    <div class='row'>
        <div class='col'>
        col-1
        </div>
        
        <div class='col'>
        col-2
        </div>
        
        <div class='col'>
        col-3
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
