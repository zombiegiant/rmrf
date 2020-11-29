<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии
echo "<br>";



function insert_base64_encoded_image($img, $echo = false){
    $imageSize = getimagesize($img);
    $imageData = base64_encode(file_get_contents($img));
    $imageHTML = "<img src='data:{$imageSize['mime']};base64,{$imageData}' {$imageSize[3]} />";
    if($echo == true){
        echo $imageHTML;
    } else {
        return $imageHTML;
    }
}


function insert_base64_encoded_image_src($img, $echo = false){
    $imageSize = getimagesize($img);
    $imageData = base64_encode(file_get_contents($img));
    $imageSrc = "data:{$imageSize['mime']};base64,{$imageData}";
    if($echo == true){
        echo $imageSrc;
    } else {
        return $imageSrc;
    }
}

//var_dump($_POST);
$img=insert_base64_encoded_image_src($_FILES['file']['tmp_name']);
$mysqli = ConnectDB();

if (!$res=$mysqli->query("INSERT INTO post_rat (id_user, name_post, short_text, long_text, img) VALUES ('$_SESSION[id]', '$_POST[name]', '$_POST[short_text]', '$_POST[long_text]', '$img')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
} else
    echo '<br><div class="container" style="min-height: 700px;" id="ContNum1">
          <br><h2 style="text-align: center;">Предложение успешно добавлено</h2> <br>  
          </div><br>';
$insert_id=$mysqli->insert_id;
foreach ($_POST['tags'] as $value){
    if (!$res=$mysqli->query("CALL AddTagForPostRat('$insert_id','$value')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}
echo "<script type='text/javascript'>
        setTimeout('location.replace(\"$domain\")',5000);
        </script>";




include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
