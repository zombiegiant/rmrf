<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo '<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>
        function changeFind(){
            
            var obj = document.getElementById("find");
            var str = obj.value;        
            $.ajax({
                type: "POST",
                url: "findGoodPost.php",
                data: {str:str}
            }).done(function( result )
            {

                $("#rats").html( result );
            });
        }
    </script>';
echo ' </head>
  <body onload="changeFind()">';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии
echo '
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center">Предложения по рационализации</h4>
        </div>
    </div>        
   <br>
            ';
echo "<input type='text' name='find' id='find' class='form-control' style='max-width: 300px;  ' placeholder='Поиск по тегам' oninput='changeFind()'><br>";
echo "<div id='rats'>

</div>";

/*
$mysqli = ConnectDB();

if (!$res=$mysqli->query("Call GetPostHelp()")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
while($row = $res->fetch_assoc()) {
    echo "

    <div class=\"row form-control\" style=\"min-height: 200px; \">
        <div class='col-md-3'>
            <br>
            <a href='$domain/post_all.php?id=$row[id]'><img src=\"$row[img]\" class=\"img-fluid img-thumbnail\" alt=\"...\"></a>
            <br>
        </div>
        <div class='col-md-4'>
            <div class='row'>
                <div class='col'>
                    <br>
                    <a class=\"nav-link link text-black display-4\" href=\"$domain\"><h4>$row[name_post]</h4></a>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
            ";
                //<span class=\"badge badge-pill badge-primary\">Жилищная</span>
    $mysqli2 = ConnectDB();

    if (!$res2=$mysqli2->query("Call GetTagsFromPostHelp('$row[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli2->errno . ") " . $mysqli2->error;
    }
    while($row2 = $res2->fetch_assoc()) {
        echo "<span class=\"badge badge-pill badge-primary\">$row2[name]</span>";
    }


           echo " </div>
            </div>
        </div>
        <div class='col-md-5'>
            <div class='row' style='min-height: 150px;'>
                <div class='col-md-6 text-justify'>
                    <br>
                    <h3>Описание:</h3>
                    <br>
                    $row[short_text];
                </div>
                <div class='col-md-6 text-justify'>
                    <br>
                    <p>Время:</p>
                </div>
            </div>
            <div class='row justify-content-end'>
                <div class='col-6 '>
                    <a href='$domain/post_all.php?id=$row[id]' type=\"button\" class=\"btn btn-outline-secondary\" >Подробнее</a>
                </div>
            </div>
        </div>
    </div>
    <br>
";
}

*/



echo "</div>";
include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';


