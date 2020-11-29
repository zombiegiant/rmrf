<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' 
  <style>
        .form-width {max-width: 25rem;}
        .has-float-label {
            position: relative;
        }
        .has-float-label label {
            position: absolute;
            left: 0;
            top: 0;
            cursor: text;
            font-size: 75%;
            opacity: 1;
            top: -.5em;
            left: 0.75rem;
            z-index: 3;
            line-height: 1;
            padding: 0 1px; }
        .has-float-label label::after {
            content: " ";
            display: block;
            position: absolute;
            background: white;
            height: 2px;
            top: 50%;
            left: -.2em;
            right: -.2em;
            z-index: -1; }
        .has-float-label .form-control::-webkit-input-placeholder{
            opacity: 1;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -o-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
        }
        .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
            opacity: 0; }

        .input-group .has-float-label {
            display: table-cell; }
        .input-group .has-float-label .form-control {
            border-radius: 0.25rem; }
        .input-group .has-float-label:not(:last-child) .form-control {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0; }
        .input-group .has-float-label:not(:first-child) .form-control {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            margin-left: -1px; }
    </style>
 </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

if(!isset($_POST['register'])) {
    echo "
<br>
<section>
<div class='container'>
<div class='row'>
<div class='col-md-4 offset-md-4'>
<div class=\"p-x-1 p-y-3\">
    <form class=\"card card-block m-x-auto bg-faded form-width\" method='post' action='$domain/register.php'>
        <legend class=\"m-b-1 text-xs-center\"><b>Регистрация</b></legend>
        
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"first\" type=\"text\" required=\"\" placeholder=\"Имя\" name='first_name'/>
            <label for=\"first\">Имя</label>
        </div>
         
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"last\" type=\"text\" required=\"\" placeholder=\"Фамилия\" name='last_name'/>
            <label for=\"last\">Фамилия</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"middle\" type=\"text\" required=\"\" placeholder=\"Отчество\" name='middle_name'/>
            <label for=\"middle\">Отвество</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"data\" type=\"date\" required=\"\" placeholder=\"дд.мм.гггг\" name='data'/>
            <label for=\"data\">Дата рождения</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"number\" type=\"number\" required=\"\" placeholder=\"+7xxxxxxxxxx\" name='number'/>
            <label for=\"number\">Номер телефона</label>
        </div>
        
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"email\" type=\"email\" required=\"\" placeholder=\"name@example.com\" name='email'/>
            <label for=\"email\">E-mail</label>
        </div>

        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"password\" type=\"password\" required=\"\" placeholder=\"••••••••\" name='pass'/>
            <label for=\"password\">Пароль</label>
        </div>
        <div class=\"form-group has-float-label\">
            <input class=\"form-control\" id=\"password\" type=\"password\" required=\"\" placeholder=\"••••••••\"/>
            <label for=\"password\">Пароль повторно</label>
        </div>
        

        <div class=\"text-xs-center\">
            <input class=\"btn btn-block btn-primary\" type=\"submit\" name='register' value='Регистрация'>
        </div>
    </form>
</div>
</div>
</div>
</div>
</section>
<br>";
} else {
//    echo "<br>";
//    var_dump($_POST);

    $mysqli = ConnectDB();
    echo "-----------";
    $pass = password_hash ( $_POST['pass'],PASSWORD_DEFAULT);
    if (!$res=$mysqli->query("CALL AddUser('$_POST[first_name]','$_POST[last_name]','$_POST[middle_name]','$_POST[data]',$_POST[number],'$_POST[email]','$pass', '1')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }


    echo '<br><div class="container" style="min-height: 700px;" id="ContNum1">
<br><br><br><br><br><br><br>
 <br><h2 style="text-align: center;">Регистрация прошла успешно</h2> <br>  
    </div>
    <br>

    ';
    echo "<script type='text/javascript'>
        setTimeout('location.replace(\"$domain\")',3000);
        </script>";
}

include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
  echo '

</body>
</html>';