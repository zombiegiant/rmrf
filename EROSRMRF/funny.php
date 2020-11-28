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
<div class='container' style='min-height: 200px; min-width: 200px'>
    <div class='row'>
        <div class='col-md-4'>
            <div class=\"form-control\">
                <div class='card' style='width: 18rem;'>
                    <img src='assets/images/2.jpg' class='card-img-top' alt='...' style='max-height: 190px'>
                    <div class='card-body'>
                        <h5 class='card-title'>Новости</h5>
                        <hr class=\"my-4\" />
                        <p class='card-text'>Увеличьте свою уровень осведомленности о мире</p>
                        <a href='plug.php' class='btn btn-primary'>Преисполниться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class=\"form-control\">
                <div class='card' style='width: 18rem;'>
                    <img src='assets/images/1.jpg' class='card-img-top' alt='...' style='max-height: 190px'>
                    <div class='card-body'>
                        <h5 class='card-title'>Форум</h5>
                        <hr class=\"my-4\" />  
                        <p class='card-text'>Обсудите самые важные проблемы человечества</p>
                        <a href='plug.php' class='btn btn-primary'>Залететь</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class=\"form-control\">
                <div class='card' style='width: 18rem;'>
                    <img src='assets/images/3.jpg' class='card-img-top' alt='...' style='max-height: 190px'>
                    <div class='card-body'>
                        <h5 class='card-title'>Галерея</h5>
                        <hr class=\"my-4\" />  
                        <p class='card-text'>Мультимедийный музей в одной кнопке</p>
                        <a href='plug.php' class='btn btn-primary'>Оценить картинку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class='container' style='min-height: 200px; min-width: 200px'>
    <div class='row'>
        <div class='col-md-4'>
            <div class=\"form-control\">
                <div class='card' style='width: 18rem;'>
                    <img src='assets/images/Rabochiy_stol/usl.jpg' class='card-img-top' alt='...' style='max-height: 190px'>
                    <div class='card-body'>
                        <h5 class='card-title'>Помощь по дому</h5>
                        <p class='card-text'>Нет ничего лучше, чем внезапно появившийся подручный в доме</p>
                        <a href='plug.php' class='btn btn-primary'>Получить</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class=\"form-control\">
                <div class='card' style='width: 18rem;'>
                    <img src='assets/images/Rabochiy_stol/usl.jpg' class='card-img-top' alt='...' style='max-height: 190px'>
                    <div class='card-body'>
                        <h5 class='card-title'>Помощь по дому</h5>
                        <p class='card-text'>Нет ничего лучше, чем внезапно появившийся подручный в доме</p>
                        <a href='plug.php' class='btn btn-primary'>Получить</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class=\"form-control\">
                <div class='card' style='width: 18rem;'>
                    <img src='assets/images/Rabochiy_stol/usl.jpg' class='card-img-top' alt='...' style='max-height: 190px'>
                    <div class='card-body'>
                        <h5 class='card-title'>Помощь по дому</h5>
                        <p class='card-text'>Нет ничего лучше, чем внезапно появившийся подручный в доме</p>
                        <a href='plug.php' class='btn btn-primary'>Получить</a>
                    </div>
                </div>
            </div>
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
