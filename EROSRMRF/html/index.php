<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
    include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "
<section class=\"header6 cid-seWf9PxM3l mbr-fullscreen mbr-parallax-background\"   id=\"header6-7\">

    

    <div class=\"mbr-overlay\" style=\"opacity: 0.2; background-color: rgb(68, 121, 217);\"></div>

    <div class=\"align-center container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-12 col-lg-10\">
                <h1 class=\"mbr-section-title mbr-fonts-style mbr-white mb-3 display-1\"><strong>ROSRMRF</strong></h1>
                
                <p class=\"mbr-text display-7\">
                    Данный портал призван помочь в цифровой трансформации в области рационализаторской деятельности</p>
            </div>
        </div>
    </div>
</section>

<section class=\"features4 cid-seWekEiNnn\" id=\"features4-6\">
    
    <div class=\"mbr-overlay\"></div>
    <div class=\"container\">
        <div class=\"mbr-section-head\">
            <h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>Что делать?</strong></h4>
            
        </div>
        <div class=\"row mt-4\">
            <div class=\"item features-image сol-12 col-md-6 col-lg-4 no-gutters\">
                <div class=\"item-wrapper\">
                    <div class=\"item-img\">
                        <img src=\"https://psmedia.playstation.com/is/image/psmedia/fallout-shelter-listing-thumb-01-ps4-eu-15jun18?\" alt=\"\" title=\"\">
                    </div>
                    <div class=\"item-content\">
                        <h5 class=\"item-title mbr-fonts-style display-5\"><strong>Зарегистрируйся или войди</strong></h5>
                        <h6 class=\"item-subtitle mbr-fonts-style mt-1 display-7\">Начни с простого</h6>
                    </div>
                    <div class=\"btn-group item-footer mt-auto mb-0\" aria-label=\"Basic example\">
                        <a href=\"#\" class=\"btn item-btn btn-black display-7\" data-toggle=\"modal\" data-target=\"#staticBackdrop\"\">Вход</a>
                        <a class=\"btn item-btn btn-black display-7\" href=\"$domain/register.php\">Регистрация</a>
                    </div>
                </div>
            </div>
            <div class=\"item features-image сol-12 col-md-6 col-lg-4\">
                <div class=\"item-wrapper\">
                    <div class=\"item-img\">
                        <img src=\"https://img3.goodfon.ru/original/1024x768/a/cb/fallout-new-vegas-vault-boy-7315.jpg\" alt=\"\" title=\"\">
                    </div>
                    <div class=\"item-content\">
                        <h5 class=\"item-title mbr-fonts-style display-5\"><strong>Подай заявку</strong></h5>
                        <h6 class=\"item-subtitle mbr-fonts-style mt-1 display-7\">Отправься в крестовый поход</h6>
                        <p class=\"mbr-text mbr-fonts-style mt-3 display-7\">Создай рацпредложение и отправь его на проверку.</p>
                    </div>
                    <div class=\"mbr-section-btn item-footer mt-2\"><a href=\"add_post_rat.php\" class=\"btn item-btn btn-black display-7\">Перейти &gt;</a></div>
                    
                </div>
            </div>
            <div class=\"item features-image сol-12 col-md-6 col-lg-4\">
                <div class=\"item-wrapper\">
                    <div class=\"item-img\">
                        <img src=\"https://tlgrmx.ru/stickers/258/28.png\" alt=\"\" title=\"\">
                    </div>
                    <div class=\"item-content\">
                        <h5 class=\"item-title mbr-fonts-style display-5\"><strong>Получи вознаграждение</strong></h5>
                        <h6 class=\"item-subtitle mbr-fonts-style mt-1 display-7\">Возрадуйся</h6>
                        <p class=\"mbr-text mbr-fonts-style mt-3 display-7\">Одобрили внедрение? Тогда тебе сюда.</p>
                    </div>
                    <div class=\"mbr-section-btn item-footer mt-2\"><a href=\"plug.php\" class=\"btn item-btn btn-black display-7\">Перейти &gt;</a></div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class=\"clients1 cid-seWdRIN3yW\" id=\"clients1-4\">
    
    <div class=\"images-container container\">
        <div class=\"mbr-section-head\">
            
            <h4 class=\"mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5\">Наши Партнёры</h4>
            
        </div>
        <div class=\"row justify-content-center mt-4\">
            <div class=\"col-md-3 card\">
                <a href='https://rsv.ru/'><img src=\"assets/images/Partnery/1.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='http://shgpi.edu.ru/'><img src=\"assets/images/Partnery/2.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://www.sberbank.ru/ru/person/'><img src=\"assets/images/Partnery/3.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://www.pochta.ru/'><img src=\"assets/images/Partnery/4.png\" alt=\"\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://moscow.rt.ru/'><img src=\"assets/images/Partnery/5.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://www.rosatom.ru/'><img src=\"assets/images/Partnery/6.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='http://www.rosseti.ru/'><img src=\"https://lodmedia.hb.bizmrg.com/avatars/company_71939.jpeg\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://itcluster71.ru/'><img src=\"assets/images/Partnery/8.png\"></a>
            </div>
        </div>
    </div>
</section>";//Тело страницы





include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
  echo '

</body>
</html>';
