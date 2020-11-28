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
<iframe src='https://promo-money.ru/quickpay/shop-widget?writer=seller&targets=%D0%94%D0%BE%D0%B1%D1%80%D0%BE%D0%B2%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5%20%D0%BF%D0%BE%D0%B6%D0%B5%D1%80%D1%82%D0%B2%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5&targets-hint=&default-sum=&button-text=14&payment-type-choice=on&mobile-payment-type-choice=on&hint=&successURL=&quickpay=shop&account=410014374670062' width='100%' height='223' frameborder='0' allowtransparency='true' scrolling='no'></iframe>
<br>
</section>
";



include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
