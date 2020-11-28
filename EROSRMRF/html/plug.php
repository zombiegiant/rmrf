<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<section class=\"header6 cid-seWf9PxM3l1 mbr-fullscreen mbr-parallax-background\" id=\"header6-7\">

    

    <div class=\"mbr-overlay\" style=\"opacity: 0.2; background-color: rgb(68, 121, 217);\"></div>

    <div class=\"align-left container ml-0 mr-auto mt-0 mb-auto\">
        <div class=\"row \">
            <div class=\"col-12 col-lg-10\">
                <br><br><br><br><br>
                <h1 class=\"mbr-section-title mbr-fonts-style mbr-white mb-3 display-1\"><strong>В разработке</strong></h1>
            </div>
        </div>
    </div>
</section>
";



include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
